<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Ticket;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function index(Request $request): View
    {
        $tickets = Ticket::select('tickets.*')
        ->join('events', 'tickets.event_id', '=', 'events.id');

        if ($request->filled('event')) {
            $tickets = $tickets->where('events.name', 'like', '%' . $request->event . '%');
        }

        $tickets = $tickets->with('event')->get(); 

        return view('tickets.index', ['tickets' => $tickets]);
    }

    public function indexAboutEvent(Request $request): View 
    {
        $tickets = Ticket::with('event')
            ->where('event_id', $request->event) 
            ->get(); 

        return view('about-shows.index', ['tickets' => $tickets]);
    }

}
