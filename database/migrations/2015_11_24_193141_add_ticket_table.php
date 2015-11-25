<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('comment');

            $table->integer('id_priority')->unsigned();
            $table->integer('id_status')->unsigned();

            $table->timestamps();

            $table->foreign('id_priority')->references('id')->on('priority');
            $table->foreign('id_status')->references('id')->on('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ticket');
    }
}
