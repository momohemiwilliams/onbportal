<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGroupIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          // 1. Create new column
            // You probably want to make the new column nullable
            $table->integer('group_id')->unsigned()->nullable()->after('password');

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
        Schema::table('users', function (Blueprint $table) {

            // 1. Drop foreign key constraints
            $table->dropForeign(['group_id']);

            // 2. Drop the column
            $table->dropColumn('group_id');
        });
    }
}
