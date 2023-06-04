<?php

namespace Database\Seeders;

use App\Models\Artikel;
use App\Models\Komentar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ArtikelSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $faker = Faker::create();

    for ($i = 0; $i < 8; $i++) {
      Artikel::create([
        'author' => $faker->name(),
        'title' => $faker->sentence(),
        'image' => $faker->imageUrl(),
        'deskripsi' => $faker->sentence(),
        'slug' => $faker->slug(),
        'content' => '<div class="container text-neutral-600">' .
          '<h3 class="font-roboto font-medium text-neutral-800">' . $faker->sentence() . '</h3>' .
          '<p class="text-secondary">' . $faker->paragraph() . '</p>' .
          '<button class="btn btn-primary">Read More</button>' .
          '</div>',
      ]);
    }

    for ($i = 0; $i < 20; $i++) {
      Komentar::create([
        'id_peternak' => $faker->numberBetween(1, 3),
        'id_artikel' => $faker->numberBetween(1, 8),
        'deskripsi' => $faker->sentence(20)
      ]);
    }
  }
}
