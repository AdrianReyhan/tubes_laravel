<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';
    protected $fillable = ['kode', 'nama', 'semester'];

    public function siswa()
    {
        //satu mapel dimiliki banyak siswa
        return $this->belongsToMany(Siswa::class)->withPivot('nilai');
    }

    public function guru()
    {
        //satu mapel dimiliki guru
        return $this->belongsTo(Guru::class);
    }
}
