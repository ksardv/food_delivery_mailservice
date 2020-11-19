This is a mailing microservice which uses external services to actually sent the emails. 
When such an external service is unavailable there is a fallback to a secondary service. 

The tech stack is lumen, docker, mysql, nginx.

# Installation steps
1. Clone the project
2. 'cd' to the project and run 'docker-compose build'
3. copy .env.example to .env and enter the data as follow:
```bash
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=mailservice
DB_USERNAME=root
DB_PASSWORD=root

CACHE_DRIVER=file
QUEUE_CONNECTION=rabbitmq

MAILJET_APIKEY=your_mailjet_apikey
MAILJET_APISECRET=your_mailjetapisecret_key

SENDGRID_API_KEY=sendgrid_apikey

RABBITMQ_HOST=localhost
RABBITMQ_PORT=5672
RABBITMQ_VHOST=/
RABBITMQ_LOGIN=guest
RABBITMQ_PASSWORD=guest
RABBITMQ_QUEUE=emails
```
4. run 'docker-compose up -d'
 - In case mysql exits with exit code 1 run 'docker-compose up mysql -d'
5. run 'docker-compose exec app composer install'
6. run 'docker-compose exec app php artisan migrate'
7. run 'docker-compose exec app yarn run dev'

N.B. In case you are running this project on Vagrant guest on Windows Host, you will receive symlinks errors wen you run npm/yarn install. To fix this run the windows console as administrator and then run vagrant up.

Below is an example JSON payload:
```javascript
{
    "message":
    {
        "from": {
            "email": "petar.ivanov2001@mail.bg",
            "name": "Petar"
        },
        "to": {
            {
            "email": "petar.ivanov2001@mail.bg",
            "name": "Petar"
            }
        },
        "subject": "Greetings from Mailjet.",
        "text": "My first Mailjet email",
        "html": "<h3>Dear passenger 1, welcome to <a href='https://www.mailjet.com/'>Mailjet</a>!</h3><br />May the delivery force be with you!",
    }
}
```
You can use postman or curl or whatever tool you like to send the json payload to the api.
Open a terminal and run either of the below commands to consume the messages from the queue:
'docker exec -it mailservice-app php artisan queue:work' which is the default laravel command
or the command provided by the rabbitmq package
docker exec -it mailservice-app php artisan rabbitmq:consume
send the request with the email payload to the following endpoint:
http://localhost:8080/mails
 - test with curl:
 ```bash
 curl -X POST -H "Content-Type: application/json" \
 -d '{"message":{"from":{"email":"petar.ivanov2001@mail.bg","name":"Petar"},"to":{"email":"petar.ivanov2001@mail.bg","name":"Petar"},"subject":"Greetings from Mailjet.","text":"My first Mailjet email","html":"<h3>Dear passenger 1, welcome to <a href='https://www.mailjet.com/'>Mailjet</a>!</h3><br />May the delivery force be with you!"}}' \
 http://localhost:8080/mails
```

Now the emails should be added to the queue.
To consume them from the rabbitmq queue run the following command:
docker-compose exec app php artisan consume:email

# Checking the data in the db
1. docker exec -it mailservice_mysql /bin/bash
2. mysql -u root -p
 - you will be prompted to enter a password - enter root
3. select * from mailservice.emails;

The publisher and worker log the information in the log files with the same names located in storage/logs.

VueJs application is implemented for sending new emails and listing the sent ones.

TODO:
1. Cypress for frontend testing
2. Update the db email status from the gateway response
