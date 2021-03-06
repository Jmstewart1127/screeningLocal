<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Positions extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'businessName', 'positionName', 'screening',
    ];

    public function business()
    {
        return $this->hasOne('App\Business');
    }
}
