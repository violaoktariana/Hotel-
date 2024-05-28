<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Room;
use App\Models\RoomFacilities;
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
                'desc' => 'Are modern decorated, can accommodate up to 2 persons ...',
                'description' => 'Are modern decorated, can accommodate up to 2 persons, totally soundproofed and equipped with high tech comforts such as high speed internet.',
                'quantity' => 10,
                'ready' => 10,
                'rating' => '[1, 1, 1, 1, 0]',
                'path' => 'rooms/deluxe.jpg'
            ],
            [
                'type' => 'meeting',
                'price' => 1250000,
                'desc' => 'Are meeting decorated, can accommodate up to 2 persons ...',
                'description' => 'Are meeting decorated, can accommodate up to 2 persons, totally soundproofed and equipped with high tech comforts such as high speed internet.',
                'quantity' => 5,
                'ready' => 5,
                'rating' => '[1, 1, 1, 1, 1]',
                'path' => 'rooms/meeting.jpg'
            ]
        ];

        foreach ($datakamar as $kamar) {
            Room::create($kamar);
        }

        $datafasilitas = [
            [
                'name' => 'deluxe',
                'detail' => 'Are modern decorated, can accommodate up to 2 persons, totally soundproofed and equipped with high tech comforts such as high speed internet.',
                'path' => 'facilities/bathtub.webp',
                'path' => 'facilities/bed-deluxe.jpg',
                'path' => 'facilities/tv-deluxe.avif'
            ],
            [
                'name' => 'meeting',
                'detail' => 'Are meeting decorated, can accommodate up to 2 persons, totally soundproofed and equipped with high tech comforts such as high speed internet.',
                'path' => 'facilities/shower-standar.jpg',
                'path' => 'facilities/bed-standar.jpg',
                'path' => 'facilities/tv-standar.webp',
            ]
        ];

        foreach ($datafasilitas as $fasilitas) {
            RoomFacilities::create($fasilitas);
        }
    }
}
