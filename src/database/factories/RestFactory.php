<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Rest;
use App\Models\Work;
use Carbon\Carbon;

class RestFactory extends Factory
{
    protected $model = Rest::class;

    public function definition()
    {
        $startTime = $this->faker->time('H:i:s');
        $duration = rand(30, 60);
        $end_time = Carbon::createFromFormat('H:i:s', $startTime)->addMinutes($duration)->format('H:i:s');

        return [
            'start_time' => $startTime,
            'end_time' => $end_time,
        ];
    }
}
