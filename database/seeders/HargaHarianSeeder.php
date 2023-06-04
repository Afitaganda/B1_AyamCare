<?php

namespace Database\Seeders;

use App\Models\HargaHarian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class HargaHarianSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */


  public function run(): void
  {
    $faker = Faker::create();

    $harga = array(
      1 => 25000,
      2 => 25500,
      3 => 26000,
      4 => 26500
    );

    for ($i = 20; $i > 1; $i--) {
      HargaHarian::create(
        [
          'tanggal' => date("Y-m-d", time() - 60 * 60 * 24 * $i),
          'daerah' => 'Jember',
          'harga_ayam_boiler' => $harga[$faker->numberBetween(1, 4)]
        ]
      );
    }
  }
}
