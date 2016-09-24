#[Devcenter Square Social](http://dcsquare-social.herokuapp.com)

Social app for devcenter members built on the Laravel PHP framework... Open to contributions and features

## Official Documentation

New to Laravel? Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).


#Devcenter Square Social Setup

####Getting Started Contributing
---------------

```bash
# Get the project
git clone https://github.com/acekyd/devcenter-social.git dcsquare-social

# Change directory
cd dcsquare-social

# Rename env.example to .env and fill in all the keys and secrets and also generate a secure key for the app using `php artisan key:generate`

# Install Composer dependencies
composer install

php artisan serve or run in your browser
```
If you are having cURL error 60: SSL certificate problem:

	Use this certificate root certificate bundle:

	https://curl.haxx.se/ca/cacert.pem

	Copy this certificate bundle on your disk. And use this on php.ini

	curl.cainfo = "path_to_cert\cacert.pem"



