# Hitta.se API wrapper for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/grafstorm/hittase-php-api-for-laravel.svg?style=flat-square)](https://packagist.org/packages/grafstorm/hittase-php-api-for-laravel)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/grafstorm/hittase-php-api-for-laravel/run-tests?label=tests)](https://github.com/grafstorm/hittase-php-api-for-laravel/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/grafstorm/hittase-php-api-for-laravel/Check%20&%20fix%20styling?label=code%20style)](https://github.com/grafstorm/hittase-php-api-for-laravel/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/grafstorm/hittase-php-api-for-laravel.svg?style=flat-square)](https://packagist.org/packages/grafstorm/hittase-php-api-for-laravel)

This package uses the Hitta.se API PHP package `grafstorm/hitta_php_package` and packages it for Laravel.
All you need to get going is setting the correct callerId and apiKey in you .env file.``

See http://hitta.github.io/public/http-api/ for more detailed info on what fields are available.

This package is an unofficial package and is still in beta. 

## Installation

You can install the package via composer:

```bash
composer require grafstorm/hittase-php-api-for-laravel
```

## Configuration
You can publish the config file with:
```bash
php artisan vendor:publish --provider="Grafstorm\Hitta\HittaServiceProvider" --tag="hittase-php-api-for-laravel-config"
```

Be sure to add callerId and apiKey in your .env file:
```
HITTA_CALLER_ID=## your caller id ## 
HITTA_API_KEY=## your api key ##
```

This is the contents of the published config file:

```php
return [
    'callerId' => env('HITTA_CALLER_ID'),
    'apiKey' => env('HITTA_API_KEY'),
];
```

## Usage

```php
// Hitta.se API Wrapper as a Laravel Package
// Search for Swedish companies and people

// Combined search. You can also explicitly call Hitta::combined()
Hitta::what('Luke Skywalker')
  ->where('Kiruna')
  ->find();
  
$result = Hitta::combined()
  ->what('Empire')
  ->where('Deathstar')
  ->find();

foreach($result->companies as $company) {
  echo $company->displayName . "\n";
}

foreach($result->people as $person) {
  echo $person->displayName . "\n";
}

// Only Search for people
Hitta::people()
  ->what('Luke Skywalker')
  ->find();
  
// Only Search for companies
Hitta::companies()
  ->what('Empire')
  ->find();
  
// Optional search parameters
Hitta::companies()
  ->what('Luke Skywalker')
  ->where('Kiruna')
  ->pageNumber(1)
  ->pageSize(10)
  ->rangeFrom(100)
  ->rangeTo(150)
  ->find();

// Fetching details of a company or person with findPerson and findCompany.
$result = Hitta::people()
  ->what('Luke Skywalker')
  ->find();
  
$personId = collect($result->people)->first()->id;
$companyId = collect($result->companies)->first()->id;

Hitta::findPerson($personId);
Hitta::findCompany($companyId);
```

## Testing
See grafstorm/hitta_php_package for tests.
```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [grafi](https://github.com/argia-andreas)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
