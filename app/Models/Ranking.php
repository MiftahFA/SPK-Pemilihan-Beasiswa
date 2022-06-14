<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    use HasFactory;
    protected $table = 'hasil_mahasiswa';
    protected $fillable = [
        'id',
        'bobot_ipk',
        'bobot_penghasilan',
        'bobot_tanggungan',
        'bobot_semester',
        'ncf',
        'nsf',
        'hasil'
    ];

    protected $hidden = [];

    public function hasil_mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id', 'id');
    }
}
