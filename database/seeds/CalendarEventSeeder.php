<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CalendarEventSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\CalendarEvent::truncate();
        App\CalendarEvent::create([
            'title' => 'Great Things Expo',
            'all_day' => false,
            'start' => Carbon::now(),
            'end' => Carbon::now()->addHour()
        ]);
    }
}
