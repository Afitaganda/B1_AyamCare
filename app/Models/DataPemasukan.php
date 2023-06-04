<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPemasukan extends Model
{
    use HasFactory;

    protected $table = 'data_pemasukan';
    protected $primaryKey = 'id_pemasukan';
    protected $fillable = [
        'jenis_pemasukan',
        'jumlah_pemasukan',
        'username_peternak',
        'id_kandang',
        'tanggal_pemasukan',
    ];

    public function kandang()
    {
        return $this->belongsTo(Kandang::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
