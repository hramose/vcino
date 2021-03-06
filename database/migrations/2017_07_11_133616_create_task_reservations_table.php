<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_reservations', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('task_id')->unsigned();
            $table->foreign('task_id')->references('id')->on('tasks');
			
			$table->integer('property_id')->unsigned();
            $table->foreign('property_id')->references('id')->on('properties');
			
			$table->integer('contact_id')->unsigned();
            $table->foreign('contact_id')->references('id')->on('contacts');
			
			$table->integer('installation_id')->unsigned();
            $table->foreign('installation_id')->references('id')->on('installations');
			
			$table->integer('quota_id')->unsigned();
            $table->foreign('quota_id')->references('id')->on('quotas');
			
			$table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');
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
        Schema::drop('task_reservations');
    }
}
