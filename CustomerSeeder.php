<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();
        $records = [
            ['full_name' => 'Maria Santos', 'email' => 'maria.santos@example.com', 'phone' => '0917-555-0101'],
            ['full_name' => 'Jose Reyes', 'email' => 'jose.reyes@example.com', 'phone' => '0918-555-0102'],
            ['full_name' => 'Angela Cruz', 'email' => 'angela.cruz@example.com', 'phone' => '0920-555-0103'],
            ['full_name' => 'Miguel Garcia', 'email' => 'miguel.garcia@example.com', 'phone' => '0921-555-0104'],
            ['full_name' => 'Sofia Mendoza', 'email' => 'sofia.mendoza@example.com', 'phone' => '0922-555-0105'],
        ];

        foreach ($records as $record) {
            Customer::query()->updateOrCreate(
                ['email' => $record['email']],
                [...$record, 'created_at' => $now],
            );
        }
    }
}
