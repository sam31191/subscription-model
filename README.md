# Subscription Model

This is a Laravel project that implements a subscription model.

## Getting Started

To get started with the project, please follow these steps:

1. Clone the repository to your local machine.
2. Run `composer install` to install the dependencies.
3. Run `php artisan key:generate` to generate the application key.
4. Run `php artisan migrate` to run the database migrations.

## Configuration

The project uses the following configuration files:

* [config/filesystems.php](cci:7:///home/neosoft/Desktop/subscription-model/config/filesystems.php:0:0-0:0) for file system configuration.
* [config/app.php](cci:7:///home/neosoft/Desktop/subscription-model/config/app.php:0:0-0:0) for application configuration.

## Running the Application

To run the application, please use the following command:

`php artisan serve`

This will start the development server, and you can access the application at `http://localhost:8000`.

## Contributing

Please feel free to contribute to the project by submitting pull requests or issues.

## API Endpoints 

1. http://127.0.0.1:8000/api/post/2/store
2. http://127.0.0.1:8000/api/subscriber/2/subscribe
3. http://127.0.0.1:8000/api/website/create