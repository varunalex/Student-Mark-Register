# Student Marks Register Lite

Simple but useful application to keep track on student's examination marks. This application is developed with ❤ Laravel + Livewire + AlpineJs + TailwindCSS.

## Requirements

-   PHP >= 7.3
-   Mysql >= 5.7
-   NPM >= 6.4
-   Composer

## Installation

-   Clone or download the git repository
-   Rename `.env.example` file to `.env`
-   Open `.env` and replace your database candidates,
-   Run `composer install`
-   Run `npm install & npm run production`
-   Migrate tables `php artisan migrate`
-   Add admin user `php artisan db:seeder --class=UserSeeder`
    use `--force` flag on production.

## Usage

Default logins:

-   Email: `smradmin@gmail.com`
-   Password: `password`

![enter image description here](https://i.ibb.co/DgZddpJ/Student-Marks-Register.png)
