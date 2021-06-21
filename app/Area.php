<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Area extends Model
{
    use NodeTrait;

    protected $fillabled = ['name', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
