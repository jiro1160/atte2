<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Work;
use App\models\User;
use Carbon\Carbon;

class WorkFactory extends Factory
{
    protected $model = Work::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userId = User::inRandomOrder()->first()->id;
        $workDate = Carbon::now()->format('Y-m-d');
        $startTime = Carbon::now()->createFromTime(rand(8, 10));
        $endTime = (clone $startTime)->addHours(rand(7, 9));

        return [
            'users_id' => $userId,
            'work_date' => $workDate,
            'start_time' => $startTime->format('H:i:s'),
            'end_time' => $endTime->format('H:i:s'),
        ];
    }
}
