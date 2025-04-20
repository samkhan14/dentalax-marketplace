<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::create([
            'name' => 'Basis',
            'description' => 'Der ideale Einstieg für Ihre Praxis',
            'slug' => 'basis',
            'price_monthly' => 0,
            'price_yearly' => 0,
            'price_tag' => 'Kostenlos',
            'is_default' => true,
            'features' => json_encode([
                'Lokale Sichtbarkeit auf Google',
                'Teilnahme am Bewertungssystem',
            ]),
        ]);

        Plan::create([
            'name' => 'PraxisPro',
            'slug' => 'praxispro',
            'description' => 'Perfekt für wachsende Praxen',
            'price_monthly' => 59,
            'price_yearly' => 636,
            'price_tag' => 'Beliebt',
            'features' => json_encode([
                'Eigene moderne Landingpage',
                'Sichtbarkeit auf Google und Dentalax',
                'Teilnahme am KI Chat Empfehlung',
                'Dashboard mit Tracking-Funktionen',
                'Neue Patienten gewinnen',
            ]),
        ]);

        Plan::create([
            'name' => 'PraxisPlus',
            'slug' => 'praxisplus',
            'description' => 'Für etablierte und wachsende Praxen',
            'price_monthly' => 89,
            'price_yearly' => 960,
            'price_tag' => 'Premium',
            'features' => json_encode([
                'Alle Vorteile von PraxisPro',
                'Eigene Jobanzeigen veröffentlichen',
                'Zugang zu exklusiven Bewerbungen',
            ]),
        ]);
    }
}
