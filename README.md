# Becosoft Fashionpro NL PHP API Wrapper

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
$gateway = Gateway::get('apiKey', $debug = true);
$api = new Api($gateway);
```

The API allows you to insert your own `Gateway`. The default `Gateway` (from the factory) uses a `Guzzle` instance for the API communication and a `NullLogger` instance for logging (no logging). Supply your own logger to make sure logging is possible. If needed, also supply your own gateway implementation.

### GET items

* Use `get` on an entity to push a single GET request using the optional filters you specify. Refer to the API documentation which filters you can use per entity.
* Use `getAll` on an entity to get all items that adhere to your filter. The wrapper takes care of sending enough requests to fetch all items (using the `take/skip` parameters) in batches of 50 items.

## Examples

### Load Articles

```
$gateway = Gateway::get('apiKey', $debug = true);
$api = new Api($gateway);
$entity = new Artikel($this->api);
$allArticles = $entity->getAll();
```

### Load Articles with a filter

```
$gateway = Gateway::get('apiKey', $debug = true);
$api = new Api($gateway);

$allArticles = $entity->getAll([
    'brand' => $brand,
    'internetPublished' => 'true',
]);
```
