<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'zip_code',
    ];

    /**
     * Creates a relationship with the User Model as a parent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user ()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Creates a nested relationship with the Weather Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function weather ()
    {
        return $this->hasOne('App\Weather');
    }
}
