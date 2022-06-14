<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggungan extends Model
{
    use HasFactory;
    protected $table = 'tanggungan';
    protected $fillable = [
        'tanggungan',
        'nilai_tanggungan'
    ];

    protected $hidden = [];
}
