<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatPenyakit extends Model
{
  use HasFactory;
  protected $table = 'obat_penyakit';
  protected $primaryKey = 'id_obat_penyakit';
  protected $fillable = [
    'nama_obat',
  ];

  public function penyakit()
  {
    return $this->hasMany(PenyakitObatDetail::class, 'id_obat_penyakit', 'id_obat_penyakit');
  }
}
