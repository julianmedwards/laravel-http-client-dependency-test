# laravel-http-client-dependency-test

## Issue

Roots Acorn doesn't come with the **guzzlehttp/guzzle** package which Laravel requires to use its [HTTP Client](https://laravel.com/docs/10.x/http-client).

Without this package, attempting to use the client doesn't show any type of errors in-editor or even when called by the program.

## Specs

This example repo built and tested on Windows 10.

-   PHP 8.3.3
-   Composer 2.7.1
-   Laravel 10.10

### Project Setup

I generated the base project with `$ composer create-project laravel/laravel .`

There's a `/test` GET endpoint defined in `routes/web.php`, handled by a controller in `app/http/controllers/testController.php`

testController->index() will make a GET request to a random public API using the HTTP client and return 200 if successful.

On the web page is a button which will run a script defined at the bottom of `resources/views/welcome.blade.php`

This script will make a fetch call to `/test`.

### Reproduction Instructions

Install dependencies.

`$ composer install`

Start the server with

`$ php artisan serve`

Open the app at **localhost:8000** and click the red button at the center of the screen. It will make a fetch request to the app.

It should succeed. "Returned response code 200" will be printed to the browser's console. "Test request controller index called." will be printed to the server's console.

Run `$ composer remove guzzlehttp/guzzle`

Now restart the app and clicking the button will cause the request to fail. The console for the Laravel server should show no errors, though it will still print the debug message showing the handler was called.
