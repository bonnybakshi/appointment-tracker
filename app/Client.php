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

    /**
	*
	*/
    public static function getForDropdown() {

        # Clients
        $clients = Client::orderBy('name', 'ASC')->get();

        $clients_for_dropdown = [];
        foreach($clients as $client) {
            $clients_for_dropdown[$client->id] = $client->name;
        }

        return $clients_for_dropdown;
    }
}
