<?php

namespace App\Models\Queries;

class UserQueries extends BaseQuery
{
    protected $filterable = [
        'published' => 'filterByPublished',
    ];

    protected function filterByPublished($query, $published)
    {
        if ($published === '' || $published === null) {
            return false;
        }

        return $query->where('published', (bool) $published);
    }
}
