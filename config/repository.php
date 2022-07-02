<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Configs Repository
    |--------------------------------------------------------------------------
    */
    /**
     * Repository directory name.
     */
    'repositoryDirectoryName' => 'Repositories',

    /**
     * repositories Interface namespace
     */
    'repositoriesInterfaceNamespace' => 'App\\Repositories\\Contracts\\',

    /**
     * Repositories Eloquent namespace.
     */
    'repositoriesEloquentNamespace' => 'App\\Repositories\\',

    /**
     * Repository Interface's suffix name.
     */
    'suffixInterface' => 'RepositoryInterface',

    /**
     * Repository Eloquent's suffix name.
     */
    'suffixEloquent' => 'Repository',

    /*
    |--------------------------------------------------------------------------
    | Configs Service
    |--------------------------------------------------------------------------
    */

    /**
     * Service directory name.
     */
    'serviceDirectoryName' => 'Services',

    /**
     * Services Interface namespace
     */
    'servicesInterfaceNamespace' => 'App\\Services\\Contracts\\',

    /**
     * Services namespace.
     */
    'servicesNamespace' => 'App\\Services\\',

    /**
     * Service Interface's suffix name.
     */
    'suffixServiceInterface' => 'ServiceInterface',

    /**
     * Service Eloquent's suffix name.
     */
    'suffixService' => 'Service',
];
