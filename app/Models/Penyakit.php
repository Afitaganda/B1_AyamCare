<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
  use HasFactory;

  protected $table = 'penyakit';
  protected $primaryKey = 'id_penyakit';
  protected $fillable = [
    'nama_penyakit'
  ];

  public function ciriPenyakit()
  {
    return $this->hasMany(PenyakitCiriDetail::class, 'id_penyakit', 'id_penyakit');
  }
  public function obatPenyakit()
  {
    return $this->hasMany(PenyakitObatDetail::class, 'id_penyakit', 'id_penyakit');
  }
}
