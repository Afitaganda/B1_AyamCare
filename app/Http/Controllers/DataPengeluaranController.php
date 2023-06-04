<?php

namespace App\Http\Controllers;

use App\Models\DataPengeluaran;
use Illuminate\Http\Request;

class DataPengeluaranController extends Controller
{
  // VIEW ZONE
  // VIEW ZONE

  public function list_data_pengeluaran($id_kandang)
  {
    $data_pengeluaran = DataPengeluaran::whereIdKandang($id_kandang)->get();
    return view('data_pengeluaran.tambah')->with(array('list_data_pengeluaran' => $data_pengeluaran));
  }
  public function add_data_pengeluaran($id_kandang)
  {
    return view('data_pengeluaran.tambah')->with('id_kandang', $id_kandang);
  }
  public function edit_data_pengeluaran($id_pengeluaran)
  {
    $data_pengeluaran = DataPengeluaran::where('id_pengeluaran', $id_pengeluaran)->first();
    return view('data_pengeluaran.edit')->with(array('data_pengeluaran' => $data_pengeluaran));
  }
  public function detail_data_harian($id_pengeluaran)
  {
    $data_pengeluaran = DataPengeluaran::where('id_pengeluaran', $id_pengeluaran)->first();
    return view('data_pengeluaran.detail')->with(array('data_pengeluaran' => $data_pengeluaran));
  }


  // API ZONE
  // API ZONE

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request, $id_kandang)
  {
    try {
      $data_pemasukan = DataPengeluaran::create([
        'jenis_pengeluaran' => $request->input('jenis_pengeluaran'),
        'jumlah_pengeluaran' => $request->input('jumlah_pengeluaran'),
        'tanggal_pengeluaran' => $request->input('tanggal_pengeluaran'),
        'id_kandang' => $id_kandang,
        'username_peternak' => auth()->user()->username
      ]);
      session()->flash('success', 'Data baru pemasukan kandang berhasil ditambahkan');
      // dd('test');
      return redirect("/kandang/data_pengeluaran/add/{$id_kandang}");
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
  public function edit(Request $request, $id_pengeluaran)
  {
    try {
      $data_pengeluaran = DataPengeluaran::whereIdPengeluaran($id_pengeluaran)->update([
        'jenis_pengeluaran' =>  $request['jenis_pengeluaran'],
        'jumlah_pengeluaran' => $request['jumlah_pengeluaran'],
        'tanggal_pengeluaran' => $request['tanggal_pengeluaran'],
      ]);

      $data_pengeluaran = DataPengeluaran::whereIdPengeluaran($id_pengeluaran)->first();

      session()->flash('success', "Data kandang berhasil diperbarui");
      session()->flash('id_kandang', $data_pengeluaran['id_kandang']);
      return redirect("/kandang/data_pengeluaran/edit/{$id_pengeluaran}");
    } catch (\Throwable $th) {
      dd($th);
      return view('kandang.edit')->with('error', 'Something went wrong');
    }
  }


  /**
   * Remove the specified resource from storage.
   */
  public function delete($id_pengeluaran)
  {
    try {
      $kandang = new KandangController();
      $get_data_pengeluaran = DataPengeluaran::where('id_pengeluaran', $id_pengeluaran)->first();
      $data_pengeluaran_delete = DataPengeluaran::where('id_pengeluaran', $id_pengeluaran)->delete();
      return $kandang->detail_kandang($get_data_pengeluaran->id_kandang);
    } catch (\Throwable $th) {
      dd($th);
      return response()->json([
        'msg' => 'Something went wrong',
        'error' => $th
      ], 500);
    }
  }
}
