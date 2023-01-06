<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;
    use Sortable;
    protected $table = 'mahasiswa';
    protected $dates = ['tanggal_lahir'];

    protected $fillable = [
        'nama','nim','tempat', 'tanggal_lahir','image','prodi_id','kelas_id','angkatan','semester'
    ];

    public $sortable = [ 'id','nama', 'prodi_id', 'kelas_id', 'angkatan', 'semester'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }



}
