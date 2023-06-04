<?php

namespace App\Http\Controllers;

use App\Models\Kandang;
use App\Http\Requests\StoreKandangRequest;
use App\Http\Requests\UpdateKandangRequest;
use App\Charts\DataHarianChart;
use App\Models\DataHarian;
use App\Models\DataPemasukan;
use App\Models\DataPengeluaran;
use App\Models\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\True_;
use PhpParser\Node\Stmt\TryCatch;

class KandangController extends Controller
{
  // VIEW ZONE
  // VIEW ZONE

  public function detail_kandang($id_kandang)
  {

    $data_harian = DataHarian::where('id_kandang', $id_kandang)->get();
    $data_pemasukan = DataPemasukan::where('id_kandang', $id_kandang)->get();
    $total_pemasukan = DataPemasukan::where('id_kandang', $id_kandang)->sum('jumlah_pemasukan');
    $data_pengeluaran = DataPengeluaran::where('id_kandang', $id_kandang)->get();
    $total_pengeluaran = DataPengeluaran::where('id_kandang', $id_kandang)->sum('jumlah_pengeluaran');
    $kandang = Kandang::whereIdKandang($id_kandang)->first();
    $menu = request()->menu;


    $grafik = new DataHarianChart;
    $grafik->labels($data_harian->map(function ($v, $k) {
      return $v->tanggal_pengukuran;
    }));
    $grafik->dataset('Perkembangan Bobot', 'line', $data_harian->map(function ($v) {
      return $v->bobot_ternak;
    }))->options([
      'backgroundColor' => '#2dd4bf55',
      'borderColor' => '#0d9488',
      'pointBackgroundColor' => '#ffffff',
      // 'pointBorderColor' => '#fff'
    ]);

    return view('kandang.detail')->with(array(
      'data_harian' => $data_harian,
      'kandang' => $kandang,
      'data_pemasukan' => $data_pemasukan,
      'total_pemasukan' => $total_pemasukan,
      'data_pengeluaran' => $data_pengeluaran,
      'total_pengeluaran' => $total_pengeluaran,
      'menu' => $menu,
      'grafik' => $grafik,
    ));
  }

  public function edit_kandang($id_kandang)
  {
    $kandang = Kandang::whereIdKandang($id_kandang)->first();
    return view('kandang.edit')->with(array('kandang' => $kandang));
  }
  public function add_kandang()
  {
    return view('kandang.tambah');
  }

  public function get_kandang_peternak($username)
  {
    if (auth('admin')->check()) {
      return view('welcome');
    }
    $kandang_list = Kandang::whereUsernamePeternak($username)->get();
    // session()->put('kandang', $kandang_list);
    return view('kandang.index')->with(array('kandang_list' => $kandang_list));
  }


  // API ZONE
  // API ZONE

  public function index()
  {
    try {
      $kandang = Kandang::all();
      return response()->json([
        'msg' => 'All data retrieved successfully',
        'data' => $kandang
      ], 200);
    } catch (\Throwable $th) {
      return response()->json([
        'msg' => 'Something went wrong',
        'error' => $th
      ]);
    }
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    try {
      $user = User::where('username', auth()->user()->username)->first();
      $check_kandang = Kandang::whereUsernamePeternak(auth()->user()->username)->get();
      if ($user->status_akun == 'VIP' || count($check_kandang) < 1) {

        $kandang = Kandang::create([
          'nama_kandang' =>  $request['nama_kandang'],
          'jumlah_populasi' => $request['jumlah_populasi'],
          'usia_ternak' => $request['usia_ternak'],
          'tanggal_masuk_ternak' => $request['tanggal_masuk_ternak'],
          'username_peternak' => auth()->user()->username
        ]);
        session()->flash('success', 'Data kandang baru berhasil ditambahkan');
        // dd('test');
        return redirect('/kandang/add');
      } else {
        session()->flash('failed', 'Akun harus VIP Terlebih dahulu');
        return redirect("/kandang/add/");
      }
    } catch (\Throwable $th) {
      dd($th);
      return response()->json([
        'msg' => 'Something went wrong',
        'error' => $th
      ], 500);
    }
  }


  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id_kandang, Request $request)
  {
    try {
      $kandang = Kandang::whereIdKandang($id_kandang)->update([
        'nama_kandang' =>  $request['nama_kandang'],
        'jumlah_populasi' => $request['jumlah_populasi'],
        'usia_ternak' => $request['usia_ternak'],
        'tanggal_masuk_ternak' => $request['tanggal_masuk_ternak']
      ]);

      session()->flash('success', "Data kandang berhasil diperbarui");
      return redirect("/kandang/edit/{$id_kandang}");
    } catch (\Throwable $th) {
      dd($th);
      return view('kandang.edit')->with('error', 'Something went wrong');
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function delete($id_kandang)
  {
    try {
      $kandang_delete = Kandang::whereIdKandang($id_kandang)->delete();
      return $this->get_kandang_peternak(auth()->user()->username);
    } catch (\Throwable $th) {
      dd($th);
      return response()->json([
        'msg' => 'Something went wrong',
        'error' => $th
      ], 500);
    }
  }
}
