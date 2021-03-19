<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cintransfers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('cintransfers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('branchto')->nullable();
            $table->string('branchfrom')->nullable();
            $table->string('transferdate')->nullable();
            $table->unsignedInteger('amount')->nullable();
            $table->string('description')->nullable();
            $table->string('ucomplete')->nullable();
            $table->string('comptime')->nullable();
            $table->string('status')->nullable()->default('1');
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
