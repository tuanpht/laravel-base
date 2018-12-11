<?php

namespace App\Models\Services;

use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseService
{
    protected function getModels($query, $params)
    {
        if (isset($params['orderBy'])) {
            $orders = explode('.', $orderBy);
            $query->orderBy($orders[0], $orders[1]);
        }

        if (isset($params['limit']) && $params['limit']) {
            return $query->paginate($params['limit']);
        }

        $allItems = $query->get();
        $total = $allItems->count();

        return new LengthAwarePaginator($allItems, $total, $total, 1);
    }
}
