<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->increments('id_project');
            $table->integer('id_based')->unsigned()->nullable();
            $table->string('judul', 50)->nullable();
            $table->binary('gambar')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('link_demo')->nullable();
            $table->text('link_github')->nullable();

            $table->integer('by_users')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();

            $table->foreign('id_based')->references('id_based')->on('based')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
