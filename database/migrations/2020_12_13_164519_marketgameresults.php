<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Marketgameresults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('marketgameresults', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gameno')->nullable();
            $table->string('feedgameno')->nullable();
            $table->string('ghome')->nullable();
        

            $table->string('gdraw')->nullable();
            $table->string('gaway')->nullable();
            $table->string('uupdate')->nullable();



            $table->string('del')->nullable()->default('0');
            $table->string('ucret');
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
