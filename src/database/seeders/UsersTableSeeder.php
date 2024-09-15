<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($cnt = 1; $cnt <= 10; $cnt++) {
            $param = [
                'name' => 'テストユーザー' . $cnt,
                'email' => 'test' . $cnt . '@example.com',
                'password' => bcrypt('password'),
            ];
            DB::table('users')->insert($param);
        }
    }
}
