<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyakitCiriDetail extends Model
{
  use HasFactory;
  protected $table = 'penyakit_ciri_detail';
  protected $primaryKey = 'id_penyakit_ciri_detail';
  protected $fillable = [
    'id_penyakit',
    'id_ciri_penyakit',
  ];

  public function penyakit()
  {
    return $this->belongsTo(Penyakit::class, 'id_penyakit', 'id_penyakit');
  }
  public function ciriPenyakit()
  {
    return $this->belongsTo(CiriPenyakit::class, 'id_ciri_penyakit', 'id_ciri_penyakit');
  }
}
