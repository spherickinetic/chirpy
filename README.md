# Chirpy - Blade

A simple Twitter clone, based on the Laravel Bootcamp exercise.

## Description

The Chirpy app is a social media platform developed using the Laravel framework, offering users a familiar and engaging experience reminiscent of the popular microblogging platform, Twitter. Designed with inspiration from the Laravel bootcamp tutorial, this application features some of the functionalities of Twitter, including user authentication, tweeting and real-time notifications.

## Features

* **User Authentication** - Allows users to sign up, log in, and log out securely.
* **Tweeting** - Post chirps and view your timeline.
* **Notifications** Receive notifications for new chirps.
* **Followers** Follow and unfollow other users.
* **Images** Add images to Chirps.

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/spherickinetic/chirpy.git
   ```

2. Install dependencies

   ```bash
   composer install
   ```

3. Configure the environment

   ```bash
   cp .env.example .env
   ```

Update the .env file with your database settings.

4. Migrate the database

   ```bash
   php artisan migrate
   ```

5. Seed the database

   ```bash
   php artisan db:seed
   ```

6. Start the dev server

    ```bash
    php artisan serve
    ```

7. Visit [the site](http://localhost:8000) in your browser.

## Author

[Dan Bolton](https://spherickinetic.co.uk)

## Acknowledgments

* [Laravel Bootcamp](https://https://bootcamp.laravel.com/introduction)