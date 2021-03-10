<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Expensereporttoviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('expensereporttoviews', function (Blueprint $table) {
            $table->increments('id');
            $table->string('startdate')->nullable();
            $table->string('enddate')->nullable();
            $table->string('branch')->nullable();
          
            $table->string('reporttype')->nullable();
          
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
