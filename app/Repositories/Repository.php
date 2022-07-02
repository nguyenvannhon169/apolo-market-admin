<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Util\Exception;

abstract class Repository implements RepositoryInterface
{

    protected $model;

    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    abstract public function getFieldsSearchable();

    abstract public function model();

    public function makeModel()
    {
        $model = $this->app->make($this->model());
        if(!$model instanceof Model)
        {
            throw new Exception("Class {$this->model()} must be an instance of Model");
        }

        return $this->model = $model;
    }

    public function paginate($perPage, $columns = ['*'])
    {
        $query = $this->allQuery();

        return $query->paginate($perPage, $columns);
    }

    public function allQuery($search = [], $skip = null, $limit = null)
    {
        $query = $this->model->newQuery();

        if(count($search))
        {
            foreach ( $search as $key => $value)
            {
                if (in_array($key, $this->getFieldsSearchable())) {
                    $query->where($key, $value);
                }
            }
        }


        if (!is_null($skip)) {
            $query->skip($skip);
        }

        if (!is_null($limit)) {
            $query->limit($limit);
        }

        return $query;
    }

    public function all($search = [], $skip = null, $limit = null, $columns = ['*'])
    {
        $query = $this->allQuery($search, $skip, $limit);

        return $query->get($columns);
    }

    public function create($input)
    {
        $model = $this->model->newInstance($input);

        $model->save();

        return $model;
    }

    public function find($id, $columns = ['*'])
    {
        $query = $this->model->newQuery();

        return $query->find($id, $columns);
    }

    public function update($input, $id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        $model->fill($input);

        $model->save();

        return $model;
    }

    public function delete($id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        return $model->delete();
    }

    public function createGetId(array $data)
    {
        $query = $this->model->newQuery();

        $idsCreated = [];

        foreach ($data as $item)
        {
            $model = $query->create($item);

            $idsCreated[] = $model->id;
        }

        return $idsCreated;
    }

    public function deleteAndDetachingRelations($id, array $relations)
    {
        $modelName = $this->model();

        if ($id instanceof $modelName)
        {
            $model = $id->load($relations);
        }
        else
        {
            $model = $this->model->newQuery()->with($relations)->findOrFail($id);
        }

        foreach ($relations as $relation)
        {
            $model->$relation()->detach();
        }

        return $model->delete();
    }
}
