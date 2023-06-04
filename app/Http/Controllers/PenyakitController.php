<?php

namespace App\Http\Controllers;

use App\Models\CiriPenyakit;
use Illuminate\Http\Request;
use App\Models\DataMedis;
use App\Models\ObatPenyakit;
use App\Models\Penyakit;
use App\Models\User;

class PenyakitController extends Controller
{
  //

  // VIEW ZONE

  public function daftar_penyakit()
  {
    $medis = Penyakit::all();
    return view('penyakit.index')->with('penyakit_list', $medis);
  }

  public function detail_penyakit($id_penyakit)
  {

    $nama_penyakit = Penyakit::whereIdPenyakit($id_penyakit)->with('ciriPenyakit', 'obatPenyakit')->first();
    $obat_penyakit = ObatPenyakit::all();
    $ciri_penyakit = CiriPenyakit::all();
    // $dd($nama_penyakit->ciriPenyakit)
    // $menu = request()->menu;

    // }->options([
    //   'backgroundColor' => '#2dd4bf55',
    //   'borderColor' => '#0d9488',
    //   'pointBackgroundColor' => '#ffffff',
    //   // 'pointBorderColor' => '#fff'
    // ]);

    return view('penyakit.detail')->with(array('nama_penyakit' => $nama_penyakit, 'obat_penyakit' => $obat_penyakit, 'ciri_penyakit' => $ciri_penyakit));
  }

  // API ZONE
  public function index()
  {
    try {
      $medis = Penyakit::all();
      return response()->json([
        'msg' => 'All data retrieved successfully',
        'data' => $medis
      ], 200);
    } catch (\Throwable $th) {
      return response()->json([
        'msg' => 'Something went wrong',
        'error' => $th
      ]);
    }
  }
}
