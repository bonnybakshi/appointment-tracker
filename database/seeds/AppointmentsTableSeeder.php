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
        $client_id = Client::where('name','=','Jessica Smith')->pluck('id')->first();

        DB::table('appointments')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'visit_date' => date('2016-04-09'),
        'visit_time' => '3:00',
        'visited' => 'complete',
        'client_id' => $client_id,
        'user_id' => 3,
        ]);
        
        $client_id = Client::where('name','=','Abbie Vincent')->pluck('id')->first();

        DB::table('appointments')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'visit_date' => date('2016-04-09'),
        'visit_time' => '4:30',
        'visited' => 'complete',
        'client_id' => $client_id,
        'user_id' => 4,
        ]);

        $client_id = Client::where('name','=','Dana Jones')->pluck('id')->first();

        DB::table('appointments')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'visit_date' => date('2016-04-09'),
        'visit_time' => '6:00',
        'visited' => 'complete',
        'client_id' => $client_id,
        'user_id' => 5,
        ]);

        $client_id = Client::where('name','=','Jill')->pluck('id')->first();

        DB::table('appointments')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'visit_date' => date('2016-04-09'),
        'visit_time' => '2:00',
        'visited' => 'complete',
        'client_id' => $client_id,
        'user_id' => 1,
        ]);

        $client_id = Client::where('name','=','Jill')->pluck('id')->first();

        DB::table('appointments')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'visit_date' => date('2016-04-09'),
        'visit_time' => '4:00',
        'visited' => 'complete',
        'client_id' => $client_id,
        'user_id' => 1,
        ]);

        $client_id = Client::where('name','=','Jamal')->pluck('id')->first();

        DB::table('appointments')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'visit_date' => date('2016-04-09'),
        'visit_time' => '5:00',
        'visited' => 'complete',
        'client_id' => $client_id,
        'user_id' => 2,
        ]);

        $client_id = Client::where('name','=','Jamal')->pluck('id')->first();

        DB::table('appointments')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'visit_date' => date('2016-04-09'),
        'visit_time' => '5:00',
        'visited' => 'complete',
        'client_id' => $client_id,
        'user_id' => 2,
        ]);

        $client_id = Client::where('name','=','Jamal')->pluck('id')->first();

        DB::table('appointments')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'visit_date' => date('2016-04-09'),
        'visit_time' => '5:00',
        'visited' => 'complete',
        'client_id' => $client_id,
        'user_id' => 2,
        ]);

        $client_id = Client::where('name','=','Jamal')->pluck('id')->first();

        DB::table('appointments')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'visit_date' => date('2016-04-09'),
        'visit_time' => '2:00',
        'visited' => 'pending',
        'client_id' => $client_id,
        'user_id' => 2,
        ]);

    }
}
