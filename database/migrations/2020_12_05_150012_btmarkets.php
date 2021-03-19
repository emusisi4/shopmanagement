<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Btmarkets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('btmarkets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mktname')->nullable();
            $table->string('sysid')->nullable();
            $table->string('feedid')->nullable();
            $table->string('shortcode')->nullable();
           
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
