<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectClientsAndAppointments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointments', function (Blueprint $table) {
            # Add a new INT field called `author_id` that has to be unsigned (i.e. positive)
            $table->integer('client_id')->unsigned();

            # This field `client_id` is a foreign key that connects to the `id` field in the `client` table with on delete cascade
            $table->foreign('client_id')
                  ->references('id')->on('clients')
                 ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointments', function (Blueprint $table) {

            # ref: http://laravel.com/docs/migrations#dropping-indexes
            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('appointments_client_id_foreign');

            $table->dropColumn('client_id');
        });
    }
}
