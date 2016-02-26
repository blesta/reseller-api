# blesta/reseller-api

[![Build Status](https://travis-ci.org/blesta/reseller-api.svg?branch=master)](https://travis-ci.org/blesta/reseller-api) [![Coverage Status](https://coveralls.io/repos/blesta/reseller-api/badge.svg)](https://coveralls.io/r/blesta/reseller-api)

The Blesta Reseller API library.

This library implements the [Reseller API](http://docs.blesta.com/display/dev/Reseller+API).

## Installation

Install via composer:

```
composer require blesta/reseller-api:~1.0
```

## Basic Usage

Initialize your connection. You'll need to inject this connection into any command type you wish to initialize.

```php
use Blesta\ResellerApi\Connection;

$connection = new Connection();
$connection->setBasicAuth($username, $password);
```

### Credits

Allows fetching available credit on your account.

```php
use Blesta\ResellerApi\Command\Credits;

$credits = new Credits($connection);
```

#### Get Credits

```php
$result = $credits->get();
echo $result->response();
```

### Packages

Allows fetching information on available packages.

```php
use Blesta\ResellerApi\Command\Packages;

$packages = new Packages($connection);
```

#### Get Packages

```php
$result = $packages->get();
print_r($result->response());
```
#### Get Pricing

```php
$result = $packages->getPricing($package_id);
print_r($result->response());
```

### Licenses

Allows you to add, update, suspend, unsuspend, and cancel a license.

```php
use Blesta\ResellerApi\Command\Licenses;

$licenses = new Licenses($connection);
```

#### Add License

```php
$data = array(
    'pricing_id' => 1,
    'test_mode' => 'true'
);
$result = $licenses->add($data);
$licenseKey = $result->response();
```

#### Update License

```php
$data = array(
    'license' => 'abcdef0123456789',
    'reissue_status' => 'reissue',
    'test_mode' => 'true'
);
$licenses->update($data);
```

#### Cancel License

```php
$data = array(
    'license' => 'abcdef0123456789',
    'test_mode' => 'true'
);
$licenses->cancel($data);
```

#### Suspend License

```php
$data = array(
    'license' => 'abcdef0123456789',
    'test_mode' => 'true'
);
$licenses->suspend($data);
```

#### Unuspend License
```php
$data = array(
    'license' => 'abcdef0123456789',
    'test_mode' => 'true'
);
$licenses->unsuspend($data);
```

#### Search

Search for a particular license. Searches over license key, domain, IP address and installation path.

```php
use Blesta\ResellerApi\Command\Search;

$search = new Search($connection);
$result = $search->data('search string')
    ->page(1)
    ->get();
print_r($result->response());
```

## Command Factory

The examples shown in the Basic Usage section demonstrate direct usage of command objects. You may find the built-in command factory more user friendly.

```php
$commandFactory = new \Blesta\ResellerApi\Command\CommandFactory();
$credits = $commandFactory->create('Credits', $connection);
$packages = $commandFactory->create('Packages', $connection);
$licenses = $commandFactory->create('Licenses', $connection);
$search = $commandFactory->create('Search', $connection);
```
