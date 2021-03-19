<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Branchtobalances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('branchtobalances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('branchnametobalance')->nullable();
            $table->string('datedone')->nullable();
         
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
