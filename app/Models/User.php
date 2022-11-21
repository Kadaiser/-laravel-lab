<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be encripted using ORM Elocuent Mutator
     * ( set - field - property)
     *
     * @pass array<int, string>
     */
    public function setPasswordAttribute(String $pass = null)
    {
        $this->attributes['password'] = bcrypt($pass);
    }

    public function chirps()
    {
        return $this->hasMany(Chirp::class);
    }

    public function getRole()
    {
        return 'User';
    }


    protected $table = 'users';

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

        //dd($attributes);
        // This method just provides a convenient way for us to generate fresh model
        // instances of this current model. It is particularly useful during the
        // hydration of new objects via the Eloquent query builder instances.
        $model = ( isset($attributes['type']) ) ? 
            new $attributes['type']($attributes) :
            new static($attributes);

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
        //dd($attributes);
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
