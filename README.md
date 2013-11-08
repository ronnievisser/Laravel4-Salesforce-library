Laravel4-Salesforce-library
===========================

## Installation

Install this package through Composer. To your `composer.json` file, add:

```js
"require-dev": {
	"Ronster/Salesforce": "dev-master"
}
```

Next, run `composer update` to download it.

Finally, add the service provider to `app/config/app.php`, within the `providers` array.

```php
'providers' => array(
	// ...

	'Ronster\Salesforce\SalesforceServiceProvider'
)
```

## Configuration

Run `php artisan config:publish Ronster/Salesforce` to publish the package config file. Add your username, password, security token(optional) and the absolute path to your enterprise/partner WSDL file which can be obtained from your Salesforce Org.

## Usage

This package is a laravel 4 port of the PHPforce/soap-client library. Instructions can be found here: [PHPForce/soap-client](https://github.com/phpforce/soap-client)

## Example
```php
Salesforce::query('select Name, SystemModstamp from Account limit 5');

```
