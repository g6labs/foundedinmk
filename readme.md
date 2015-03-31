#Founded in Macedonia
Developed at [G6](http://g6solutions.com)

###Requirements

* PHP >= 5.4
* MCrypt PHP extension
* Apache/nginx web server
* Relational database (tested with PostgreSQL and MySQL)
* [Composer](https://getcomposer.org/)
* [Bower](http://bower.io/)

###How to install

1. Clone the code from this repository
2. Install the back-end dependencies using `composer install`
3. Setup an vhost that points to the `public/` directory
4. Install the front-end dependencies using `bower install`
5. Rename (or make a copy) of the `.env.example` file to `.env` and change the configuration as you need
5. Run `php artisan migrate` and `php artisan db:seed` to prepare the database
6. You can now log in to the admin panel using:

* email: `admin@foundedin.mk`
* password: `admin123!`

After you log in, don't forget to create a new user and delete the default one.