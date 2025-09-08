<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Ticket;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(): View
    {
        $tickets = Ticket::select('tickets.*')
        ->join('events', 'tickets.event_id', '=', 'events.id')
        ->with('event')
        ->get();

        return view('home.index', ['tickets' => $tickets]);
    }
}
