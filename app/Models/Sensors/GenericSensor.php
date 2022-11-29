<?php

namespace App\Models\Sensors;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenericSensor extends Model
{
    use HasFactory;

    protected $table = 'sensors';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
    ];

}
