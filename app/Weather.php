<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    protected $fillable = [
        'current_observation', 'temperature_string', 'weather', 'relative_humidity', 'wind_string', 'feelslike_string', 'pressure_in', 'visibility_mi',
    ];

    public function userZipCode ()
    {
        return $this->belongsTo('App\UserZipCode');
    }
}
