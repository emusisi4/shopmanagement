<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Btmktevents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('btmktevents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('market')->nullable();
            $table->string('eventid')->nullable();
            $table->string('feedevent')->nullable();
            $table->string('eventcode')->nullable();
            $table->string('feedcountry')->nullable();
            $table->string('description')->nullable();
           

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
