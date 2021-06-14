<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonelistTable extends Migration
{
    public function up()
    {
        Schema::create('donelist', function (Blueprint $table) {

        $table->increments('list_id')->start_from(10);
		$table->integer('user_id',5)->nullable();
		$table->string('task_data')->nullable();
		$table->datetime('date')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('donelist');
    }
}