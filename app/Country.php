<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable= ['name'];

    public function districts()
    {
        return $this->hasMany(District::class);
    }
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
