# laravel-dna
Laravel 11 or Laravel 12 wrapper around php-dna

## Installation

To install the `laravel-dna` dependency in your Laravel project, run the following command in your terminal:

```
composer require liberu-genealogy/laravel-dna
```

This will download and install the `laravel-dna` package, making it available for use within your Laravel application.


## Dispatching the DispatchMatchkitsJob

To dispatch the `DispatchMatchkitsJob` for processing DNA matchkits, you can use the following code snippet:

```php
use LaravelDna\Jobs\DispatchMatchkitsJob;
use Dna\MatchKits;

// Option 1: Using dependency injection
dispatch(new DispatchMatchkitsJob(app(MatchKits::class)));

// Option 2: Using the service container binding
dispatch(app('dispatchMatchkits'));
```

This will enqueue the job for processing by the Laravel queue system. Make sure your queue worker is running to process the job.

## Usage

### Using the Facade

You can use the MatchKitsFacade to access MatchKits functionality:

```php
use LaravelDna\Facades\MatchKitsFacade;
use Dna\Snps\SNPs;

// Load DNA kits
$kit1 = new SNPs('/path/to/kit1.txt');
$kit2 = new SNPs('/path/to/kit2.txt');

// Get MatchKits instance via facade
$matchKits = app('matchKits');
$matchKits->setKitsData([$kit1, $kit2]);

// Match the kits
$matchKits->matchKits();

// Get matched data
$matchedData = $matchKits->getMatchedData();

// Visualize the results
$matchKits->visualizeMatchedData('matched_data.png', 'DNA Match Results', 'GRCh37', 'png');
```

### Direct Usage

You can also use the MatchKits class directly:

```php
use Dna\MatchKits;
use Dna\Snps\SNPs;

$matchKits = app(MatchKits::class);

// Load your DNA kit files
$kit1 = new SNPs('/path/to/kit1.txt');
$kit2 = new SNPs('/path/to/kit2.txt');

$matchKits->setKitsData([$kit1, $kit2]);
$matchKits->matchKits();

$matchedData = $matchKits->getMatchedData();
```

After setting up the `php-dna` dependency and dispatching the `DispatchMatchkitsJob`, you can start integrating DNA processing functionalities into your Laravel application. Refer to the `php-dna` documentation for more details on available methods and their usage.

For any custom functionalities or issues, feel free to extend the job or service provider classes as needed.
