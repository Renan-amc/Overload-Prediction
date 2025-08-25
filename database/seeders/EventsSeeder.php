<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'name' => 'Black Sabbath',
            'description' => 'Reviva a história do heavy metal com a lendária banda Black Sabbath. Com riffs icônicos e uma presença de palco inesquecível, o show promete transportar os fãs através de décadas de clássicos que moldaram o gênero. Uma experiência imperdível para quem ama rock pesado e quer sentir a energia de uma lenda viva da música.',
            'location' => 'Parque Central',
            'start_date' => '2025-09-15 18:00:00',
            'end_date' => '2025-09-15 23:59:00',
            'image' => 'events/ticket_black_sabbath.png'
        ]);

        Event::create([
            'name' => 'System of a Down',
            'description' => 'Prepare-se para a intensidade única do System of a Down. Conhecida por sua mistura de metal, thrash e letras provocativas, a banda traz um show cheio de energia, crítica social e performances explosivas. Uma oportunidade para fãs de todas as gerações se conectarem com músicas que marcaram a história do rock contemporâneo.',
            'location' => 'Centro de Convenções',
            'start_date' => '2025-10-05 09:00:00',
            'end_date' => '2025-10-07 18:00:00',
            'image' => 'events/ticket_soad.png'
        ]);

        Event::create([
            'name' => 'Gojira',
            'description' => 'Não perca a força do metal progressivo com Gojira, referência mundial em técnica e energia. Com riffs poderosos e letras que abordam meio ambiente e consciência social, o show oferece uma experiência sonora e visual inesquecível. Uma apresentação que vai eletrizar o público e mostrar por que Gojira é uma das maiores bandas de metal da atualidade.',
            'location' => 'Teatro Municipal',
            'start_date' => '2025-11-20 20:00:00',
            'end_date' => '2025-11-20 22:30:00',
            'image' => 'events/ticket_gojira.png'
        ]);
    }
}
