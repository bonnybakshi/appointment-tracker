<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('clients')->insert([
		    'created_at' => Carbon\Carbon::now()->toDateTimeString(),
		    'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
		    'name' => 'Jessica Smith',
		    'phone' => '714-222-3333',
		    'email' => 'jessica@gmail.com',
	    ]);

	     DB::table('clients')->insert([
		    'created_at' => Carbon\Carbon::now()->toDateTimeString(),
		    'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
		    'name' => 'Abbie Vincent',
		    'phone' => '543-333-2222',
		    'email' => 'abbie@gmail.com',
	    ]);

	    DB::table('clients')->insert([
		    'created_at' => Carbon\Carbon::now()->toDateTimeString(),
		    'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
		    'name' => 'Dana Jones',
		    'phone' => '777-444-5555',
		    'email' => 'dana@gmail.com',
	    ]);

	    DB::table('clients')->insert([
		    'created_at' => Carbon\Carbon::now()->toDateTimeString(),
		    'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
		    'name' => 'Jill',
		    'phone' => '223-432-3454',
		    'email' => 'jill@harvard.edu',
	    ]);

	    DB::table('clients')->insert([
		    'created_at' => Carbon\Carbon::now()->toDateTimeString(),
		    'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
		    'name' => 'Jamal',
		    'phone' => '718-324-5434',
		    'email' => 'jamal@harvard.edu',
	    ]);
    }
}
