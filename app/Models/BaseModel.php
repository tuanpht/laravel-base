<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\EloquentFilter;

abstract class BaseModel extends Model
{
    use EloquentFilter;

    public static function getTableName()
    {
        return (new static)->getTable();
    }
}
