## About The Project

### Video Demo
[![Laravel Shopping Cart Demo](https://i.ibb.co/L7jkz3Z/thumbnail.png)](https://youtu.be/18NV9TVA3PE?si=RmyybAwGDymiJEIA)

Laravel Shopping Cart is a full stack implementation of a web-based shopping cart in Laravel/PHP.

### Built With
* Laravel
* PHP/Composer
* Bootstrap 4.6.2 (JQuery)
* HTML/CSS, JavaScript
* MySQL
* XAMPP
* Git

### Features
* **Product Management**
  * List products in database
  * Include product name, description, price, image
  * Add, edit, delete products from database

* **Shopping Cart**
  * Browse full list of products
  * Add, edit, remove products from cart
  * Update product quantity 

* **Checkout**
  * Create order and empty cart
  * View past orders

### Missing Features
* _Individual product pages_
* _Edit product (front-end)_
* _Collect shipping information at checkout_
* _View past orders (multiple)_

## Getting Started
To run a full stack project, you need both front-end and back-end applications, along with a database to store your data.

To get a local copy of my project up and running, follow these steps.

### Prerequisites
Download and install the following:
* Laravel
* PHP and Composer
* XAMPP
* Node.js and NPM

## Installation
[Laravel's Installation Guide](https://laravel.com/docs/11.x/installation#creating-an-application)

1. Run cmd or terminal, confirm Composer and NPM is installed
    ```sh
      composer
    ```
    ```sh
      npm -v
    ```

2. Create a new Laravel project, follow installer setup
   
   Select PHPUnit as your framework, MySQL as your database
    ```sh
      laravel new Ecommerce
    ```

3. Open project folder in IDE

   Locate .env file, rename db_database
    ```text
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=laraveldb
      DB_USERNAME=root
      DB_PASSWORD=
    ```
4. Download database: [laraveldb.sql](https://github.com/m-bien/CSC-471-Laravel-Shopping-Cart/blob/main/laraveldb.sql)
5. Open XAMPP Control Panel, start Apache and MySQL servers
6. Confirm MySQL is running
    ```text
      http://localhost/phpmyadmin/
    ```
7. Go to Import tab, import [laraveldb.sql](https://github.com/m-bien/CSC-471-Laravel-Shopping-Cart/blob/main/laraveldb.sql) database
8. Clone this repo
    ```text
      git clone https://github.com/m-bien/CSC-471-Laravel-Shopping-Cart.git
    ```
9. Copy paste cloned files into your project folder
10. Start server
    ```text
      php artisan serve
    ```
11. View project in browser
    ```text
      http://localhost:8000    
    ```
12. Done! Use ChatGPT for troubleshooting