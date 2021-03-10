<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Madeexpenses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('madeexpenses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('expensename')->nullable();
            $table->unsignedInteger('amount')->nullable()->default('0');
            $table->string('datemade')->nullable();
            $table->string('branch')->nullable();
          
            $table->string('description')->nullable();
          
            $table->string('approvalstate')->nullable();
            $table->string('explevel')->nullable();
            $table->string('walletexpense')->nullable();

            $table->string('category')->nullable();
            $table->string('exptype')->nullable();

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
