<?php

namespace App\Traits\Eloquent;

use Illuminate\Database\Eloquent\Builder;

trait OrderableTrait
{
    public function scopeLatestFirst(Builder $query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}