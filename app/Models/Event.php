<?php

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket;

class Event extends Model
{
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function formattedDate(): string
    {
        $start = Carbon::parse($this->start_date);
        $end = Carbon::parse($this->end_date);

        if ($start->isSameDay($end)) {
            return $start->format('d/m/Y') . ' - ' . $start->format('H:i') . ' às ' . $end->format('H:i');
        } else {
            return $start->format('d/m/Y') . ' a ' . $end->format('d/m/Y');
        }
    }
}
