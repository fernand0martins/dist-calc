# Distance calculator
RESTful API to calculate distances, built using Symfony.

Should expose a single endpoint:
- GET: will expose a dummy object of the expected POST json payload,
- POST: will receive the payload, validate the data and return a response with the result or a error message.

## Installation 
Run `composer install`

## Server
To run locally use `php -S 127.0.0.1:8000 -t public`

## Test suit
- static code analysis run `php vendor/bin/psalm`
- run acceptance and unit tests with`php bin/phpunit`
