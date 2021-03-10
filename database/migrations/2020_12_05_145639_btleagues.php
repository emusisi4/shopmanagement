<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Btleagues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('btleagues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('leaguecountry')->nullable();
            $table->string('leaguesymbol')->nullable();
            $table->string('leaguecategory')->nullable();
            $table->string('sysid')->nullable();
            $table->string('feedid')->nullable();
            $table->string('sysstatus')->nullable()->default('1');
            $table->string('feedstatus')->nullable();
            $table->string('displayorder')->nullable();

            $table->string('topl')->nullable();
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
