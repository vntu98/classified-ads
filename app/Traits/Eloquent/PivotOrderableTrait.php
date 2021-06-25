<?php

namespace App\Traits\Eloquent;

use Illuminate\Database\Eloquent\Builder;

trait PivotOrderableTrait
{
    public function scopeOrderByPivot(Builder $query, $column = 'created_at', $order = 'desc')
    {
        return $query->orderBy('pivot_' . $column, $order);
    }
}