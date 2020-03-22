This is a mailing microservice which uses external services to actually sent the emails. 
When such an external service is unavailable there is a fallback to a secondary service. 

The tech stack is lumen, docker, mysql, nginx.

Installation steps:

Below is an example JSON payload:
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

to consume the emails form the rabbitmq queue:
php artisan consume:email
