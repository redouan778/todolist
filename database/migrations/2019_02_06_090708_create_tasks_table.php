<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
          $table->increments('Task_id');
          $table->string('Task_title');
          $table->unsignedInteger('User_id');
          $table->unsignedInteger('List_id');
          $table->mediumText('Task_description');
          $table->timestamps();
          $table->foreign('User_id')->references('id')->on('users');
          // $table->foreign('list_id')->references('list_id')->on('ListModel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
