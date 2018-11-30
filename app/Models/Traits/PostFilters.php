<?php

namespace App\Models\Traits;

trait PostFilters
{
    protected $filterable = [
        'published' => 'filterByPublished',
    ];

    public function filterByPublished($query, $published)
    {
        if ($published === '' || $published === null) {
            return $query;
        }

        return $query->where('published', (bool) $published);
    }
}
