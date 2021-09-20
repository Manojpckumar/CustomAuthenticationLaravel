<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_bills', function (Blueprint $table) {
            
            $table->id();

            $table->text('store_code');
            $table->text('ref_invnum');
            $table->text('sale_type');
            $table->text('party_name');
            $table->text('gst_num');
            $table->text('inv_num');
            $table->date('bill_date');
            $table->text('bill_des');
            $table->text('state_sale');
            $table->text('bill_copy');

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
        Schema::dropIfExists('sale_bills');
    }
}
