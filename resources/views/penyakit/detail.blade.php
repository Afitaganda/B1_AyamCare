<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/js/app.js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

  <title>Medis</title>
</head>

<body class="bg-gradient-to-b from-teal-300 to-teal-600 overflow-x-hidden overflow-y-scroll flex flex-col relative">


  {{-- NAVBAR COMPONENT --}}
  <x-navbar />

  {{-- BODY SECTION --}}
  <div class="flex flex-col min-h-screen items-center my-4">
    {{-- JUDUL / NAMA PENYAKIT --}}
    <h1 class="text-3xl font-righteous text-white text-center">Penyakit {{ $nama_penyakit->nama_penyakit }}</h1>

    <div class="grid md:grid-cols-2 grid-cols-1 my-4 gap-4 text-neutral-600 w-[60rem]">
      <div class="rounded-md p-4 flex flex-col bg-white  ">
        <h2 class="text-neutral-800 font-roboto font-medium text-lg text-center">Ciri Penyakit</h2>
        <ul class="ml-6">
          @foreach ($nama_penyakit->ciriPenyakit as $key => $value)
            <li>
              {{ $ciri_penyakit[$value->id_ciri_penyakit - 1]->nama_gejala }}
            </li>
          @endforeach
        </ul>
      </div>
      <div class="rounded-md p-4 flex flex-col bg-white ">
        <h2 class="text-neutral-800 font-roboto font-medium text-lg text-center">Obat Penyakit</h2>
        <ul class="ml-6">
          @foreach ($nama_penyakit->obatPenyakit as $key => $value)
            <li>
              {{ $obat_penyakit[$value->id_obat_penyakit - 1]->nama_obat }}
            </li>
          @endforeach
        </ul>
      </div>
    </div>
    <a href="/penyakit"
      class="rounded-md text-center w-[10rem] font-roboto font-medium py-1 text-white bg-red-600 hover:bg-white hover:text-red-600 hover:shadow-md hover:shadow-red-600/75 duration-200">Kembali</a>
  </div>
</body>

</html>
