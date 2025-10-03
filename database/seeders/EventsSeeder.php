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
        Event::firstOrCreate(
            ['name' => 'Black Sabbath'],
            [
                'description' => 'Reviva a história do heavy metal com a lendária banda Black Sabbath. Com riffs icônicos e uma presença de palco inesquecível, o show promete transportar os fãs através de décadas de clássicos que moldaram o gênero. Uma experiência imperdível para quem ama rock pesado e quer sentir a energia de uma lenda viva da música.',
                'location' => 'Parque Central',
                'start_date' => '2025-09-15 18:00:00',
                'end_date' => '2025-09-15 23:59:00',
                'image' => 'events/ticket_black_sabbath.png',
                'imageShow' => 'imageShows/black_sabbath.png'
            ]
        );

        Event::firstOrCreate(
            ['name' => 'System of a Down'],
            [
                'description' => 'Prepare-se para a intensidade única do System of a Down. Conhecida por sua mistura de metal, thrash e letras provocativas, a banda traz um show cheio de energia, crítica social e performances explosivas. Uma oportunidade para fãs de todas as gerações se conectarem com músicas que marcaram a história do rock contemporâneo.',
                'location' => 'Centro de Convenções',
                'start_date' => '2025-10-05 09:00:00',
                'end_date' => '2025-10-07 18:00:00',
                'image' => 'events/ticket_soad.png',
                'imageShow' => 'imageShows/soad.png'
            ]
        );

        Event::firstOrCreate(
            ['name' => 'Gojira'],
            [
                'description' => 'Não perca a força do metal progressivo com Gojira, referência mundial em técnica e energia. Com riffs poderosos e letras que abordam meio ambiente e consciência social, o show oferece uma experiência sonora e visual inesquecível. Uma apresentação que vai eletrizar o público e mostrar por que Gojira é uma das maiores bandas de metal da atualidade.',
                'location' => 'Teatro Municipal',
                'start_date' => '2025-11-20 20:00:00',
                'end_date' => '2025-11-20 22:30:00',
                'image' => 'events/ticket_gojira.png',
                'imageShow' => 'imageShows/gojira.png'
            ]
        );

        Event::firstOrCreate(
            ['name' => 'Nirvana'],
            [
                'description' => 'Reviva a energia crua e autêntica do grunge com Nirvana. Com músicas que marcaram gerações e letras intensas, o show promete transportar o público para os anos 90, mostrando por que Nirvana continua sendo um ícone do rock mundial.',
                'location' => 'Arena Rock Hall',
                'start_date' => '2025-09-25 21:00:00',
                'end_date' => '2025-09-25 23:30:00',
                'image' => 'events/ticket_nirvana.png',
                'imageShow' => 'imageShows/nirvana.png'
            ]
        );

        Event::firstOrCreate(
            ['name' => 'Limp Bizkit'],
            [
                'description' => 'Prepare-se para uma explosão de nu metal com Limp Bizkit. Hits que misturam rap, rock e muita atitude, em uma apresentação energética que vai levantar o público do início ao fim.',
                'location' => 'Estádio da Cidade',
                'start_date' => '2025-10-05 20:30:00',
                'end_date' => '2025-10-05 23:00:00',
                'image' => 'events/ticket_limpbizkit.png',
                'imageShow' => 'imageShows/limp-bizkit.png'
            ]
        );

        Event::firstOrCreate(
            ['name' => 'Red Hot Chili Peppers'],
            [
                'description' => 'Com uma fusão única de rock, funk e punk, o Red Hot Chili Peppers promete uma apresentação inesquecível. Grandes clássicos e novos sucessos em um show vibrante e cheio de energia.',
                'location' => 'Parque das Nações',
                'start_date' => '2025-10-18 19:30:00',
                'end_date' => '2025-10-18 22:00:00',
                'image' => 'events/ticket_rhcp.png',
                'imageShow' => 'imageShows/rhcp.png'
            ]
        );

        Event::firstOrCreate(
            ['name' => 'Kiss'],
            [
                'description' => 'O espetáculo lendário do Kiss retorna com sua mistura única de rock, figurinos icônicos e efeitos especiais. Um show histórico que une gerações de fãs e celebra a essência do hard rock.',
                'location' => 'Estádio Municipal',
                'start_date' => '2025-11-01 20:00:00',
                'end_date' => '2025-11-01 22:30:00',
                'image' => 'events/ticket_kiss.png',
                'imageShow' => 'imageShows/kiss.png'
            ]
        );

        Event::firstOrCreate(
            ['name' => 'Radiohead'],
            [
                'description' => 'Com sua sonoridade inovadora e letras marcantes, o Radiohead traz um show que mistura introspecção e intensidade. Uma jornada musical que vai emocionar e surpreender o público.',
                'location' => 'Auditório Nacional',
                'start_date' => '2025-11-10 20:00:00',
                'end_date' => '2025-11-10 22:15:00',
                'image' => 'events/ticket_radiohead.png',
                'imageShow' => 'imageShows/radiohead.png'
            ]
        );   

        Event::firstOrCreate(
            ['name' => 'Deftones'],
            [
                'description' => 'Com seu estilo inconfundível que mescla peso e melodia, Deftones promete um show intenso e atmosférico. Uma experiência única que vai do metal alternativo às nuances mais experimentais.',
                'location' => 'Teatro das Artes',
                'start_date' => '2025-11-15 21:00:00',
                'end_date' => '2025-11-15 23:00:00',
                'image' => 'events/ticket_deftones.png',
                'imageShow' => 'imageShows/deftones.png'
            ]
        );

        Event::firstOrCreate(
            ['name' => 'Scorpions'],
            [
                'description' => 'Os clássicos do hard rock alemão ecoam no show do Scorpions. Baladas inesquecíveis e riffs marcantes em uma apresentação que mistura emoção e potência sonora.',
                'location' => 'Arena Internacional',
                'start_date' => '2025-11-25 20:30:00',
                'end_date' => '2025-11-25 23:00:00',
                'image' => 'events/ticket_scorpions.png',
                'imageShow' => 'imageShows/scorpions.png'
            ]
        );

        Event::firstOrCreate(
            ['name' => 'Queen'],
            [
                'description' => 'Uma celebração ao legado eterno do Queen, com seus maiores clássicos que atravessam gerações. Um espetáculo grandioso que mistura emoção, performance e a genialidade de uma das maiores bandas da história.',
                'location' => 'Estádio Central',
                'start_date' => '2025-12-01 20:00:00',
                'end_date' => '2025-12-01 22:30:00',
                'image' => 'events/ticket_queen.png',
                'imageShow' => 'imageShows/queen.png'
            ]
        );

    }
}
