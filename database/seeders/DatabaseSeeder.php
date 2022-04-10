<?php

namespace Database\Seeders;

use \App\Models\User;
use \App\Models\Owner;
use App\Models\Produk;
use \App\Models\Karyawan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'noTelepon'=>'082121232384',
            'alamat'=>'Jalan Ahmad Sukun, Jombang, Jawa Timur, Indonesia'
        ]);


        Karyawan::create([
            'namaKaryawan'=>'Lilik Dwi Wulandari',
            'type_id'=>2,
            'noTelepon'=>'08111112222',
            'alamat'=>'Desa Kabuh, Jombang, Jawa Timur, Indonesia',
            'status'=>'Aktif'
        ]);
        Karyawan::create([
            'namaKaryawan'=>'Rio Adistya',
            'type_id'=>2,
            'noTelepon'=>'087121232384',
            'alamat'=>'Jalan Sukaharja No 12, Kalipuro Banyuwangi, Indonesia',
            'status'=>'Aktif'
        ]);
        Karyawan::create([
            'namaKaryawan'=>'Muhammad Hidayatur Rahman',
            'type_id'=>2,
            'noTelepon'=>'082123451234',
            'alamat'=>'Desa Jurang Sapi, Tapen Bondoowoso, Indonesia',
            'status'=>'Tidak Aktif'
        ]);
        Karyawan::create([
            'namaKaryawan'=>'Azimatul Hanafiyah',
            'type_id'=>3,
            'noTelepon'=>'081112344321',
            'alamat'=>'Desa Cermee, Bondowoso, Indonesia',
            'status'=>'Aktif'
        ]);
        Karyawan::create([
            'namaKaryawan'=>'Naadiyatushofia',
            'type_id'=>3,
            'noTelepon'=>'082132321235',
            'alamat'=>'Jalan Jaksa Agung, Blitar, Indonesia',
            'status'=>'Aktif'
        ]);
        Karyawan::create([
            'namaKaryawan'=>'Tiara Dwi Melinda',
            'type_id'=>3,
            'noTelepon'=>'08136780009',
            'alamat'=>'Panjii, Kabupaten Situbondo, Indonesia',
            'status'=>'Aktif'
        ]);


        // Produk

        Produk::create([
            'namaProduk'=>'Espresso',
            'stok'=>25,
            'kategori'=>'Biji Kopi'
        ]);
        Produk::create([
            'namaProduk'=>'Long Black',
            'stok'=>12,
            'kategori'=>'Biji Kopi'
        ]);
        Produk::create([
            'namaProduk'=>'Americano',
            'stok'=>30,
            'kategori'=>'Biji Kopi'
        ]);
        Produk::create([
            'namaProduk'=>'Cappuchino',
            'stok'=>20,
            'kategori'=>'Biji Kopi'
        ]);
        Produk::create([
            'namaProduk'=>'Latte',
            'stok'=>15,
            'kategori'=>'Biji Kopi'
        ]);

        Produk::create([
            'namaProduk'=>'Espresso',
            'stok'=>20,
            'kategori'=>'Kopi Bubuk'
        ]);
        Produk::create([
            'namaProduk'=>'Long Black',
            'stok'=>10,
            'kategori'=>'Kopi Bubuk'
        ]);
        Produk::create([
            'namaProduk'=>'Americano',
            'stok'=>25,
            'kategori'=>'Kopi Bubuk'
        ]);
        Produk::create([
            'namaProduk'=>'Cappuchino',
            'stok'=>5,
            'kategori'=>'Kopi Bubuk'
        ]);
        Produk::create([
            'namaProduk'=>'Latte',
            'stok'=>50,
            'kategori'=>'Kopi Bubuk'
        ]);


    
    }
}
