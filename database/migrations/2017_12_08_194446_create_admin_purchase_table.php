<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminPurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_purchase', function (Blueprint $table) {
            $table->increments('purchase_id');
            $table->string('purchase_tag');
            $table->string('address');
            $table->string('details');
            $table->integer('amount');
            $table->string('location');
            $table->integer('contact');
            $table->string('status');
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
        Schema::dropIfExists('admin_purchase');
    }
}
