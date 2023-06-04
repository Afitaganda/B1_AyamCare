<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataHarian extends Model
{
    use HasFactory;

    protected $table = 'data_harian';
    protected $primaryKey = 'id_harian';
    protected $fillable = [
        'tanggal_pengukuran',
        'bobot_ternak',
        'id_kandang',
    ];

    public function kandang()
    {
        return $this->belongsTo(Kandang::class);
    }
}
