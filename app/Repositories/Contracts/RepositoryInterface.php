<?php

namespace App\Repositories\Contracts;

use Illuminate\Container\Container as Application;

interface RepositoryInterface
{
    public function __construct(Application $app);

    public function getFieldsSearchable();

    public function model();

    public function makeModel();

    public function paginate($perPage, $columns = ['*']);

    public function allQuery($search = [], $skip = null, $limit = null);

    public function all($search = [], $skip = null, $limit = null, $columns = ['*']);

    public function create($input);

    public function find($id, $columns = ['*']);

    public function update($input, $id);

    public function delete($id);

    public function createGetId(array $data);

    public function deleteAndDetachingRelations($id, array $relations);
}
