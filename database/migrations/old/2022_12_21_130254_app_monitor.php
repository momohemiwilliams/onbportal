<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AppMonitor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_monitor', function (Blueprint $table) {
            $table->id();
            $table->string('app_code'); 
            $table->string('app_time'); 
            $table->string('dsd_user'); 
            $table->string('dsd_user_time'); 
            $table->string('meg_user'); 
            $table->string('meg_user_time'); 
            $table->string('dod_user'); 
            $table->string('dod_user_time'); 
            $table->string('icg_user'); 
            $table->string('icg_user_time'); 
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
