<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Work;
use App\Models\Rest;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        for ($i = 0; $i < 14; $i++) {
            $date = now()->subDays($i)->format('Y-m-d');
            $usedUserIds = [];

            foreach ($users as $user) {
                if (count($usedUserIds) >= 10) {
                    break;
                }

                if (Work::where('users_id', $user->id)->where('work_date', $date)->exists()) {
                    continue;
                }

                $work = Work::factory()
                    ->state([
                        'users_id' => $user->id,
                        'work_date' => $date,
                    ])
                    ->create();
                Rest::factory(rand(1, 2))->create(['works_id' => $work->id]);

                $usedUserIds[] = $user->id;
            }
        }
    }
}
