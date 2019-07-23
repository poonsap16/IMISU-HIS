<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{

    Protected $fillable = ['name'];

  	
  	//division has many patients
    public function patients(){
        return $this->hasMany(Patient::class);
    }

}
