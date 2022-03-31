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
            'name'=>'Karyawan produksi',
            'email'=>'produksi@gmail.com',
            'type'=>1,
            'password'=> bcrypt('123456')
        ]);
        User::create([
            'name'=>'Karyawan Kedai',
            'email'=>'kedai@gmail.com',
            'type'=> 2,
            'password'=> bcrypt('123456')
        ]);
        User::create([
            'name'=>'Pemilik Usaha',
            'email'=>'owner@gmail.com',
            'type'=>0,
            'password'=> bcrypt('123456')
        ]);

        Owner::create([
            'namaMitra'=>'Ferdian Fernanda Syahputra',
            // 'user_id'=>0,
            'noTelepon'=>'0821-2123-2384',
            'alamat'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit.'
        ]);


        Karyawan::create([
            'namaKaryawan'=>'Lilik Dwi Wulandari',
            // 'user_id'=>2,
            'noTelepon'=>'081-1111-2222',
            'alamat'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'status'=>'Aktif'
        ]);
        Karyawan::create([
            'namaKaryawan'=>'Rio Adistya',
            // 'user_id'=>2,
            'noTelepon'=>'0871-2123-2384',
            'alamat'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'status'=>'Aktif'
        ]);
        Karyawan::create([
            'namaKaryawan'=>'Muhammad Hidayatur Rahman',
            // 'user_id'=>2,
            'noTelepon'=>'0821-2345-1234',
            'alamat'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'status'=>'Tidak Aktif'
        ]);
        Karyawan::create([
            'namaKaryawan'=>'Azimatul Hanafiyah',
            // 'user_id'=>1,
            'noTelepon'=>'0811-1234-4321',
            'alamat'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'status'=>'Aktif'
        ]);
        Karyawan::create([
            'namaKaryawan'=>'Naadiyatushofia',
            // 'user_id'=>1,
            'noTelepon'=>'0821-3232-1235',
            'alamat'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'status'=>'Aktif'
        ]);
        Karyawan::create([
            'namaKaryawan'=>'Tiara Dwi Melinda',
            // 'user_id'=>1,
            'noTelepon'=>'0813-678-0009',
            'alamat'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'status'=>'Aktif'
        ]);

    }
}
