<?php

namespace App\Models;

use App\Models\Traits\PostFilters;

class Post extends BaseModel
{
    use PostFilters;

    protected $fillable = [
        'slug',
        'title',
        'excerpt',
        'body',
        'published',
        'publish_date',
        'featured_image',
        'featured_image_caption',
        'author_id',
    ];

    protected $dates = ['publish_date'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
