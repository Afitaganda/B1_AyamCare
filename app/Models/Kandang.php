<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandang extends Model
{
    use HasFactory;

    protected $table = 'kandang';
    protected $primaryKey = 'id_kandang';
    protected $fillable = [
        'nama_kandang',
        'usia_ternak',
        'jumlah_populasi',
        'tanggal_masuk_ternak',
        'username_peternak',
        'id_data_pemasukan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dataPemasukan()
    {
        return $this->hasOne(DataPemasukan::class);
    }

    public function dataPengeluaran()
    {
        return $this->hasMany(DataPengeluaran::class);
    }

    public function dataHarian()
    {
        return $this->hasMany(DataHarian::class);
    }


}
