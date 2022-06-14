<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mahasiswa extends Model
{
  use HasFactory;
  protected $table = 'mahasiswa';
  protected $fillable = [
    'nama',
    'id_ipk',
    'id_penghasilan',
    'id_tanggungan',
    'id_semester'
  ];

  protected $hidden = [];

  public function ipk()
  {
    return $this->belongsTo(Ipk::class, 'id_ipk', 'id');
  }

  public function penghasilan()
  {
    return $this->belongsTo(Penghasilan::class, 'id_penghasilan', 'id');
  }

  public function tanggungan()
  {
    return $this->belongsTo(Tanggungan::class, 'id_tanggungan', 'id');
  }

  public function semester()
  {
    return $this->belongsTo(Semester::class, 'id_semester', 'id');
  }
}
