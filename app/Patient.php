<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    Protected $fillable = [
        'first_name',
        'last_name',
    	  'dob',
      	'division_id'
  	];

  	//patient belongs to division
  	public function division(){
        return $this->belongsTo(Division::class);
    }

    //patient has many treatments
    public function Treatments(){
        return $this->hasMany(Treatment::class);
    }


}