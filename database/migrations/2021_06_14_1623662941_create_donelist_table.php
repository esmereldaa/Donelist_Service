<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonelistTable extends Migration
{
    public function up()
    {
        Schema::create('donelist', function (Blueprint $table) {

		$table->integer('list_id',5);
		$table->integer('user_id',5);
		$table->string('task_data');
		$table->datetime('date');

        });

        
        DB::statement('ALTER TABLE donelist AUTO_INCREMENT = 10;');
    }

    public function down()
    {
        Schema::dropIfExists('donelist');
    }
}