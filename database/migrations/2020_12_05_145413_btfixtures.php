<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Btfixtures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('btfixtures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gameno')->nullable();
            $table->string('feedgameno')->nullable();
            $table->string('hometeam')->nullable();
            $table->string('awayteam')->nullable();
            $table->string('gamedate')->nullable();
            $table->string('league')->nullable();
            $table->string('gametime')->nullable();
            $table->string('status')->nullable();
          
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
