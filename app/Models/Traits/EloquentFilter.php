<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait EloquentFilter
{
    /**
     * @param Builder|Model $query
     * @param array $params
     *
     * @return Builder
     */
    public function scopeApplyFilters($query, array $params = [])
    {
        if (!$params) {
            return $query;
        }

        // Default filter by all fillable fields
        $filterable = isset($this->filterable) ?
            $this->filterable :
            array_combine($this->fillable, $this->fillable);

        $queries = [];
        $defaultFilters = [];
        foreach ($params as $field => $value) {
            if (empty($filterable[$field])) {
                continue;
            }

            $filter = $filterable[$field];
            if (method_exists($this, $filter)) {
                $queries[] = call_user_func([$this, $filter], clone $query, $value);
            } elseif (is_string($filter)) {
                $defaultFilters[$field] = $value;
            }
        }

        $newQuery = clone $query;
        if ($queries || $defaultFilters) {
            $newQuery->where(function ($curentQuery) use ($defaultFilters, $queries) {
                foreach ($queries as $q) {
                    $curentQuery->addNestedWhereQuery($q->getQuery());
                }

                foreach ($defaultFilters as $field => $value) {
                    $curentQuery->where($field, '=', $value);
                }
            });
        }

        return $newQuery;
    }
}
