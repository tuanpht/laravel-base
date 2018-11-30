<?php

namespace App\Models\Queries;

class UsersQueries extends BaseQuery
{
    protected $filterable = [
        'published' => 'filterByPublished',
    ];

    public function filterByPublished($query, $published)
    {
        if ($published === '' || $published === null) {
            return false;
        }

        return $query->where('published', (bool) $published);
    }
}
