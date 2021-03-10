<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Btcountries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 
        Schema::create('btcountries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('flag')->nullable();
            $table->string('feedid')->nullable();
            $table->string('sysid')->nullable();
            $table->string('status')->nullable();
            
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
