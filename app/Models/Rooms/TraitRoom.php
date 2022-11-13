<?php

namespace App\Models\Buildings;

/**
 * 
 */
trait TraitBuilding
{
    public static function boot()
    {
        parent::boot();

        static::creating(callback: function ($model) {
            $model->forceFill(['type' => static::class]);
        });
    }

    public static function booted()
    {
        static::addGlobalScope(scope: static::class, implementation: function ($builder) {
            $builder->where('type', static::class);
        });
    }
}
