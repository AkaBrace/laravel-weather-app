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
}
