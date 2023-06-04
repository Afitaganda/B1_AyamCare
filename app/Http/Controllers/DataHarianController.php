<?php

namespace App\Http\Controllers;

use App\Models\DataHarian;
use Illuminate\Http\Request;

class DataHarianController extends Controller
{
    // VIEW ZONE
    // VIEW ZONE

    public function add_data_harian($id_kandang)
    {
        return view('data_harian.tambah');
    }
    public function edit_data_harian($id_harian)
    {
        $data_harian = DataHarian::whereIdHarian($id_harian)->first();
        return view('data_harian.edit')->with(array('data_harian' => $data_harian));
    }
    public function detail_data_harian($id_harian)
    {
        return view('data_harian.detail');
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id_kandang)
    {
        try {
            $data_harian = DataHarian::create([
                'tanggal_pengukuran' => $request->input('tanggal_pengukuran'),
                'bobot_ternak' => $request->input('bobot_ternak'),
                'id_kandang' => $id_kandang
            ]);
            session()->flash('success', 'Data harian baru berhasil ditambahkan');
            return redirect("/kandang/data_harian/add/{$id_kandang}");
        } catch (\Throwable $th) {
            dd($th);
            return response()->json([
                'msg' => 'Something went wrong',
                'error' => $th
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id_harian)
    {
        try {
            $data_harian = DataHarian::whereIdHarian($id_harian)->update([
                'tanggal_pengukuran' => $request->input('tanggal_pengukuran'),
                'bobot_ternak' => $request->input('bobot_ternak')
            ]);
            session()->flash('success', 'Data harian berhasil diperbarui');
            return redirect("/kandang/data_harian/edit/{$id_harian}");
        } catch (\Throwable $th) {
            dd($th);
            return response()->json([
                'msg' => 'Something went wrong',
                'error' => $th
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id_harian)
    {
        try {
            $kandang = new KandangController();
            $get_data_harian = DataHarian::where('id_harian', $id_harian)->first();
            $data_harian_delete = DataHarian::where('id_harian', $id_harian)->delete();
            return $kandang->detail_kandang($get_data_harian->id_kandang);
        } catch (\Throwable $th) {
            dd($th);
            return response()->json([
                'msg' => 'Something went wrong',
                'error' => $th
            ], 500);
        }
    }
}
