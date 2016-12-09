<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

	    # Define the users you want to add
	    $users = [
	        ['jill@harvard.edu','Jill','helloworld',0], # <-- Required for P4
	        ['jamal@harvard.edu','Jamal','helloworld',0], # <-- Required for P4
	        ['jessica@gmail.com','Jessica','helloworld',0], 
	        ['abbie@gmail.com','Abbie','helloworld',0], 
	        ['dana@gmail.com','Dana','helloworld',0], 
	        ['admin@harvard.edu','Admin','helloworld',1] # <-- Admin 
	    ];

	    # Get existing users to prevent duplicates
	    $existingUsers = User::all()->keyBy('email')->toArray();

	    foreach($users as $user) {

	        # If the user does not already exist, add them
	        if(!array_key_exists($user[0],$existingUsers)) {
	            $user = User::create([
	                'email' => $user[0],
	                'name' => $user[1],
	                'password' => Hash::make($user[2]),
	                'admin' => $user[3]
	            ]);
	        }
	    }
	}

}
