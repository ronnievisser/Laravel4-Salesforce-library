<?php namespace Ronster\Salesforce;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use \Config;
use \Phpforce\SoapClient\ClientBuilder;

class SalesforceServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot() {
		$this->package( 'ronster/salesforce' );
	}

	/**
	 * Register the service provider.
	 *
	 * @return PHPForce
	 */
	public function register() {
		$this->app[ 'salesforce' ] = $this->app->share( function( $app ) {

	    	// connection credentials loaded from config
	        $username = Config::get( 'salesforce::username' );
	        $password = Config::get( 'salesforce::password' );
	        $token = Config::get( 'salesforce::token' );
	        $wsdl = Config::get( 'salesforce::wsdl' );
	           
	        $builder = new ClientBuilder(
				$wsdl,
			  	$username,
			  	$password,
			  	$token
			);

			return $builder->build();
	    });

    	// Shortcut so developers don't need to add an Alias in app/config/app.php
	    $this->app->booting( function() {
	        $loader = AliasLoader::getInstance();
	        $loader->alias( 'Salesforce', 'Ronster\Salesforce\Facades\Salesforce' );
	    });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides() {
		return array();
	}
}