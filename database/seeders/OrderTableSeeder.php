<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bestellingen')->insert([
            'drank' => 'COLA',
            'categorie' => 'Frisdrank',
            'aantal' => 1,
            'user_id' => 1,
            'bestelling' => '1 COLA',
            'besteld_door' => 'PIETER',
            'status' => "ONDERWEG",
            'prijs' => 2.70,
            'totaal_prijs' => 2.70,
            'created_at' => '2022-06-20_21:07:00'
        ]);

        DB::table('bestellingen')->insert([
            'drank' => 'GROLSCH',
            'categorie' => 'Bier',
            'aantal' => 1,
            'user_id' => 2,
            'bestelling' => '1 GROLSCH',
            'besteld_door' => 'HENK',
            'status' => "ONDERWEG",
            'prijs' => 3.50,
            'totaal_prijs' => 3.50,
            'created_at' => '2022-06-20 21:07:00'
        ]);

        DB::table('bestellingen')->insert([
            'drank' => 'CABERNET SAUVIGNON',
            'categorie' => 'Wijn',
            'aantal' => 3,
            'user_id' => 3,
            'bestelling' => '3 CABERNET SAUVIGNON',
            'besteld_door' => 'FREEK',
            'status' => "BESTELD",
            'prijs' => 4.00,
            'totaal_prijs' => 12.00,
            'created_at' => '2022-06-20 21:07:00'
        ]);

        DB::table('bestellingen')->insert([
            'drank' => 'HEINEKEN',
            'categorie' => 'Bier',
            'aantal' => 1,
            'user_id' => 4,
            'bestelling' => '1 HEINEKEN',
            'besteld_door' => 'GERARD',
            'status' => "BESTELD",
            'prijs' => 3.20,
            'totaal_prijs' => 3.20,
            'created_at' => '2022-06-21 17:27:24'
        ]);

        DB::table('bestellingen')->insert([
            'drank' => 'JUPILER',
            'categorie' => 'Bier',
            'aantal' => 1,
            'user_id' => 1,
            'bestelling' => '1 JUPILER',
            'besteld_door' => 'PIETER',
            'status' => "BESTELD",
            'prijs' => 4.00,
            'totaal_prijs' => 6.70,
            'created_at' => '2022-06-21 18:26:30'
        ]);

        DB::table('bestellingen')->insert([
            'drank' => 'BAVARIA',
            'categorie' => 'Bier',
            'aantal' => 1,
            'user_id' => 5,
            'bestelling' => '1 BAVARIA',
            'besteld_door' => 'JASON',
            'status' => "BESTELD",
            'prijs' => 3.50,
            'totaal_prijs' => 3.50,
            'created_at' => '2022-06-21 22:30:45'
        ]);

        DB::table('bestellingen')->insert([
            'drank' => 'HEINEKEN',
            'categorie' => 'Bier',
            'aantal' => 1,
            'user_id' => 6,
            'bestelling' => '1 HEINEKEN',
            'besteld_door' => 'MARK',
            'status' => "BESTELD",
            'prijs' => 3.20,
            'totaal_prijs' => 3.20,
            'created_at' => '2022-06-22 22:46:18'
        ]);

        DB::table('bestellingen')->insert([
            'drank' => 'HEINEKEN',
            'categorie' => 'Bier',
            'aantal' => 1,
            'user_id' => 4,
            'bestelling' => '3 HEINEKEN',
            'besteld_door' => 'GERARD',
            'status' => "BESTELD",
            'prijs' => 3.20,
            'totaal_prijs' => 12.80,
            'created_at' => '2022-06-21 22:30:45'
        ]);
    }
}
