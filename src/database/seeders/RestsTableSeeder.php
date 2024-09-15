<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'works_id' => 1,
            'start_time' => '12:00:00',
            'end_time' => '13:00:00',
        ];
        DB::table('rests')->insert($param);
    }
}
