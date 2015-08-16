<?php namespace GeneaLabs\Bones\Library;

use Illuminate\Support\ServiceProvider;

class BonesLibraryServiceProvider extends ServiceProvider
{

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
        if (! $this->app->routesAreCached()) {
            require __DIR__ . '/../../../routes.php';
        }

        $this->loadViewsFrom(__DIR__ . '/../../../views', 'genealabs-bones-library');
        $this->publishes([__DIR__ . '/../../../../public' => public_path('genealabs/bones-library')], 'genealabs-bones-library');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['genealabs-bones-library'];
	}

}
