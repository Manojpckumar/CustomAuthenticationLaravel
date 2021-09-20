<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->text('store_code');
            $table->text('so_name');
            $table->text('s_name');
            $table->text('s_email');
            $table->text('s_phone');
            $table->text('s_address');
            $table->text('s_place');
            $table->text('s_gst');
            $table->text('s_pan');
            $table->text('s_username');
            $table->text('s_password');
            $table->text('s_usertype');
            $table->text('s_userstatus');
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
        Schema::dropIfExists('stores');
    }
}
