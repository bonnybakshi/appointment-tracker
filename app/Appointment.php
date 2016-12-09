<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    
    /* Relationship Methods */
    /**
	* 
	*/
    public function client() {
        # Book belongs to Author
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Client');
    }

    public function user() {
    	return $this->belongsTo('App\User');
	}
}
