This is a mailing microservice which uses external services to actually sent the emails. 
When such an external service is unavailable there is a fallback to a secondary service. 

The tech stack is lumen, docker, mysql, nginx.

Installation steps:
1. Clone the project
2. 'cd' to the project and run 'docker-compose build'
3. run 'docker-compose up'
 - In case mysql exits with exit code 1 run 'docker-compose up mysql'
4. Obtain the IP of the mysql service by executing 'docker inspect mailservice_mysql'
 - It is near the bottom of the output looking similar to:
 "IPAddress": "192.168.160.4"
5. put the IP in the laravel project .env file as DB_HOST value:
    DB_HOST=192.168.160.4
6. run 'docker-compose exec app php artisan migrate'

Below is an example JSON payload:
```javascript
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
```
You can use postman or curl or whatever tool you like to send the json payload to the api.
send it to the following endpoint:
http://<IP-address>/sendmail

Now the emails should be added to the queue.
To consume them from the rabbitmq queue run the following command:
docker-compose exec app php artisan consume:email
