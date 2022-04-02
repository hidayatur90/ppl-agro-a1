<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Owner;
use \App\Models\Karyawan;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'type'=>1,
            'name'=>'Owner Mitra',
            'email'=>'owner@gmail.com',
            'password'=> bcrypt('123456')
        ]);
        User::create([
            'type'=>2,
            'name'=>'Karyawan Produksi Kopi',
            'email'=>'produksi@gmail.com',
            'password'=> bcrypt('123456')
        ]);
        User::create([
            'type'=> 3,
            'name'=>'Karyawan Kedai Kopi',
            'email'=>'kedai@gmail.com',
            'password'=> bcrypt('123456')
        ]);

        Owner::create([
            'namaMitra'=>'Ferdian Fernanda Syahputra',
            'type_id'=>1,
            'noTelepon'=>'0821-2123-2384',
            'alamat'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit.'
        ]);


        Karyawan::create([
            'namaKaryawan'=>'Lilik Dwi Wulandari',
            'type_id'=>2,
            'noTelepon'=>'081-1111-2222',
            'alamat'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'status'=>'Aktif'
        ]);
        Karyawan::create([
            'namaKaryawan'=>'Rio Adistya',
            'type_id'=>2,
            'noTelepon'=>'0871-2123-2384',
            'alamat'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'status'=>'Aktif'
        ]);
        Karyawan::create([
            'namaKaryawan'=>'Muhammad Hidayatur Rahman',
            'type_id'=>2,
            'noTelepon'=>'0821-2345-1234',
            'alamat'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'status'=>'Tidak Aktif'
        ]);
        Karyawan::create([
            'namaKaryawan'=>'Azimatul Hanafiyah',
            'type_id'=>3,
            'noTelepon'=>'0811-1234-4321',
            'alamat'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'status'=>'Aktif'
        ]);
        Karyawan::create([
            'namaKaryawan'=>'Naadiyatushofia',
            'type_id'=>3,
            'noTelepon'=>'0821-3232-1235',
            'alamat'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'status'=>'Aktif'
        ]);
        Karyawan::create([
            'namaKaryawan'=>'Tiara Dwi Melinda',
            'type_id'=>3,
            'noTelepon'=>'0813-678-0009',
            'alamat'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'status'=>'Aktif'
        ]);

    }
}
