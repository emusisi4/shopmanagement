<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Branches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
         //   $table->string('branch_id')->nullable();
            $table->string('branchno')->nullable();
            $table->string('branchname')->nullable();
            $table->string('location')->nullable();
            $table->string('contact')->nullable();
            $table->string('del')->default('0');
            $table->unsignedInteger('openningbalance');
          
         
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
        Schema::dropIfExists('branches');
    }
}
