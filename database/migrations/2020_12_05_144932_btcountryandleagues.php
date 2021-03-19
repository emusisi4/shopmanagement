<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Btcountryandleagues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('btcountryandleagues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sysleagueid')->nullable();
            $table->string('feedleguid')->nullable();
            $table->string('leaguename')->nullable();
            $table->string('syscountry')->nullable();
            $table->string('feedcountry')->nullable();
            $table->string('description')->nullable();
            $table->string('status')->nullable();
            $table->string('topleague')->nullable();
            $table->string('dporder')->nullable();

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
