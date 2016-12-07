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
		    'email' => 'jessica.s@gmail.com',
	    ]);

	     DB::table('clients')->insert([
		    'created_at' => Carbon\Carbon::now()->toDateTimeString(),
		    'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
		    'name' => 'Abbie Vincent',
		    'phone' => '543-333-2222',
		    'email' => 'abbie.v@gmail.com',
	    ]);

	    DB::table('clients')->insert([
		    'created_at' => Carbon\Carbon::now()->toDateTimeString(),
		    'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
		    'name' => 'Dana Jones',
		    'phone' => '777-444-5555',
		    'email' => 'dana.j@gmail.com',
	    ]);

	    DB::table('clients')->insert([
		    'created_at' => Carbon\Carbon::now()->toDateTimeString(),
		    'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
		    'name' => 'Tina Miller',
		    'phone' => '333-888-8888',
		    'email' => 'tina.m@gmail.com',
	    ]);

	    DB::table('clients')->insert([
		    'created_at' => Carbon\Carbon::now()->toDateTimeString(),
		    'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
		    'name' => 'Pamela Davis',
		    'phone' => '223-432-3454',
		    'email' => 'p.davis@gmail.com',
	    ]);

	    DB::table('clients')->insert([
		    'created_at' => Carbon\Carbon::now()->toDateTimeString(),
		    'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
		    'name' => 'Nancy Taylor',
		    'phone' => '718-324-5434',
		    'email' => 'nancy.t@gmail.com',
	    ]);
    }
}
