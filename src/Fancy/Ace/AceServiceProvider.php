<?php namespace Fancy\Ace;

use Illuminate\Support\ServiceProvider;

class AceServiceProvider extends ServiceProvider {

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
	public function boot()
	{
		$this->package('fancy/ace');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        \Event::listen('fancy::scripts.initialize', function() {
            global $pagenow;
            if(!(is_admin() && ($pagenow === 'post.php' || $pagenow === 'post-new.php'))) return;

            return array(
                'ace' => array(
                    'src' => 'public/packages/fancy/ace/js/vendor/ace/ace.js',
                    'in_admin' => true
                ),
                'ace-textarea' => array(
                    'src' => 'public/packages/fancy/ace/js/vendor/jquery-ace-textarea.js',
                    'in_admin' => true
                ),

                'fancy-ace' => array(
                    'src' => 'public/packages/fancy/ace/js/plugin.js',
                    'in_admin' => true
                )
            );
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
