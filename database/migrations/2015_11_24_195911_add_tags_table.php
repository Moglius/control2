<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        // Tabla pivot
        Schema::create('tag_ticket', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tag')->unsigned();
            $table->integer('id_ticket')->unsigned();
            //$table->unique(['id_tag', 'id_ticket']);

            $table->timestamps();

            //claves foraneas de la tabla pivot
            $table->foreign('id_tag')->references('id')->on('tags')->onDelete('cascade');
            $table->foreign('id_ticket')->references('id')->on('ticket')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tags');
    }
}
