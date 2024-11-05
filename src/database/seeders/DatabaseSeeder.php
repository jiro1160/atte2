<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Work;
use App\Models\Rest;
use App\Models\User;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory(100)->create();

        foreach ($users as $user) {
            $startDate = Carbon::now()->subDays(14);

            for ($i = 0; $i < 14; $i++) {
                $workDate = (clone $startDate)->addDays($i);

                $startTime = Carbon::createFromTime(rand(8, 12), 0, 0);

                $endTime = (clone $startTime)->addMinutes(rand(300, 540));

                $work = Work::factory()->create([
                    'users_id' => $user->id,
                    'work_date' => $workDate->format('Y-m-d'),
                    'start_time' => $startTime->format('H:i:s'),
                    'end_time' => $endTime->format('H:i:s'),
                ]);

                $numberOfRests = rand(1, 3);
                for ($j = 0; $j < $numberOfRests; $j++) {
                    Rest::factory()->for($work)->create();
                }
            }
        }
    }
}
