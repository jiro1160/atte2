<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Rest;
use App\Models\Work;
use Carbon\Carbon;

class RestFactory extends Factory
{
    protected $model = Rest::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $work = Work::inRandomOrder()->first();
        $restStartTime = Carbon::parse($work->start_time)->addHours(rand(1, 4));
        $restEndTime = (clone $restStartTime)->addMinutes(rand(30, 60));

        return [
            'works_id' => $work->id,
            'start_time' => $restStartTime->format('H:i:s'),
            'end_time' => $restEndTime->format('H:i:s'),
        ];
    }
}
