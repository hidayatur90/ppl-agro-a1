<?php
  
namespace App\Models;
  
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
  
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array

     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type'
    ];
  
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array

     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
  
    /**
     * The attributes that should be cast.
     *
     * @var array

     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
 
    /**
     * Interact with the user's first name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["owner", "produksi", "kedai"][$value],
        );
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 2d6825f6ec52fc4053be9a305209bb0f2a68cdb6
>>>>>>> 69eeb489c59e6a0a74caa0c81397ddc722cb1351
    // public function owner()
    // {
    //     return $this->hasMany(Owner::class);
    // }

    // public function karyawan()
    // {
    //     return $this->hasMany(Karyawan::class);
    // }

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> f292cea0fd4cd4b29ef9cd5d04e5e2c43f9c17db
>>>>>>> 2d6825f6ec52fc4053be9a305209bb0f2a68cdb6
>>>>>>> 69eeb489c59e6a0a74caa0c81397ddc722cb1351
}