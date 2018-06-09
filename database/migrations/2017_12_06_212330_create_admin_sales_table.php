<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_sales', function (Blueprint $table) {
            $table->increments('sale_id');
            $table->string('sale_tag');
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
        Schema::dropIfExists('admin_sales');
    }
}
