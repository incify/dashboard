<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomProfile extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'custom_profile';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * Fillable fields for a Profile.
     *
     * @var array
     */
    protected $fillable = [
        'phone',
        'wallet',
    ];
    public $timestamps = false;
    /**
     * A profile belongs to a user.
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
