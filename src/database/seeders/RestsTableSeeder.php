<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Rest;
use App\Models\Work;

class RestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $works = Work::all();

        foreach ($works as $work) {
            Rest::factory()->create([
                'works_id' => $work->id,
            ]);
        }
    }
}
