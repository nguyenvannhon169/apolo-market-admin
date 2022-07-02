<?php

namespace App\Providers;

use App\Repositories\Repository;
use DirectoryIterator;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    private $exceptRepositoriesEloquent = [
        Repository::class,
    ];

    /**
     * @var array
     */
    private $exceptServices = [
        Repository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bindingRepositories();

        $this->bindingServices();
    }

    /**
     * repositories auto binding
     *
     * @return void
     */
    protected function bindingRepositories()
    {
        foreach (new DirectoryIterator(dirname(__DIR__) . '/' . config('repository.repositoryDirectoryName')) as $file) {
            if ($file->isFile() && !in_array($file->getBasename('.php'), $this->exceptRepositoriesEloquent)) {
                $repo = str_replace(config('repository.suffixEloquent'), '', $file->getBasename('.php'));
                $this->app->bind(
                    config('repository.repositoriesInterfaceNamespace') . $repo . config('repository.suffixInterface'),
                    config('repository.repositoriesEloquentNamespace') . $repo . config('repository.suffixEloquent')
                );
            }
        }
    }

    /**
     * services auto binding
     *
     * @return void
     */
    protected function bindingServices()
    {
        foreach (new DirectoryIterator(dirname(__DIR__) . '/' . config('repository.serviceDirectoryName')) as $file) {
            if ($file->isFile() && !in_array($file->getBasename('.php'), $this->exceptServices)) {
                $repo = str_replace(config('repository.suffixService'), '', $file->getBasename('.php'));
                $this->app->bind(
                    config('repository.servicesInterfaceNamespace') . $repo . config('repository.suffixServiceInterface'),
                    config('repository.servicesNamespace') . $repo . config('repository.suffixService')
                );
            }
        }
    }
}
