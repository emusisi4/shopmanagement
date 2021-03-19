<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Expenses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('expensename')->nullable();
            $table->string('expenseno')->nullable();
            $table->string('expensetype')->nullable();
          
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
