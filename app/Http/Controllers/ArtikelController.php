<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Komentar;
use Filament\Resources\Form;
use Illuminate\Http\Request;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Support\Facades\Validator;
use Str;

class ArtikelController extends Controller
{
  public function daftar_artikel()
  {
    $daftar_artikel = Artikel::all();
    return view('artikel.daftar-artikel')->with(array('daftar_artikel' => $daftar_artikel));
  }

  public function admin_daftar_artikel()
  {
    $daftar_artikel = Artikel::orderBy('created_at', 'DESC')->get();
    return view('artikel.admin-daftar-artikel')->with(array('daftar_artikel' => $daftar_artikel));
  }

  public function detail_artikel($id_artikel)
  {
    $detail_artikel = Artikel::whereIdArtikel($id_artikel)->first();
    $komentar = Komentar::whereIdArtikel($id_artikel)->with('akunPeternak')->get();
    $recommend_artikel = Artikel::inRandomOrder()->where('id_artikel', '!=', $id_artikel)->limit(4)->get();
    return view('artikel.detail-artikel')->with(array('detail_artikel' => $detail_artikel, 'recommend_artikel' => $recommend_artikel, 'komentar' => $komentar));
  }

  public function admin_detail_artikel($id_artikel)
  {
    $detail_artikel = Artikel::whereIdArtikel($id_artikel)->first();
    $komentar = Komentar::whereIdArtikel($id_artikel)->with('akunPeternak')->get();
    $recommend_artikel = Artikel::inRandomOrder()->where('id_artikel', '!=', $id_artikel)->limit(4)->get();
    return view('artikel.admin-detail-artikel')->with(array('detail_artikel' => $detail_artikel, 'recommend_artikel' => $recommend_artikel, 'komentar' => $komentar));
  }

  public function tambah_artikel()
  {
    return view('artikel.admin-tambah-artikel');
  }

  public function edit_artikel($id_artikel)
  {
    $article = Artikel::whereIdArtikel($id_artikel)->first();
    return view('artikel.admin-edit-artikel')->with(array('article' => $article));
  }

  // POST METHOD

  private function upload_image($file)
  {

    $filename = uniqid('artikel_foto_');
    $filetype = $file->extension();
    $file->storeAs('upload/foto_artikel/', $filename . '.' . $filetype, 'public');

    return '/storage/upload/foto_artikel/' . $filename . '.' . $filetype;
  }

  public function tambah_artikel_post(Request $request)
  {
    try {
      $validator = Validator::make($request->all(), [
        'content' => 'required',
      ]);

      if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
      }

      $file = $request->file('image');
      // dd($file);
      $path_image = $this->upload_image($file);
      $slug = Str::slug($request->title);

      $artikel = Artikel::create([
        'title' => $request->title,
        'author' => $request->author,
        'slug' => $slug,
        'deskripsi' => $request->deskripsi,
        'gambar' =>  $path_image,
        'content' => $request->content
      ]);

      session()->flash('pesan', 'Artikel berhasil ditambahkan');
      return redirect('/artikel/tambah');
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function edit_artikel_post(Request $request, $id_artikel)
  {
    try {
      $validator = Validator::make($request->all(), [
        'content' => 'required',
      ]);

      if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
      }

      $file = $request->file('image');
      if (!empty($file)) {
        $path_image = $this->upload_image($file);
      }
      $slug = Str::slug($request->title);
      // dd($request);

      $artikel_lama = Artikel::whereIdArtikel($id_artikel)->first();
      $update_artikel = Artikel::whereIdArtikel($id_artikel)->update([
        'title' => $request->title,
        'author' => $request->author,
        'slug' => $slug,
        'deskripsi' => $request->deskripsi,
        'image' => !empty($file) ? $path_image : $artikel_lama->gambar,
        'content' => $request->content
      ]);

      session()->flash('pesan', 'Artikel berhasil ditambahkan');
      return redirect('/artikel/edit/' . $id_artikel);
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function hapus_artikel($id_artikel)
  {
    try {
      $artikel = Artikel::whereIdArtikel($id_artikel)->delete();
      session()->flash('pesan', 'Artikel berhasil dihapus');
      return redirect('/admin/artikel/');
    } catch (\Throwable $th) {
      throw $th;
    }
  }
}
