<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    
    /* Relationship Methods */
    /**
	*
	*/
    public function appointments() {
        # Author has many Books
        # Define a one-to-many relationship.
        return $this->hasMany('App\Appointment');
    }
}
