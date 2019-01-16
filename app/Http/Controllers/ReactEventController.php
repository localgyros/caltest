<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Calendar;
use App\CalendarEvent;
use App\Http\Resources\CalendarEvent as CalendarEventResource;

class ReactEventController extends Controller
{
    public function index()
    {
        $events = CalendarEvent::all()->toJson();
        // dd($events);
        // $calendar = Calendar::addEvents($events)->setOptions(['themeSystem' => 'bootstrap4', 'timezone' => 'local']);
        return view('reactcalendar', compact('events'));
    }

    public function show(?int $id = null)
    {
        return $id ? new CalendarEventResource(CalendarEvent::find($id))
            : CalendarEventResource::collection(CalendarEvent::all());
    }

    public function create(Request $request)
    {
        $event = new CalendarEvent();
        $event->setTitle($request->get('title'));
        $event->setAllDay($request->get('all_day'));
        $event->setStart($request->get('start'), $request->get('time_zone'));
        $event->setEnd($request->get('end'), $request->get('time_zone'));

        try {
            $event->save();
            return $event;
        } catch (Exception $e) {
            return "{'error' : {$e} }";
        }
    }
}
