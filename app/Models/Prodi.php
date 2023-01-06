<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $table = 'prodi';
    protected $fillable = [
        'nama_prodi'
    ];


    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class,'prodi_id','id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($user) { // before delete() method call this
             $user->mahasiswa()->delete();
             // do the rest of the cleanup...
        });
    }
}
