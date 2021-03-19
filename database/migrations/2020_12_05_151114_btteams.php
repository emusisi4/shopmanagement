<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Btteams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('btteams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('sysid')->nullable();
            $table->string('feedid')->nullable();
            $table->string('description')->nullable();
            $table->string('countryid')->nullable();
            $table->string('countryfeedid')->nullable();
            $table->string('badge')->nullable();
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
