<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        	/**
		 * All of the application's route middleware keys.
		 *
		 * @var array
		 */
		protected $middleware = [
			'auth' => 'App\Http\Middleware\AuthMiddleware',
			'auth.basic' => 'App\Http\Middleware\BasicAuthMiddleware',
			'csrf' => 'App\Http\Middleware\CsrfMiddleware',
			'guest' => 'App\Http\Middleware\GuestMiddleware',
		];
		/**
		 * The application's middleware stack.
		 *
		 * @var array
		 */
		protected $stack = [
			'App\Http\Middleware\MaintenanceMiddleware',
			'Illuminate\Cookie\Middleware\Guard',
			'Illuminate\Cookie\Middleware\Queue',
			'Illuminate\Session\Middleware\Reader',
			'Illuminate\Session\Middleware\Writer',
			'Illuminate\View\Middleware\ErrorBinder',
		];
		/**
		 * Build the application stack based on the provider properties.
		 *
		 * @return void
		 */
		public function stack()
		{
			$this->app->stack(function(Stack $stack, Router $router)
			{
				return $stack
					->middleware($this->stack)->then(function($request) use ($router)
					{
						return $router->dispatch($request);
					});
				});
		}
    }
}
