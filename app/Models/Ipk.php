<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ipk extends Model
{
    use HasFactory;
    protected $table = 'ipk';
    protected $fillable = [
        'ipk',
        'nilai_ipk'
    ];

    protected $hidden = [];
}
