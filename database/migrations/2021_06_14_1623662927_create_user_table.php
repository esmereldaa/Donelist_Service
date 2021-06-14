<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {

		$table->increments('user_id')->start_from(10);
		$table->string('token',100)->nullable()->default('NULL');
		$table->string('uname',50);
		$table->string('password',50);
		$table->string('email',100)->nullable()->default('NULL');

        });
    }

    public function down()
    {
        Schema::dropIfExists('user');
    }
}