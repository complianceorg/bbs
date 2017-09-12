<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
              $table->string('age');
              $table->string('sex');
              $table->string('job');
              $table->string('kaigaibo');
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
          $table->dropColumn('age');
          $table->dropColumn('sex');
          $table->dropColumn('job');
          $table->dropColumn('kaigaibo');
        });
    }
}
