<?php

namespace App\Models\Queries;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class BaseQuery
{
    protected $filterable;

    protected $sortable;

    /**
     * @param Builder|Model $query
     * @param array $params
     *
     * @return Builder|Model
     */
    public function applyFilters($query, array $params = [])
    {
        if (!$params || !$this->filterable) {
            return $query;
        }

        $filteredQueries = [];
        foreach ($params as $field => $value) {
            if (empty($this->filterable[$field])) {
                continue;
            }

            $filter = $this->filterable[$field];
            if (method_exists($this, $filter)) {
                $filteredQuery = call_user_func([$this, $filter], clone $query, $value);
                if ($filteredQuery) {
                    $filteredQueries[] = $filteredQuery;
                }
            } elseif (is_string($filter)) {
                $filteredQueries = (clone $query)->where($field, '=', $value);
            }
        }

        $newQuery = clone $query;
        if ($filteredQueries) {
            $newQuery->where(function ($curentQuery) use ($filteredQueries) {
                foreach ($filteredQueries as $q) {
                    $curentQuery->addNestedWhereQuery($q->getQuery());
                }
            });
        }

        return $newQuery;
    }

    public function filterByKeyword($query, $options)
    {
        $keyword = trim($options['keyword']);
        if (!$keyword) {
            return false;
        }

        $searchColumns = $options['search_columns'] ?? [];
        if (mb_strpos($keyword, '%') === false) {
            $keyword = "%$keyword%";
        }

        return $query->where(function ($currentQuery) use ($keyword, $searchColumns) {
            foreach ($searchColumns as $col) {
                $currentQuery->orWhere($col, 'like', $keyword);
            }
        });
    }
}