<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectStacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_stacks', function (Blueprint $table) {
            $table->increments('id_project_stack');
            $table->integer('id_project')->unsigned()->nullable();
            $table->integer('id_stack')->unsigned()->nullable();
            $table->integer('by_users')->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('id_project')->references('id_project')->on('projects')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_stack')->references('id_stack')->on('stacks')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_stacks');
    }
}
