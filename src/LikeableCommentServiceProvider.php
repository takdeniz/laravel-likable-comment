<?php
namespace Takdeniz\LikableComment;

use Illuminate\Support\ServiceProvider;

class LikableCommentServiceProvider extends ServiceProvider
{

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{

		$configFile = dirname(__DIR__) . '/config/config.php';

		$this->publishes([
			$configFile => config_path('comment.php'),
		], 'config');

		$this->mergeConfigFrom($configFile, 'comment');

		$this->loadMigrationsFrom(dirname(__DIR__) . '/database/migrations');

		$this->publishes([
			dirname(__DIR__) . '/database/migrations' => database_path('migrations'),
		], 'migrations');
	}

}
