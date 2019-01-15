<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class CalendarEvent extends Model implements \MaddHatter\LaravelFullcalendar\Event
{
    protected $fillable = ['title'];
    protected $dates = ['start', 'end'];

    /**
     * Get the event's id number
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the event's title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the event's title
     *
     * @return string
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this->getTitle();
    }

    /**
     * Is it an all day event?
     *
     * @return bool
     */
    public function isAllDay()
    {
        return (bool)$this->all_day;
    }

    /**
     * Set an all day event
     *
     * @return bool
     */
    public function setAllDay(bool $allDay)
    {
        $this->all_day = $allDay;
        return $this->isAllDay();
    }

    /**
     * Get the start time
     *
     * @return DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set the start time
     *
     * @return DateTime
     */
    public function setStart(string $start, string $timeZone)
    {
        $this->start = Carbon::createFromFormat("m-d-Y H:i:s", $start, $timeZone)->timezone('UTC');
        return $this->getStart();
    }

    /**
     * Get the end time
     *
     * @return DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set the end time
     *
     * @return DateTime
     */
    public function setEnd(string $end, string $timeZone)
    {
        $this->end = Carbon::createFromFormat("m-d-Y H:i:s", $end, $timeZone)->timezone('UTC');
        return $this->getEnd();
    }

}
