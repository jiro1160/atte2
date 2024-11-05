<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Work;
use App\models\User;
use Carbon\Carbon;

class WorkFactory extends Factory
{
    protected $model = Work::class;

    public function definition()
    {
        $startTime = $this->faker->time('H:i:s');
        $endTime = Carbon::createFromFormat('H:i:s', $startTime)
->addHour()->format('H:i:s');

        return [
            'users_id' => User::inRandomOrder()->first()->id,
            'work_date' => $this->faker->date(),
            'start_time' => $startTime,
            'end_time' => $endTime,
        ];
    }
}
