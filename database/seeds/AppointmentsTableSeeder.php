<?php

use Illuminate\Database\Seeder;
use App\Client;
class AppointmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client_id = Client::where('name','=','Jessica')->pluck('id')->first();

        DB::table('appointments')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'visit_date' => date('2016-12-27'),
        'visit_time' => '3:00 PM',
        'visited' => 'pending',
        'client_id' => $client_id,
        'user_id' => 3,
        ]);
        
        $client_id = Client::where('name','=','Abbie')->pluck('id')->first();

        DB::table('appointments')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'visit_date' => date('2016-12-27'),
        'visit_time' => '4:00 PM',
        'visited' => 'pending',
        'client_id' => $client_id,
        'user_id' => 4,
        ]);

        $client_id = Client::where('name','=','Dana')->pluck('id')->first();

        DB::table('appointments')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'visit_date' => date('2016-12-15'),
        'visit_time' => '6:00 PM',
        'visited' => 'complete',
        'client_id' => $client_id,
        'user_id' => 5,
        ]);

        $client_id = Client::where('name','=','Jill')->pluck('id')->first();

        DB::table('appointments')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'visit_date' => date('2016-12-27'),
        'visit_time' => '5:00 PM',
        'visited' => 'pending',
        'client_id' => $client_id,
        'user_id' => 1,
        ]);

        $client_id = Client::where('name','=','Jill')->pluck('id')->first();

        DB::table('appointments')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'visit_date' => date('2016-12-15'),
        'visit_time' => '4:00 PM',
        'visited' => 'complete',
        'client_id' => $client_id,
        'user_id' => 1,
        ]);

        $client_id = Client::where('name','=','Jamal')->pluck('id')->first();

        DB::table('appointments')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'visit_date' => date('2017-01-09'),
        'visit_time' => '5:00 PM',
        'visited' => 'pending',
        'client_id' => $client_id,
        'user_id' => 2,
        ]);

        $client_id = Client::where('name','=','Jamal')->pluck('id')->first();

        DB::table('appointments')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'visit_date' => date('2017-01-10'),
        'visit_time' => '6:00 PM',
        'visited' => 'pending',
        'client_id' => $client_id,
        'user_id' => 2,
        ]);

        $client_id = Client::where('name','=','Jamal')->pluck('id')->first();

        DB::table('appointments')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'visit_date' => date('2017-01-11'),
        'visit_time' => '7:00 PM',
        'visited' => 'pending',
        'client_id' => $client_id,
        'user_id' => 2,
        ]);

        $client_id = Client::where('name','=','Jamal')->pluck('id')->first();

        DB::table('appointments')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'visit_date' => date('2016-12-16'),
        'visit_time' => '2:30 PM',
        'visited' => 'complete',
        'client_id' => $client_id,
        'user_id' => 2,
        ]);

    }
}
