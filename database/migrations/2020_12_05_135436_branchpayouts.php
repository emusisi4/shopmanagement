<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Branchpayouts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('branchpayouts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('branch_id')->nullable();
            $table->string('receiptno')->nullable();
            $table->string('datemade')->nullable();
            $table->string('datepaid')->nullable();
            $table->string('bpaying')->nullable();
            $table->string('del')->default('0');
            $table->unsignedInteger('amount');
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
        //branchpayouts
       // Schema::dropIfExists('branchpayouts');
    }
}
