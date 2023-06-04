<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/js/app.js')

  <!-- Fonts -->
  <title>Kandang</title>
</head>

<body>
  <div class="flex flex-col w-full min-h-screen bg-gradient-to-b from-teal-300 to-teal-600 overflow-hidden">
    <x-navbar></x-navbar>
    {{-- @yield('kandang_list') --}}
    {{-- {{ session()->get('kandang_list') }} --}}
    @if (count($kandang_list) > 0)
      <div class="flex flex-col flex-1 items-center">
        <h1 class="text-white font-righteous text-3xl my-2">Daftar Kandang {{ auth()->user()->username }}</h1>
        <div class="grid w-[80vw] lg:min-w-[56rem] gap-4 p-4 grid-cols-12 mx-auto">
          @foreach ($kandang_list as $key => $value)
            <div
              class="flex flex-col h-full font-roboto gap-y-2 lg:col-span-3 md:col-span-4 sm:col-span-6 col-span-full  cursor-pointer hover:shadow-md duration-200 bg-white text-neutral-700 p-4 rounded-md items-center">
              <h2 class="text-amber-400 font-medium text-center flex-1 ">{{ $value->nama_kandang }}</h2>
              <div class="flex w-full font-light text-sm ">
                <p class="w-28">Jumlah Ternak</p>
                <p>: {{ $value->jumlah_populasi }}</p>
              </div>
              <div class="flex w-full font-light text-sm ">
                <p class="w-28">Usia Ternak</p>
                <p>: {{ now()->diffInDays($value->tanggal_masuk_ternak) + $value->usia_ternak }} Hari</p>
              </div>
              <div class="flex w-full font-light text-sm ">
                <p class="w-28">Tanggal Masuk</p>
                <p>: {{ $value->tanggal_masuk_ternak }}</p>
              </div>
              <div class="w-[10rem] my-2 bg-neutral-200  text-center text-white rounded-full flex items-center overflow-hidden">
                {{-- <div class="flex-1 ">View</div> --}}
                <a href="/kandang/detail/{{ $value->id_kandang }}"
                  class="flex-1 py-1 text-blue-400 hover:bg-blue-400 hover:text-white duration-200">Lihat</a>
                <a href="/kandang/edit/{{ $value->id_kandang }}"
                  class="flex-1 py-1 text-teal-600 hover:bg-teal-600 hover:text-white duration-200">Ubah</a>
                <a href="/kandang/delete/{{ $value->id_kandang }}"
                  class="flex-1 py-1 text-red-700 hover:bg-red-700 hover:text-white duration-200">Hapus</a>
              </div>
            </div>
          @endforeach
        @else
          <div class="p-8 rounded-lg bg-neutral-400 text-3xl font-roboto text-white text-center w-full">
            <p>User Belum Memiliki Data Kandang</p>
          </div>
          <a href="/kandang/add"
            class=" mx-auto my-4 bg-emerald-700 text-center rounded-full w-[10rem] py-1 text-white cursor-pointer hover:bg-white hover:text-emerald-700 duration-200">Tambah
            Kandang</a>
        </div>
      </div>
    @endif
  </div>
  <a href="/kandang/add"
    class="bg-emerald-400 text-center rounded-full w-[10rem] py-1 text-white cursor-pointer hover:bg-white hover:text-emerald-400 duration-200">Tambah
    Kandang</a>
</body>

</html>
