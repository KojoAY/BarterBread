<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActiveUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('active_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userid'); // user id (id in the users table) not the accid
            $table->string('userip')->nullable();
            $table->string('active_status')->nullable();
            $table->string('datetime_in')->nullable();
            $table->string('datetime_out')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('active_users');
    }
}
