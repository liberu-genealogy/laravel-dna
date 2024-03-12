# laravel-dna
Laravel 11 wrapper around php-dna
## Installation

To install the `php-dna` dependency in your Laravel project, run the following command in your terminal:

```
composer require liberu-genealogy/php-dna
```

This will download and install the `php-dna` package, making it available for use within your Laravel application.

## Dispatching the DispatchMatchkitsJob

To dispatch the `DispatchMatchkitsJob` for processing DNA matchkits, you can use the following code snippet:

```php
dispatch(new \App\Jobs\DispatchMatchkitsJob());
```

This will enqueue the job for processing by the Laravel queue system. Make sure your queue worker is running to process the job.

## Usage

After setting up the `php-dna` dependency and dispatching the `DispatchMatchkitsJob`, you can start integrating DNA processing functionalities into your Laravel application. Refer to the `php-dna` documentation for more details on available methods and their usage.

For any custom functionalities or issues, feel free to extend the job or service provider classes as needed.
