<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Btsportandcountries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('btsportandcountries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('syssport')->nullable();
            $table->string('country')->nullable();
            $table->string('feedsport')->nullable();
            $table->string('syscountry')->nullable();
           
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
