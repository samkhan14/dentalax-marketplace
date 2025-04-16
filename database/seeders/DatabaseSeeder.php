<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\City;
use App\Models\DentalService as Service;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
         Role::firstOrCreate(['name' => 'dentist']);
         Role::firstOrCreate(['name' => 'patient']);
         Role::firstOrCreate(['name' => 'applicant']);

        // Users
        $admin = User::firstOrCreate([
            'email' => 'admin@dentalax.com',
        ], [
            'name' => 'Admin',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole($adminRole->id);

        // $dentist = User::firstOrCreate([
        //     'email' => 'dentist@dentalax.test',
        // ], [
        //     'name' => 'Dr. Dentalax',
        //     'password' => Hash::make('password'),
        // ]);
        // $dentist->assignRole($dentistRole);

        // Cities of Germany (few examples, you can add more)
        $cities = [
            'Berlin', 'Hamburg', 'Munich', 'Cologne', 'Frankfurt', 'Stuttgart', 'Düsseldorf',
            'Dortmund', 'Essen', 'Leipzig', 'Bremen', 'Dresden', 'Hanover', 'Nuremberg', 'Duisburg'
        ];

        foreach ($cities as $city) {
            City::firstOrCreate(['name' => $city]);
        }

        // Dental Services (English + German)
        $services = [
            'Zahnreinigung / Prophylaxe',
            'Kontrolluntersuchung',
            'Füllungstherapie',
            'Parodontitisbehandlung',
            'Wurzelbehandlung (Endodontie)',
            'Zahnentfernung',
            'Zahnerhalt',
            'Bleaching / Zahnaufhellung',
            'Veneers',
            'Zahnkorrektur (Aligner/Schienen)',
            'Feste Zahnspange',
            'Lose Zahnspange',
            'Zahnimplantate',
            'Kronen & Brücken',
            'Teil-/Vollprothesen',
            'CAD/CAM Zahnersatz',
            'Kinderzahnheilkunde',
            'Behandlung von Angstpatienten',
            'Seniorenzahnheilkunde',
            'Digitale Zahnberatung',
            '3D-Röntgen / DVT',
            'Zahnschmuck',
            'Sportmundschutz',
        ];

        foreach ($services as $service) {
            Service::firstOrCreate([
                'name' => $service,
            ]);
        }

        $this->command->info('✅ Seeded Users, Roles, Cities, and Dental Services successfully!');
    }
}
