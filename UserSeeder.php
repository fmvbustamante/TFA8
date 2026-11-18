<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();
        $records = [
            ['username' => 'admin.maria', 'full_name' => 'Maria Santos'],
            ['username' => 'cashier.jose', 'full_name' => 'Jose Reyes'],
            ['username' => 'cashier.angela', 'full_name' => 'Angela Cruz'],
            ['username' => 'manager.miguel', 'full_name' => 'Miguel Garcia'],
            ['username' => 'staff.sofia', 'full_name' => 'Sofia Mendoza'],
        ];

        foreach ($records as $record) {
            User::query()->updateOrCreate(
                ['username' => $record['username']],
                [...$record, 'created_at' => $now],
            );
        }
    }
}
