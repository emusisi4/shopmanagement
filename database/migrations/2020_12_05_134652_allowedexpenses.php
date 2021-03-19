<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Allowedexpenses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('allowedexpenses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('expense')->nullable();
          
            $table->string('branch');
         
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
        Schema::dropIfExists('allowedexpenses');
    }
}
