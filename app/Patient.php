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
}