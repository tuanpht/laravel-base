<?php

namespace App\Models\Services;

use App\Models\Post;

class PostService extends BaseService
{
    public function get(array $params)
    {
        $query = Post::applyFilters($params);

        return $this->getModels($query, $params);
    }
}
