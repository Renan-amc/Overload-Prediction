<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ticket;

class TicketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ticket::firstOrCreate([
            'event_id' => 1,
            'type' => 'Pista',
        ], [
            'price' => 120.00,
        ]);

        Ticket::firstOrCreate([
            'event_id' => 2,
            'type' => 'VIP',
        ], [
            'price' => 350.00,
        ]);

        Ticket::firstOrCreate([
            'event_id' => 3,
            'type' => 'Meia-entrada',
        ], [
            'price' => 60.00,
        ]);
    }
}
