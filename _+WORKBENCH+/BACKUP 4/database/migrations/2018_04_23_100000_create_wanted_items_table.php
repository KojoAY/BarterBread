<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWantedItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wanted_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('itemid');
            $table->string('userid');       // user id (id in the users table) not the accid
            $table->string('title')->nullable();
            $table->string('cash_opt')->nullable();
            $table->string('category')->nullable();
            $table->string('subcategory')->nullable();
            $table->string('description')->nullable();
            $table->string('list_datetime')->nullable();
            $table->string('update_datetime')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wanted_items');
    }
}
