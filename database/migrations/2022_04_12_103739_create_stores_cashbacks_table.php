<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresCashbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores_cashbacks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('cashback_id');
            $table->decimal('perc_cashback', 5,2)->nullable();
            $table->string('link', 150)->nullable();
            $table->timestamps();
            $table->foreign('store_id')->references('id')->on('stores');
            $table->foreign('cashback_id')->references('id')->on('cashbacks');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores_cashbacks');
    }
}
