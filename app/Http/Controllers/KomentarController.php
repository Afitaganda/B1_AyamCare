<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Filament\Resources\Form;
use Illuminate\Http\Request;
use Spatie\FilamentMarkdownEditor\MarkdownEditor;

class KomentarController extends Controller
{

  public function komentar_tambah($id_artikel, Request $request)
  {
    try {
      $user_id = 1;
      if (auth('admin')->check()) {
        $user_id = auth('admin')->user()->id_peternak;
      } else {
        $user_id = auth('web')->user()->id_peternak;
      }

      $komentar = Komentar::create([
        'deskripsi' => $request->deskripsi,
        'id_peternak' => $user_id,
        'id_artikel' => $id_artikel
      ]);

      session()->flash('pesan', 'Komentar berhasil ditambahkan');
      return redirect(auth('admin')->check() ? '/admin/artikel/' . $id_artikel : '/artikel/'  . $id_artikel);
    } catch (\Throwable $th) {
      dd($th);
    }
  }

  public function komentar_hapus($id_komentar)
  {
    try {
      $komentar = Komentar::whereIdKomentar($id_komentar)->first();
      Komentar::whereIdKomentar($id_komentar)->delete();

      session()->flash('pesan', 'Komentar berhasil ditambahkan');
      return redirect('/admin/artikel/' . $komentar->id_artikel);
    } catch (\Throwable $th) {
      throw $th;
    }
  }
}
