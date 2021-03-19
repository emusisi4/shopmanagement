<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Btsports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('btsports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sysid')->nullable();
            $table->string('feedid')->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
           

            $table->string('status')->nullable();
           


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
