<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaHarian extends Model
{
  use HasFactory;
  protected $table = 'harga_harian';
  protected $primaryKey = 'id_harga_harian';
  protected $fillable = [
    'tanggal',
    'harga_ayam_boiler',
    'daerah'
  ];
}
