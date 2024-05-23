<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Room;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $datauser = [
            [
                'fullname' => 'Viola',
                'username' => 'admin',
                'email' => 'viooo@gmail.com',
                'password' => Hash::make('admin'),
                'is_active' => 1,
                'level' => 'admin',
            ],
            [
                'fullname' => 'Alvin',
                'username' => 'useralvin',
                'email' => 'alfian@gmail.com',
                'password' => Hash::make('123456'),
                'is_active' => 1,
                'level' => 'user',
            ],
        ];

        foreach ($datauser as $user) {
            User::create($user);
        }

        $datakamar = [
            [
                'type' => 'deluxe',
                'price' => 750000,
                'detail' => 'Are modern decorated, can accommodate up to 2 persons, totally soundproofed and equipped with high tech comforts such as high speed internet.',
                'quantity' => 10,
                'ready' => 10,
                'path' => 'rooms/deluxe.jpg'
            ]
        ];

        foreach ($datakamar as $kamar) {
            Room::create($kamar);
        }
    }
}
