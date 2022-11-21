<?php

namespace App\Models;

/**
 * Used for transversal instance of clases sahring the same table (Ex: buildings, rooms, etc...)
 * For this to work, the table must have a type column, the type column must be a string with the name of the class
 * this is not polymorphic, it is a simple way to have a single table for multiple classes
 */
trait Child
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
