<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CiriPenyakit extends Model
{
  use HasFactory;

  protected $table = 'ciri_penyakit';
  protected $primaryKey = 'id_ciri_penyakit';
  protected $fillable = [
    'nama_gejala',
  ];

  public function penyakit()
  {
    return $this->hasMany(PenyakitCiriDetail::class, 'id_ciri_penyakit', 'id_ciri_penyakit');
  }
}
