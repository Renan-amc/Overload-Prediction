<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class Ticket extends Model
{
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
