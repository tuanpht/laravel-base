<?php

namespace App\Models\Services;

use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseService
{
    protected function find($model, $key)
    {
        return $model->findOrFail($key);
    }

    protected function getModels($query, $params)
    {
        if (isset($params['orders'])) {
            $orders = $params['orders'];
            $query->orderBy($orders[0], $orders[1] ?? 'asc');
        }

        if (isset($params['limit'])) {
            return $query->paginate($params['limit']);
        }

        $allItems = $query->get();
        $total = $allItems->count();

        return new LengthAwarePaginator($allItems, $total, $total, 1);
    }
}
