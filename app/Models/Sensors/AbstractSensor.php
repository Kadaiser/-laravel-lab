<?php

namespace App\Models\Sensors;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Interfaces\SensorInterface;

abstract class AbstractSensor extends Model implements SensorInterface
{
    use HasFactory;

    protected $table = 'sensors';

    public function sensorable()
    {
        return $this->morphTo();
    }

    public function getType(){
        return (new \ReflectionClass(get_called_class()))->getShortName();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    /*
    protected $fillable = [
        'type',
    ];
    */

    protected $guarded = [];

    /**
     * Create a new instance of the given model.
     * 
     * OVERWRITE FROM namespace Illuminate\Database\Eloquent;
     * to obtain Single Table Inheritance in Laravel
     *
     * @param  array  $attributes
     * @param  bool  $exists
     * @return static
     */
    public function newInstance($attributes = [], $exists = false)
    {

        //\dd($attributes);
        // This method just provides a convenient way for us to generate fresh model
        // instances of this current model. It is particularly useful during the
        // hydration of new objects via the Eloquent query builder instances.
        $model = (!isset($attributes['type']) || is_null($attributes['type'])) ? 
            new static($attributes) :
            new $attributes['type']($attributes);

        $model->exists = $exists;

        $model->setConnection(
            $this->getConnectionName()
        );

        $model->setTable($this->getTable());

        $model->mergeCasts($this->casts);

        $model->fill((array) $attributes);

        return $model;
    }

    /**
     * Create a new model instance that is existing.
     *
     * OVERWRITE FROM namespace Illuminate\Database\Eloquent;
     * to obtain Single Table Inheritance in Laravel
     * 
     * @param  array  $attributes
     * @param  string|null  $connection
     * @return static
     */
    public function newFromBuilder($attributes = [], $connection = null)
    {
        $attributes = (array) $attributes;
        $model = $this->newInstance(attributes: [
            'type' => $attributes['type'] ?? null
        ], exists: true);

        //Cause the instance itself told us what type it is, we can eliminate type from the attributes
        $model->setRawAttributes(attributes: \Arr::except(array: $attributes, keys:'type'), sync: true);

        $model->setConnection($connection ?: $this->getConnectionName());

        $model->fireModelEvent('retrieved', false);

        return $model;
    }
}