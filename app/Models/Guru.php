<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';

    protected $fillable = ['nama', 'telpon', 'alamat'];

    public function mapel()
    {
        //satu guru memiliki banyak mapel
        return $this->hasMany(Mapel::class);
    }
}
