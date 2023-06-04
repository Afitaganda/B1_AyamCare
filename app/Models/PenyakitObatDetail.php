<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyakitObatDetail extends Model
{
  use HasFactory;
  protected $table = 'penyakit_obat_detail';
  protected $primaryKey = 'id_penyakit_obat_detail';
  protected $fillable = [
    'id_penyakit',
    'id_obat_penyakit',
  ];

  public function penyakit()
  {
    return $this->belongsTo(Penyakit::class, 'id_penyakit', 'id_penyakit');
  }
  public function obatPenyakit()
  {
    return $this->belongsTo(ObatPenyakit::class, 'id_obat_penyakit', 'id_obat_penyakit');
  }
}
