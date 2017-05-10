# Becosoft Fashionpro NL PHP API Wrapper

[![Build Status](https://travis-ci.org/stefandoorn/becosoft-fashionpro-nl-php-api.svg?branch=master)](https://travis-ci.org/stefandoorn/becosoft-fashionpro-nl-php-api)[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/stefandoorn/becosoft-fashionpro-nl-php-api/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/stefandoorn/becosoft-fashionpro-nl-php-api/?branch=master)[![Code Coverage](https://scrutinizer-ci.com/g/stefandoorn/becosoft-fashionpro-nl-php-api/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/stefandoorn/becosoft-fashionpro-nl-php-api/?branch=master)[![Latest Stable Version](https://poser.pugx.org/stefandoorn/becosoft-fashionpro-nl-php-api/v/stable)](https://packagist.org/packages/stefandoorn/becosoft-fashionpro-nl-php-api)[![License](https://poser.pugx.org/stefandoorn/becosoft-fashionpro-nl-php-api/license)](https://packagist.org/packages/stefandoorn/becosoft-fashionpro-nl-php-api)

This package provides a simple PHP Wrapper around the Becosoft Fashionpro API: http://api.fashionpro.becosoft.net/swagger/ui/index).

Please note:
* The endpoints are in Dutch. An English API is not yet available. 
* The entities provided in this package written as used in the API, all other code is English based.

## Requirements

* PHP >= 5.5

## Installation

```
composer require stefandoorn/becosoft-fashionpro-nl-php-api
```

## Usage

### Create wrapper instance

```
/**
 * Api constructor.
 * @param GatewayInterface $gateway
 */
public function __construct(GatewayInterface $gateway)
```

Quick start: 

```
$gateway = GatewayFactory::get('apiKey', $debug = true);
$api = new Api($gateway);
```

The API allows you to insert your own `Gateway`. The default `Gateway` (from the factory) uses a `Guzzle` instance for the API communication and a `NullLogger` instance for logging (no logging). Supply your own logger to make sure logging is possible. If needed, also supply your own gateway implementation.

### GET items

* Use `get` on an entity to push a single GET request using the optional filters you specify. Refer to the API documentation which filters you can use per entity.
* Use `getAll` on an entity to get all items that adhere to your filter. The wrapper takes care of sending enough requests to fetch all items (using the `take/skip` parameters) in batches of 50 items.

## Examples

### Load Articles

```
$gateway = GatewayFactory::get('apiKey', $debug = true);
$api = new Api($gateway);
$entity = new Artikel($this->api);

$allArticles = $entity->getAll();
```

### Load Articles with a filter

```
$gateway = GatewayFactory::get('apiKey', $debug = true);
$api = new Api($gateway);

$allArticles = $entity->getAll([
    'brand' => $brand,
    'internetPublished' => 'true',
]);
```

### POST items

* Use `post` on an entity to push a single item to Becosoft

## Examples

### POST Weborder

```
$gateway = GatewayFactory::get('apiKey', $debug = true);
$api = new Api($gateway);
$entity = new BecosoftApi\Entity\Weborder($this->api);

$weborder = new BecosoftApi\Model\Weborder;
$weborder->WeborderId = 1;

...
$result = $entity->post($weborder->toJson();
```

Currently you have to insert a JSON object yourself, which gives flexibility. The Weborder model is simply a helper model to make sure you insert fields with the correct name.
