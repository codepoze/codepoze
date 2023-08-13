<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id_product');
            $table->integer('id_type')->unsigned()->nullable();
            $table->integer('id_based')->unsigned()->nullable();
            $table->integer('id_price')->unsigned()->nullable();
            $table->string('judul', 50)->nullable();
            $table->binary('gambar')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('link_demo')->nullable();
            $table->text('link_github')->nullable();

            $table->integer('by_users')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('id_type')->references('id_type')->on('type')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_based')->references('id_based')->on('based')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_price')->references('id_price')->on('price')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
