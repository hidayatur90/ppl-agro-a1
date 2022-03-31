<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{   
    // use HasFactory;
    protected $table = "karyawan";

    protected $fillable = ['namaKaryawan','noTelepon','alamat', 'status'];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

<<<<<<< HEAD
=======

>>>>>>> 69eeb489c59e6a0a74caa0c81397ddc722cb1351
}
