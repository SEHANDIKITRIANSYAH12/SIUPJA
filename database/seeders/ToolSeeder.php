<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class ToolSeeder extends Seeder
{
    public function run(): void
    {
        $tools = [
            [
                'name' => 'Cangkul',
                'description' => 'Alat untuk menggali dan mengolah tanah',
                'quantity' => 10,
                'status' => 'tersedia',
            ],
            [
                'name' => 'Sekop',
                'description' => 'Alat untuk memindahkan tanah atau material',
                'quantity' => 8,
                'status' => 'tersedia',
            ],
            [
                'name' => 'Garpu Tanah',
                'description' => 'Alat untuk menggemburkan tanah',
                'quantity' => 5,
                'status' => 'tersedia',
            ],
            [
                'name' => 'Sabit',
                'description' => 'Alat untuk memotong rumput atau tanaman',
                'quantity' => 7,
                'status' => 'tersedia',
            ],
            [
                'name' => 'Gunting Kebun',
                'description' => 'Alat untuk memotong ranting atau dahan',
                'quantity' => 4,
                'status' => 'tersedia',
            ],
            [
                'name' => 'Sprayer',
                'description' => 'Alat untuk menyemprot pestisida atau pupuk cair',
                'quantity' => 3,
                'status' => 'tersedia',
            ],
            [
                'name' => 'Gembor',
                'description' => 'Alat untuk menyiram tanaman',
                'quantity' => 6,
                'status' => 'tersedia',
            ],
            [
                'name' => 'Parang',
                'description' => 'Alat untuk memotong atau membersihkan area',
                'quantity' => 4,
                'status' => 'tersedia',
            ],
            [
                'name' => 'Gergaji',
                'description' => 'Alat untuk memotong kayu atau dahan besar',
                'quantity' => 2,
                'status' => 'tersedia',
            ],
            [
                'name' => 'Ember',
                'description' => 'Wadah untuk air atau material',
                'quantity' => 15,
                'status' => 'tersedia',
            ],
        ];

        foreach ($tools as $tool) {
            Tool::create($tool);
        }
    }
}
