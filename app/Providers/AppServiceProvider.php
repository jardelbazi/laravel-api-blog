<?php

namespace App\Providers;

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
        $this->app->bind(
			\App\Blog\Category\Domain\CategoryRepository::class,
			\App\Blog\Category\Infra\DB\CategoryRepositoryDb::class
		);

		$this->app->bind(
			\App\Blog\Category\Domain\CategoryServiceInterface::class,
			\App\Blog\Category\Application\CategoryService::class
		);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
