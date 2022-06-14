<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gapmahasiswa extends Model
{
    use HasFactory;
    protected $table = 'gapmahasiswa';
    protected $fillable = [
        'id',
        'gap_ipk',
        'gap_penghasilan',
        'gap_tanggungan',
        'gap_semester'
    ];

    protected $hidden = [];

    // public function gapmahasiswa()
    // {
    //     return $this->belongsTo(Mahasiswa::class, 'id', 'id')->orderBy('nama');
    //     DB::table('gapmahasiswa')
    //         ->select('gapmahasiswa.*', 'mahasiswa.nama')
    //         ->join('mahasiswa', 'mahasiswa.id', '=', 'gapmahasiswa.id')
    //         ->orderBy('nama', 'asc')
    //         ->get();
    // }
}
