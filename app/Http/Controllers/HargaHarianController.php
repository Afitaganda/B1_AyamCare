<?php

namespace App\Http\Controllers;

use App\Models\HargaHarian;
use Illuminate\Http\Request;

class HargaHarianController extends Controller
{
  // VIEW METHOD
  public function daftar_harga_harian()
  {
    $daftar_harga = HargaHarian::orderBy('tanggal', 'DESC')->get();
    return view('harga_harian.index')->with(array('daftar_harga_harian' => $daftar_harga));
  }

  public function tambah_harga_harian()
  {
    return view('harga_harian.tambah');
  }

  public function edit_harga_harian($id_harga_harian)
  {
    $harga_harian = HargaHarian::whereIdHargaHarian($id_harga_harian)->first();
    return view('harga_harian.edit')->with(array('harga_harian' => $harga_harian));
  }

  // ACTION METHOD
  public function tambah_harga_harian_post(Request $request)
  {
    try {
      $harga_harian_baru = HargaHarian::create(
        [
          'tanggal' => $request->tanggal,
          'harga_ayam_boiler' => $request->harga_ayam_boiler,
          // 'daerah' => 'Jember'
        ]
      );

      session()->flash('pesan', 'Harga harian baru berhasil ditambahkan');
      return redirect('/harga-harian');
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function edit_harga_harian_post(Request $request, $id_harga_harian)
  {
    try {
      $harga_harian = HargaHarian::whereIdHargaHarian($id_harga_harian)->update(
        [
          'tanggal' => $request->tanggal,
          'harga_ayam_boiler' => $request->harga_ayam_boiler,
        ]
      );
      session()->flash('pesan', 'Data harga harian berhasil diperbarui');
      return redirect('/harga-harian');
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function hapus_harga_harian($id_harga_harian)
  {
    try {
      $harga_harian = HargaHarian::whereIdHargaHarian($id_harga_harian)->delete();
      session()->flash('pesan', 'Data harga harian berhasil dihapus');
      return redirect('/harga-harian');
    } catch (\Throwable $th) {
      throw $th;
    }
  }
}
