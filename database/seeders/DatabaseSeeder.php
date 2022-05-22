<?php

namespace Database\Seeders;

use \App\Models\User;
use \App\Models\Owner;
use \App\Models\Produk;
use \App\Models\Status;
use \App\Models\Kategori;
use \App\Models\Karyawan;
use \App\Models\DetailProduk;
use \App\Models\BahanBaku;
use \App\Models\DetailBahanBaku;
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
        
        // Users
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

        // Owner Mitra
        Owner::create([
            'namaMitra'=>'Ferdian Fernanda Syahputra',
            'type_id'=>1,
            'noTelepon'=>'082121232384',
            'alamat'=>'Jalan Ahmad Sukun, Jombang, Jawa Timur, Indonesia'
        ]);


        // Status Karyawan
        Status::create([
            'status'=>'Aktif'
        ]);
        Status::create([
            'status'=>'Tidak Aktif'
        ]);

        
        // Karyawan
        Karyawan::create([
            'namaKaryawan'=>'Lilik Dwi Wulandari',
            'type_id'=>2,
            'noTelepon'=>'08111112222',
            'alamat'=>'Desa Kabuh, Jombang, Jawa Timur, Indonesia',
            'idStatus'=>1
        ]);
        Karyawan::create([
            'namaKaryawan'=>'Rio Adistya',
            'type_id'=>2,
            'noTelepon'=>'087121232384',
            'alamat'=>'Jalan Sukaharja No 12, Kalipuro Banyuwangi, Indonesia',
            'idStatus'=>1
        ]);
        Karyawan::create([
            'namaKaryawan'=>'Muhammad Hidayatur Rahman',
            'type_id'=>2,
            'noTelepon'=>'082123451234',
            'alamat'=>'Desa Jurang Sapi, Tapen Bondowoso, Indonesia',
            'idStatus'=>2
        ]);
        Karyawan::create([
            'namaKaryawan'=>'Azimatul Hanafiyah',
            'type_id'=>3,
            'noTelepon'=>'081112344321',
            'alamat'=>'Desa Cermee, Bondowoso, Indonesia',
            'idStatus'=>1
        ]);
        Karyawan::create([
            'namaKaryawan'=>'Naadiyatushofia',
            'type_id'=>3,
            'noTelepon'=>'082132321235',
            'alamat'=>'Jalan Jaksa Agung, Blitar, Indonesia',
            'idStatus'=>1
        ]);
        Karyawan::create([
            'namaKaryawan'=>'Tiara Dwi Melinda',
            'type_id'=>3,
            'noTelepon'=>'08136780009',
            'alamat'=>'Panjii, Kabupaten Situbondo, Indonesia',
            'idStatus'=>1
        ]);


        // Produk
        Produk::create([
            'namaProduk'=>'Espresso'
        ]);
        Produk::create([
            'namaProduk'=>'Long Black'
        ]);
        Produk::create([
            'namaProduk'=>'Americano'
        ]);
        Produk::create([
            'namaProduk'=>'Cappuchino'
        ]);
        Produk::create([
            'namaProduk'=>'Latte'
        ]);

        // Kategori
        Kategori::create([
            'Kategori'=>'Biji Kopi'
        ]);
        Kategori::create([
            'Kategori'=>'Kopi Bubuk'
        ]);


        // Detail Produk
        // DetailProduk::create([
        //     'idProduk'=>1,
        //     'idKategori'=>1,
        //     'jumlahStok'=>250,
        //     'hargaPer100Gram'=>10000
        // ]);
        // DetailProduk::create([
        //     'idProduk'=>2,
        //     'idKategori'=>1,
        //     'jumlahStok'=>1200,
        //     'hargaPer100Gram'=>5000
        // ]);
        // DetailProduk::create([
        //     'idProduk'=>3,
        //     'idKategori'=>1,
        //     'jumlahStok'=>300,
        //     'hargaPer100Gram'=>32000
        // ]);
        // DetailProduk::create([
        //     'idProduk'=>4,
        //     'idKategori'=>1,
        //     'jumlahStok'=>200,
        //     'hargaPer100Gram'=>15000
        // ]);
        // DetailProduk::create([
        //     'idProduk'=>5,
        //     'idKategori'=>1,
        //     'jumlahStok'=>1500,
        //     'hargaPer100Gram'=>25000
        // ]);

        // DetailProduk::create([
        //     'idProduk'=>1,
        //     'idKategori'=>2,
        //     'jumlahStok'=>200,
        //     'hargaPer100Gram'=>15000
        // ]);
        // DetailProduk::create([
        //     'idProduk'=>2,
        //     'idKategori'=>2,
        //     'jumlahStok'=>1000,
        //     'hargaPer100Gram'=>7000
        // ]);
        // DetailProduk::create([
        //     'idProduk'=>3,
        //     'idKategori'=>2,
        //     'jumlahStok'=>250,
        //     'hargaPer100Gram'=>15000
        // ]);
        // DetailProduk::create([
        //     'idProduk'=>4,
        //     'idKategori'=>2,
        //     'jumlahStok'=>500,
        //     'hargaPer100Gram'=>12000
        // ]);
        // DetailProduk::create([
        //     'idProduk'=>5,
        //     'idKategori'=>2,
        //     'jumlahStok'=>500,
        //     'hargaPer100Gram'=>13000
        // ]);

        // Bahan Baku
        // BahanBaku::create([
        //     'namaBahan'=>'Gula Pasir'
        // ]);
        // BahanBaku::create([
        //     'namaBahan'=>'Biji Kopi Arabika'
        // ]);
        // BahanBaku::create([
        //     'namaBahan'=>'Susu'
        // ]);
        // BahanBaku::create([
        //     'namaBahan'=>'Cream'
        // ]);
        // BahanBaku::create([
        //     'namaBahan'=>'Air'
        // ]);
        // BahanBaku::create([
        //     'namaBahan'=>'Sirup Caramel'
        // ]);

        // Detail Bahan Baku
        // DetailBahanBaku::create([
        //     'idBahan'=>1,
        //     'kuantitas'=>10,
        //     'hargaSatuan'=>15000,
        //     'keterangan'=>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit dolores perspiciatis porro magnam quam quaerat, illum voluptatibus delectus praesentium velit.'
        // ]);
        // DetailBahanBaku::create([
        //     'idBahan'=>1,
        //     'kuantitas'=>5,
        //     'hargaSatuan'=>15000,
        //     'keterangan'=>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit dolores perspiciatis porro magnam quam quaerat, illum voluptatibus delectus praesentium velit.'
        // ]);
        // DetailBahanBaku::create([
        //     'idBahan'=>1,
        //     'kuantitas'=>12,
        //     'hargaSatuan'=>15000,
        //     'keterangan'=>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit dolores perspiciatis porro magnam quam quaerat, illum voluptatibus delectus praesentium velit.'
        // ]);
        // DetailBahanBaku::create([
        //     'idBahan'=>2,
        //     'kuantitas'=>40,
        //     'hargaSatuan'=>165000,
        //     'keterangan'=>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit dolores perspiciatis porro magnam quam quaerat, illum voluptatibus delectus praesentium velit.'
        // ]);
        // DetailBahanBaku::create([
        //     'idBahan'=>2,
        //     'kuantitas'=>20,
        //     'hargaSatuan'=>165000,
        //     'keterangan'=>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit dolores perspiciatis porro magnam quam quaerat, illum voluptatibus delectus praesentium velit.'
        // ]);
        // DetailBahanBaku::create([
        //     'idBahan'=>3,
        //     'kuantitas'=>3,
        //     'hargaSatuan'=>12000,
        //     'keterangan'=>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit dolores perspiciatis porro magnam quam quaerat, illum voluptatibus delectus praesentium velit.'
        // ]);
        // DetailBahanBaku::create([
        //     'idBahan'=>3,
        //     'kuantitas'=>1,
        //     'hargaSatuan'=>12000,
        //     'keterangan'=>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit dolores perspiciatis porro magnam quam quaerat, illum voluptatibus delectus praesentium velit.'
        // ]);
        // DetailBahanBaku::create([
        //     'idBahan'=>4,
        //     'kuantitas'=>5,
        //     'hargaSatuan'=>30000,
        //     'keterangan'=>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit dolores perspiciatis porro magnam quam quaerat, illum voluptatibus delectus praesentium velit.'
        // ]);
        // DetailBahanBaku::create([
        //     'idBahan'=>5,
        //     'kuantitas'=>1,
        //     'hargaSatuan'=>20000,
        //     'keterangan'=>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit dolores perspiciatis porro magnam quam quaerat, illum voluptatibus delectus praesentium velit.'
        // ]);
        // DetailBahanBaku::create([
        //     'idBahan'=>5,
        //     'kuantitas'=>1,
        //     'hargaSatuan'=>20000,
        //     'keterangan'=>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit dolores perspiciatis porro magnam quam quaerat, illum voluptatibus delectus praesentium velit.'
        // ]);
        // DetailBahanBaku::create([
        //     'idBahan'=>5,
        //     'kuantitas'=>1,
        //     'hargaSatuan'=>20000,
        //     'keterangan'=>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit dolores perspiciatis porro magnam quam quaerat, illum voluptatibus delectus praesentium velit.'
        // ]);
        // DetailBahanBaku::create([
        //     'idBahan'=>6,
        //     'kuantitas'=>2,
        //     'hargaSatuan'=>80000,
        //     'keterangan'=>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit dolores perspiciatis porro magnam quam quaerat, illum voluptatibus delectus praesentium velit.'
        // ]);
        // DetailBahanBaku::create([
        //     'idBahan'=>6,
        //     'kuantitas'=>1,
        //     'hargaSatuan'=>80000,
        //     'keterangan'=>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit dolores perspiciatis porro magnam quam quaerat, illum voluptatibus delectus praesentium velit.'
        // ]);
    
    }
}
