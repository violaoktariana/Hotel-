<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Hotel_Facility;
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
            ],
            [
                'fullname' => 'Alvin',
                'username' => 'useralvin',
                'email' => 'alfian@gmail.com',
                'password' => Hash::make('123456'),
                'is_active' => 1,
            ],
        ];

        foreach ($datauser as $user) {
            User::create($user);
        }

        $datakamar = [
            [
                'name_room' => 'deluxe',
                'price' => 750000,
                'short_desc' => 'Are modern decorated, can accommodate up to 2 persons ...',
                'detail_desc' => 'Are modern decorated, can accommodate up to 2 persons, totally soundproofed and equipped with high tech comforts such as high speed internet.',
                'path' => 'rooms/deluxe.jpg',
                'quantity' => '12',
                'ready' => '10'
            ],
            [
                'name_room' => 'meeting',
                'price' => 1250000,
                'short_desc' => 'Are meeting decorated, can accommodate up to 2 persons ...',
                'detail_desc' => 'Are meeting decorated, can accommodate up to 2 persons, totally soundproofed and equipped with high tech comforts such as high speed internet.',
                'path' => 'rooms/meeting.jpg',
                'quantity' => '12',
                'ready' => '10'
            ]
        ];

        foreach ($datakamar as $kamar) {
            Room::create($kamar);
        }

        $datafasilitas = [
            [
                'room_id' => 1,
                'name' => 'deluxe',
                'detail' => 'Are meeting decorated, can accommodate up to 2 persons, totally soundproofed and equipped with high tech comforts such as high speed internet.',
                'path' => 'facilities/bed-deluxe.avif'
            ],
            [
                'room_id' => 2,
                'name' => 'meeting',
                'detail' => 'Are meeting decorated, can accommodate up to 2 persons, totally soundproofed and equipped with high tech comforts such as high speed internet.',
                'path' => 'facilities/bed-standar.jpg'
            ]
        ];

        foreach ($datafasilitas as $fasilitas) {
            RoomFacilities::create($fasilitas);
        }
        $datafasilitashotel = [
            [
                'facility_name' => 'gym',
                'detail' => 'Are meeting decorated, can accommodate up to 2 persons, totally soundproofed',
                'path' => 'facilities/tv-standar.jpg',
                'facility_type' => 'public',
                'status' => 'booked'
            ],
            [
                'facility_name' => 'pool',
                'detail' => 'Are meeting decorated, can accommodate up to 2 persons, totally soundproofed',
                'path' => 'facilities/tv-standar.jpg',
                'facility_type' => 'public',
                'status' => 'booked'
            ],
            [
                'facility_name' => 'bar',
                'detail' => 'Are meeting decorated, can accommodate up to 2 persons, totally soundproofed',
                'path' => 'facilities/tv-standar.jpg',
                'facility_type' => 'public',
                'status' => 'booked'
            ],
            [
                'facility_name' => 'ballroom',
                'detail' => 'Are meeting decorated, can accommodate up to 2 persons, totally soundproofed',
                'path' => 'facilities/tv-standar.jpg',
                'facility_type' => 'private',
                'status' => 'booked'
            ]
        ];

        foreach ($datafasilitashotel as $fasilitashotel) {
            Hotel_Facility::create($fasilitashotel);
        }
    }
}
