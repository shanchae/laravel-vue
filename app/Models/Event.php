<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /** @use HasFactory<\Database\Factories\EventFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'venue_id',
        'start_time',
        'end_time',
        'organizer_id',
        'banner_img'
    ];


    public function venue() {
        return $this->belongsTo(Venue::class, 'venue_id');
    }

    public function organizer() {
        return $this->belongsTo(User::class, 'organizer_id');
    }

    public function attendees() {
        return $this->hasMany(Attendee::class, 'event_id');
    }
}
