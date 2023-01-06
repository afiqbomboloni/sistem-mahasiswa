<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $fillable = [
        'nama_kelas'
    ];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'kelas_id', 'id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($user) { // before delete() method call this
             $user->mahasiswa()->delete();
             // do the rest of the cleanup...
        });
    }
}
