<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_stack', function (Blueprint $table) {
            $table->increments('id_product_stack');
            $table->integer('id_product')->unsigned()->nullable();
            $table->integer('id_stack')->unsigned()->nullable();

            $table->integer('by_users')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('id_product')->references('id_product')->on('product')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_stack')->references('id_stack')->on('stack')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_stack');
    }
}
