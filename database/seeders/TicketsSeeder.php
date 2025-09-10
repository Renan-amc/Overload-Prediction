<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ticket;
use App\Models\Event;

class TicketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ticketsData = [
            'Black Sabbath' => ['type' => 'Pista', 'price' => 150.00],
            'System of a Down' => ['type' => 'VIP', 'price' => 300.00],
            'Gojira' => ['type' => 'Meia-entrada', 'price' => 90.00],
            'Nirvana' => ['type' => 'Pista', 'price' => 120.00],
            'Limp Bizkit' => ['type' => 'VIP', 'price' => 350.00],
            'Red Hot Chili Peppers' => ['type' => 'Meia-entrada', 'price' => 100.00],
            'Kiss' => ['type' => 'Pista', 'price' => 200.00],
            'Radiohead' => ['type' => 'VIP', 'price' => 250.00],
            'Deftones' => ['type' => 'Meia-entrada', 'price' => 120.00],
            'Scorpions' => ['type' => 'Pista', 'price' => 140.00],
            'Queen' => ['type' => 'VIP', 'price' => 320.00],
        ];

        foreach ($ticketsData as $eventName => $ticket) {
            $event = Event::where('name', $eventName)->first();

            if ($event) {
                Ticket::firstOrCreate(
                    [
                        'event_id' => $event->id,
                        'type'     => $ticket['type'],
                    ],
                    [
                        'price'    => $ticket['price'],
                    ]
                );
            }
        }
    }
}
