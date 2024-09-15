<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'users_id' => 1,
            'work_date' => '2024-8-27',
            'start_time' => '08:00:00',
            'end_time' => '17:00:00',
        ];
        DB::table('works')->insert($param);
    }
}
