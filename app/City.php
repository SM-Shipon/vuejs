<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable= ['country_id','district_id','name'];

    public function district()
    {
        return $this->belongsTo(District::class,'district_id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }

}
