# Laravel Image Share
A simple site for uploading screenshots with ShareX.

## Installation
- Clone repository and setup vhost or site config for your webserver. 
    - Depending on your system setup you may need to set write permissions for `bootstrap/cache` and `storage`.
- Run `composer install`
- Copy `.env.example` to `.env`.
    - Configure the `.env`'s values for the database and whether you wish to enable registration.
- Run `php artisan migrate`
- Run `php artisan passport:install`

After doing this you should have the site configured and can register and use the site with ShareX.
An example configuration file can be found under settings once you have registered on an instance of the site.