<?php

namespace Database\Seeders;

use App\Models\CiriPenyakit;
use App\Models\ObatPenyakit;
use App\Models\Penyakit;
use App\Models\PenyakitCiriDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenyakitSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Penyakit::insert(array(
      [
        'nama_penyakit' => 'Cacar'
      ],
      [
        'nama_penyakit' => 'Koli'
      ],
      [
        'nama_penyakit' => 'Kolera'
      ],
      [
        'nama_penyakit' => 'Snot'
      ],
      [
        'nama_penyakit' => 'Gumboro'
      ],
      [
        'nama_penyakit' => 'Berak Darah'
      ],
      [
        'nama_penyakit' => 'Flu Burung'
      ],
      [
        'nama_penyakit' => 'Cacingan'
      ],
      [
        'nama_penyakit' => 'Marek'
      ],
      [
        'nama_penyakit' => 'Berak Kapur'
      ],
      [
        'nama_penyakit' => 'Tetelo/ND'
      ],
      [
        'nama_penyakit' => 'Heat Stress'
      ],
      [
        'nama_penyakit' => 'Malaria'
      ],
      [
        'nama_penyakit' => 'Kerdil'
      ],
      [
        'nama_penyakit' => 'Busung'
      ],
      [
        'nama_penyakit' => 'Hepatitis'
      ],
    ));

    CiriPenyakit::insert(array(
      [
        'nama_gejala' => 'Bintik-bintik putih pada kulit ayam'
      ],
      [
        'nama_gejala' => 'Ada bisul putih di area trakea atau mulut ayam'
      ],
      [
        'nama_gejala' => 'Luka lecet pada jengger ayam'
      ],
      [
        'nama_gejala' => 'Pertumbuhan yang lambat'
      ],
      [
        'nama_gejala' => 'Ayam kesulitas bernapas dan ngorok saat tidur'
      ],
      [
        'nama_gejala' => 'Ayam lesu dan mengantuk'
      ],
      [
        'nama_gejala' => 'Napsu makan menurun'
      ],
      [
        'nama_gejala' => 'Demam dengan ditandai suhu tubuh ayam meningkat'
      ],
      [
        'nama_gejala' => 'Bulu rontok'
      ],
      [
        'nama_gejala' => 'Kotoran menjadi cair/mencret'
      ],
      [
        'nama_gejala' => 'Bagian tubuh tampak ruam'
      ],
      [
        'nama_gejala' => 'Mengalami lumpuh'
      ],
      [
        'nama_gejala' => 'Keluar lendir dari hidung'
      ],
      [
        'nama_gejala' => 'Mengeluarkan cairan dari mata'
      ],
      [
        'nama_gejala' => 'Tampak ada iritasi pada duburnya dan bulu disekitar duburnya kotor'
      ],
      [
        'nama_gejala' => 'Menggigil kedinginan'
      ],
      [
        'nama_gejala' => 'Terdapat tumor saraf pada organ pencernaan'
      ],
      [
        'nama_gejala' => 'Kelumpuhan dehidrasi dan kebutaan'
      ],
      [
        'nama_gejala' => 'Terdapat pembesaran pada folikel bulu dengan warna kemerahan'
      ],
      [
        'nama_gejala' => 'Fases atau kotoran akan berwarna putih'
      ],
    ));

    ObatPenyakit::insert(array(
      [
        'nama_obat' => 'AMINOLISIN KAPSUL'
      ],
      [
        'nama_obat' => 'BENZAKLIN'
      ],
      [
        'nama_obat' => 'DIAMIX MINERAL PREMIX'
      ],
      [
        'nama_obat' => 'FARM SAFE'
      ],
      [
        'nama_obat' => 'FLY-OFF'
      ],
      [
        'nama_obat' => 'INTERCIDE'
      ],
      [
        'nama_obat' => 'INTROVIT AD3E WS'
      ],
      [
        'nama_obat' => 'KLORIN-GARD'
      ],
      [
        'nama_obat' => 'MEDIVAC AE-POX'
      ],
      [
        'nama_obat' => 'NATUPHOS-5000 COMBI L'
      ],
      [
        'nama_obat' => 'AVICILINA PLUS DS'
      ],
      [
        'nama_obat' => 'CIPROLON'
      ],
      [
        'nama_obat' => 'COLIMEIJI POWDER 20%'
      ],
      [
        'nama_obat' => 'COLIMIX'
      ],
      [
        'nama_obat' => 'COLISTAN'
      ],
      [
        'nama_obat' => 'COLMYC-E'
      ],
      [
        'nama_obat' => 'COTRIMAZINE'
      ],
      [
        'nama_obat' => 'CYPROSIN'
      ],
      [
        'nama_obat' => 'AMPIVET'
      ],
      [
        'nama_obat' => 'ENROTEN'
      ],
      [
        'nama_obat' => 'GENTA-100'
      ],
      [
        'nama_obat' => 'ANTI SNOT KAPSUL'
      ],
      [
        'nama_obat' => 'CEVAC GUMBO L'
      ],
    ));
  }
}
