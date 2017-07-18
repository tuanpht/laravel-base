<?php

namespace App\Services\Api;

use App\Services\Api\Contracts\BaseServiceInterface;
use App\Services\Api\Contracts\CanSortAndFilter;
use App\Services\Api\Values\ApiParam;
use App\Models\Filters\FilterInterface;

abstract class BaseService implements BaseServiceInterface, CanSortAndFilter
{
    /**
     * @var Eloquent model
     */
    protected $model;

    public function getList(ApiParam $param, FilterInterface $filter = null)
    {
        return [
            'http_status' => 200,
            'is_error' => false,
            'data' => $this->model->filter($filter)->apiPaginate($param),
        ];
    }

    public function getDetail($id)
    {
        return [
            'http_status' => 200,
            'is_error' => false,
            'data' => $this->model->find($id),
        ];
    }

    public function getSortable()
    {
        return $this->model->getFillable() ?: ['*'];
    }

    public function getFilterable()
    {
        return $this->model->getFillable() ?: ['*'];
    }
}
