<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Artikel
 *
 * @property int $id_artikel
 * @property string $author
 * @property string $title
 * @property string $deskripsi
 * @property string $image
 * @property string $slug
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Komentar> $komentar
 * @property-read int|null $komentar_count
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel query()
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel whereIdArtikel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel whereUpdatedAt($value)
 */
	class Artikel extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CiriPenyakit
 *
 * @property int $id_ciri_penyakit
 * @property string $nama_gejala
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PenyakitCiriDetail> $penyakit
 * @property-read int|null $penyakit_count
 * @method static \Illuminate\Database\Eloquent\Builder|CiriPenyakit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CiriPenyakit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CiriPenyakit query()
 * @method static \Illuminate\Database\Eloquent\Builder|CiriPenyakit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CiriPenyakit whereIdCiriPenyakit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CiriPenyakit whereNamaGejala($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CiriPenyakit whereUpdatedAt($value)
 */
	class CiriPenyakit extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DataHarian
 *
 * @property int $id_harian
 * @property string $tanggal_pengukuran
 * @property float $bobot_ternak
 * @property int $id_kandang
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Kandang|null $kandang
 * @method static \Illuminate\Database\Eloquent\Builder|DataHarian newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DataHarian newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DataHarian query()
 * @method static \Illuminate\Database\Eloquent\Builder|DataHarian whereBobotTernak($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataHarian whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataHarian whereIdHarian($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataHarian whereIdKandang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataHarian whereTanggalPengukuran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataHarian whereUpdatedAt($value)
 */
	class DataHarian extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DataPemasukan
 *
 * @property int $id_pemasukan
 * @property string $jenis_pemasukan
 * @property int $jumlah_pemasukan
 * @property string $tanggal_pemasukan
 * @property string $username_peternak
 * @property int $id_kandang
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Kandang|null $kandang
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|DataPemasukan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DataPemasukan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DataPemasukan query()
 * @method static \Illuminate\Database\Eloquent\Builder|DataPemasukan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataPemasukan whereIdKandang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataPemasukan whereIdPemasukan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataPemasukan whereJenisPemasukan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataPemasukan whereJumlahPemasukan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataPemasukan whereTanggalPemasukan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataPemasukan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataPemasukan whereUsernamePeternak($value)
 */
	class DataPemasukan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DataPengeluaran
 *
 * @property int $id_pengeluaran
 * @property string $jenis_pengeluaran
 * @property int $jumlah_pengeluaran
 * @property string $tanggal_pengeluaran
 * @property string $username_peternak
 * @property int $id_kandang
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Kandang|null $kandang
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengeluaran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengeluaran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengeluaran query()
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengeluaran whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengeluaran whereIdKandang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengeluaran whereIdPengeluaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengeluaran whereJenisPengeluaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengeluaran whereJumlahPengeluaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengeluaran whereTanggalPengeluaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengeluaran whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataPengeluaran whereUsernamePeternak($value)
 */
	class DataPengeluaran extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\HargaHarian
 *
 * @property int $id_harga_harian
 * @property string $tanggal
 * @property int $harga_ayam_boiler
 * @property string $daerah
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|HargaHarian newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HargaHarian newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HargaHarian query()
 * @method static \Illuminate\Database\Eloquent\Builder|HargaHarian whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HargaHarian whereDaerah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HargaHarian whereHargaAyamBoiler($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HargaHarian whereIdHargaHarian($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HargaHarian whereTanggal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HargaHarian whereUpdatedAt($value)
 */
	class HargaHarian extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Kandang
 *
 * @property int $id_kandang
 * @property string $nama_kandang
 * @property int $jumlah_populasi
 * @property int $usia_ternak
 * @property string $tanggal_masuk_ternak
 * @property int $status_kandang
 * @property string $username_peternak
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DataHarian> $dataHarian
 * @property-read int|null $data_harian_count
 * @property-read \App\Models\DataPemasukan|null $dataPemasukan
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DataPengeluaran> $dataPengeluaran
 * @property-read int|null $data_pengeluaran_count
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\KandangFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Kandang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kandang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kandang query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kandang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kandang whereIdKandang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kandang whereJumlahPopulasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kandang whereNamaKandang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kandang whereStatusKandang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kandang whereTanggalMasukTernak($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kandang whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kandang whereUsernamePeternak($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kandang whereUsiaTernak($value)
 */
	class Kandang extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Komentar
 *
 * @property int $id_komentar
 * @property string $deskripsi
 * @property int $id_peternak
 * @property int $id_artikel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $akunPeternak
 * @property-read \App\Models\Artikel $artikel
 * @method static \Illuminate\Database\Eloquent\Builder|Komentar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Komentar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Komentar query()
 * @method static \Illuminate\Database\Eloquent\Builder|Komentar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Komentar whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Komentar whereIdArtikel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Komentar whereIdKomentar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Komentar whereIdPeternak($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Komentar whereUpdatedAt($value)
 */
	class Komentar extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ObatPenyakit
 *
 * @property int $id_obat_penyakit
 * @property string $nama_obat
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PenyakitObatDetail> $penyakit
 * @property-read int|null $penyakit_count
 * @method static \Illuminate\Database\Eloquent\Builder|ObatPenyakit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ObatPenyakit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ObatPenyakit query()
 * @method static \Illuminate\Database\Eloquent\Builder|ObatPenyakit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ObatPenyakit whereIdObatPenyakit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ObatPenyakit whereNamaObat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ObatPenyakit whereUpdatedAt($value)
 */
	class ObatPenyakit extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Penyakit
 *
 * @property int $id_penyakit
 * @property string $nama_penyakit
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PenyakitCiriDetail> $ciriPenyakit
 * @property-read int|null $ciri_penyakit_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PenyakitObatDetail> $obatPenyakit
 * @property-read int|null $obat_penyakit_count
 * @method static \Illuminate\Database\Eloquent\Builder|Penyakit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Penyakit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Penyakit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Penyakit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penyakit whereIdPenyakit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penyakit whereNamaPenyakit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penyakit whereUpdatedAt($value)
 */
	class Penyakit extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PenyakitCiriDetail
 *
 * @property int $id_penyakit_ciri_detail
 * @property int|null $id_penyakit
 * @property int|null $id_ciri_penyakit
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CiriPenyakit|null $ciriPenyakit
 * @property-read \App\Models\Penyakit|null $penyakit
 * @method static \Illuminate\Database\Eloquent\Builder|PenyakitCiriDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PenyakitCiriDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PenyakitCiriDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|PenyakitCiriDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PenyakitCiriDetail whereIdCiriPenyakit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PenyakitCiriDetail whereIdPenyakit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PenyakitCiriDetail whereIdPenyakitCiriDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PenyakitCiriDetail whereUpdatedAt($value)
 */
	class PenyakitCiriDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PenyakitObatDetail
 *
 * @property int $id_penyakit_obat_detail
 * @property int|null $id_penyakit
 * @property int|null $id_obat_penyakit
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ObatPenyakit|null $obatPenyakit
 * @property-read \App\Models\Penyakit|null $penyakit
 * @method static \Illuminate\Database\Eloquent\Builder|PenyakitObatDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PenyakitObatDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PenyakitObatDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|PenyakitObatDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PenyakitObatDetail whereIdObatPenyakit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PenyakitObatDetail whereIdPenyakit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PenyakitObatDetail whereIdPenyakitObatDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PenyakitObatDetail whereUpdatedAt($value)
 */
	class PenyakitObatDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id_peternak
 * @property string $nama_peternak
 * @property string|null $no_handphone
 * @property string|null $alamat
 * @property string $password
 * @property string $email
 * @property string $username
 * @property string $status_akun
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Kandang> $kandang
 * @property-read int|null $kandang_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIdPeternak($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNamaPeternak($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNoHandphone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatusAkun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 */
	class User extends \Eloquent {}
}

