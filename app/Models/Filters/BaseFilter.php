<?php

namespace App\Models\Filters;

use Illuminate\Database\Eloquent\Builder;

class BaseFilter implements FilterInterface
{
    protected $builder;

    protected $filterParams;

    protected $orderParams;

    public function __construct(array $filterParams = [], array $orderParams = [])
    {
        $this->filterParams = $filterParams;

        $this->orderParams = $orderParams;
    }

    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        $tableName = $builder->getModel()->getTable();

        // Filter
        $defaultFilters = [];
        foreach ($this->filterParams as $field => $value) {
            $filterMethod = 'filterBy' . camel_case($field);

            if (method_exists($this, $filterMethod)) {
                $this->$filterMethod($value);
            } else {
                $defaultFilters[$field] = $value;
            }
        }

        if ($defaultFilters) {
            $this->builder->where(function ($query) use ($defaultFilters, $tableName) {
                foreach ($defaultFilters as $field => $value) {
                    $query->where($tableName . '.' . $field, '=', $value);
                }
            });
        }

        // Order
        foreach ($this->orderParams as $field => $orderDir) {
            $sortMethod = 'sortBy' . camel_case($field);

            if (method_exists($this, $sortMethod)) {
                $this->$sortMethod($value);
            } else {
                $this->builder->orderBy($tableName . '.' . $field, $orderDir);
            }
        }

        return $this->builder;
    }
}
