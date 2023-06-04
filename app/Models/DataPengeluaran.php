<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPengeluaran extends Model
{
    use HasFactory;

    protected $table = 'data_pengeluaran';
    protected $primaryKey = 'id_pengeluaran';
    protected $fillable = [
        'jenis_pengeluaran',
        'jumlah_pengeluaran',
        'username_peternak',
        'id_kandang',
        'tanggal_pengeluaran',
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
