<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Shopbalancingrecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('shopbalancingrecords', function (Blueprint $table) {
            $table->increments('id');
            $table->string('branch')->nullable();
            $table->string('datedone')->nullable();
 
            $table->unsignedInteger('opbalance')->nullable()->default('0');
            $table->unsignedInteger('vsales')->nullable()->default('0');
            $table->unsignedInteger('vpay')->nullable()->default('0');
            $table->unsignedInteger('vtkts')->nullable()->default('0');
            $table->unsignedInteger('vcan')->nullable()->default('0');
            $table->unsignedInteger('vprof')->nullable()->default('0');

       
            $table->unsignedInteger('scsales')->nullable()->default('0');
            $table->unsignedInteger('scpayout')->nullable()->default('0');
            $table->unsignedInteger('sctkts')->nullable()->default('0');
            $table->unsignedInteger('expenses')->nullable()->default('0');

            
            $table->unsignedInteger('cashin')->nullable()->default('0');
            $table->unsignedInteger('cashout')->nullable()->default('0');
            $table->unsignedInteger('reportedcash')->nullable()->default('0');
            $table->unsignedInteger('clcash')->nullable()->default('0');
            $table->unsignedInteger('shopdiff')->nullable()->default('0');
            $table->unsignedInteger('comment')->nullable()->default('0');



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
