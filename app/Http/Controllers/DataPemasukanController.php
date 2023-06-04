<?php

namespace App\Http\Controllers;

use App\Models\DataPemasukan;
use Illuminate\Http\Request;

class DataPemasukanController extends Controller
{
  // VIEW ZONE
  // VIEW ZONE

  public function add_data_pemasukan($id_kandang)
  {
    return view('data_pemasukan.tambah')->with('id_kandang', $id_kandang);
  }
  public function edit_data_pemasukan($id_pemasukan)
  {
    $data_pemasukan = DataPemasukan::where('id_pemasukan', $id_pemasukan)->first();
    return view('data_pemasukan.edit')->with(array('data_pemasukan' => $data_pemasukan));
  }
  public function detail_data_pemasukan($id_pemasukan)
  {
    $data_pemasukan = DataPemasukan::where('id_pemasukan', $id_pemasukan)->first();
    return view('data_pemasukan.detail')->with(array('data_pemasukan' => $data_pemasukan));
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
      $data_pemasukan = DataPemasukan::create([
        'jenis_pemasukan' => $request->input('jenis_pemasukan'),
        'jumlah_pemasukan' => $request->input('jumlah_pemasukan'),
        'tanggal_pemasukan' => $request->input('tanggal_pemasukan'),
        'id_kandang' => $id_kandang,
        'username_peternak' => auth()->user()->username
      ]);
      session()->flash('success', 'Data baru pemasukan kandang berhasil ditambahkan');
      // dd('test');
      return redirect("/kandang/data_pemasukan/add/{$id_kandang}");
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
  public function edit(Request $request, $id_pemasukan)
  {
    try {
      $data_pemasukan = DataPemasukan::whereIdPemasukan($id_pemasukan)->update([
        'jenis_pemasukan' =>  $request['jenis_pemasukan'],
        'jumlah_pemasukan' => $request['jumlah_pemasukan'],
        'tanggal_pemasukan' => $request['tanggal_pemasukan'],
      ]);

      $data_pemasukan = DataPemasukan::whereIdPemasukan($id_pemasukan)->first();

      session()->flash('success', "Data kandang berhasil diperbarui");
      session()->flash('id_kandang', $data_pemasukan['id_kandang']);

      return redirect("/kandang/data_pemasukan/edit/{$id_pemasukan}");
    } catch (\Throwable $th) {
      dd($th);
      return view('kandang.edit')->with('error', 'Something went wrong');
    }
  }


  /**
   * Remove the specified resource from storage.
   */
  public function delete($id_pemasukan)
  {
    try {
      $kandang = new KandangController();
      $get_data_pemasukan = DataPemasukan::where('id_pemasukan', $id_pemasukan)->first();
      $data_pemasukan_delete = DataPemasukan::where('id_pemasukan', $id_pemasukan)->delete();
      return $kandang->detail_kandang($get_data_pemasukan->id_kandang);
    } catch (\Throwable $th) {
      dd($th);
      return response()->json([
        'msg' => 'Something went wrong',
        'error' => $th
      ], 500);
    }
  }
}
