<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InputSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('user')->insert([
        	'user_id' => 1,
        	'token' => 'd947e8d2d34b1df805ec72916ab6cf90',
        	'uname' => 'Luthfi',
        	'password' => 'password',
            'email' => 'luthfi@mail.com'
        ]);

        \DB::table('donelist')->insert([
        	'list_id' => 1,
        	'user_id' => 1,
        	'task_data' => 'creating project',
        	'password' => '2021-05-28 14:52:46'
        ]);
    }
}
