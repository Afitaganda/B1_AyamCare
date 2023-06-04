<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  @vite('resources/js/app.js')

  <title>Kandang</title>
</head>

<body class="bg-gradient-to-b from-teal-300 to-teal-600 overflow-x-hidden min-h-screen flex flex-col">
  <x-navbar />
  @if (session()->has('success'))
    <div class="absolute w-full h-full z-20 bg-neutral-400/50 flex justify-center items-center">
      <div class="bg-white rounded-md p-4 text-center text-neutral-700 font-roboto gap-y-2 w-[15rem] items-center flex flex-col">
        <h2>Pesan!</h2>
        <p class="text-neutral-400">{{ session()->get('success') }}</p>
        <a href="/kandang/{{ auth()->user()->username }}"
          class="bg-rose-600 my-2 rounded-full w-[7rem] py-1 text-white hover:text-rose-600 hover:bg-white hover:shadow-md duration-200">Tutup</a>
      </div>
    </div>
  @endif
  @if (session()->has('pesan'))
    <div class="absolute w-full h-full bg-neutral-500/50 flex items-center justify-center z-10">
      <div class="p-4 bg-white rounded-md flex flex-col items-center text-neutral-700 font-roboto font-medium gap-2 text-center">
        <h2 class="text-lg">Pesan!</h2>
        <p class="text-sm font-light text-neutral-400 w-[10rem]">{{ session()->get('pesan') }}</p>
        <a href="/artikel/tambah"
          class="py-1 w-[7rem] text-center bg-red-500 text-white hover:text-red-500 hover:bg-white rounded-md hover:shadow-md hover:shadow-red-500/50">Tutup</a>
      </div>
    </div>
    {{ session()->forget('pesan') }}
  @endif
  @if (session()->has('error'))
    <div class="absolute w-full h-full bg-neutral-500/50 flex items-center justify-center z-10">
      <div class="p-4 bg-white rounded-md flex flex-col items-center text-neutral-700 font-roboto font-medium gap-2 text-center">
        <h2 class="text-lg">Pesan!</h2>
        <p class="text-sm font-light text-neutral-400 w-[10rem]">{{ session()->get('pesan') }}</p>
        <a href="/artikel/tambah"
          class="py-1 w-[7rem] text-center bg-red-500 text-white hover:text-red-500 hover:bg-white rounded-md hover:shadow-md hover:shadow-red-500/50">tutup</a>
      </div>
    </div>
    {{ session()->forget('error') }}
  @endif
  <div class="flex flex-col justify-center my-4 text-center items-center flex-1">
    <div class="bg-white/50 shadow-[3px_3px_10px_3px_rgba(0,0,0,0.3)] rounded-xl w-[30rem] pt-8  overflow-hidden">
      <div class="rounded-t-xl bg-gradient-to-b from-teal-400 to-blue-600 w-full flex flex-col relative">
        <a href="/kandang/{{ auth()->user()->username }}"
          class="absolute top-2 right-2 cursor-pointer flex hover:bg-white/60 duration-200 bg-white/25 p-1 rounded-full text-sm font-roboto text-white items-center">
          <img src="/icons/back.svg" class="w-6 h-6" alt="back">
        </a>
        <h1 class="text-white font-righteous text-2xl my-2">Ubah Kandang</h1>
        <form action="/kandang/
        /{{ request()->route()->id_kandang }}" method="post"
          class="flex flex-col items-center gap-y-4 my-4 h-full relative">
          @csrf
          <div class="flex flex-col items-start w-3/4 gap-[2px]">
            <p class="text-white font-roboto mx-2">Nama Kandang</p>
            <input type="text" name="nama_kandang" required value="{{ $kandang->nama_kandang }}"
              class="w-full py-2 outline-none font-roboto focus:ring-0 text-neutral-700 px-2 focus:outline-none hover:outline-none focus:shadow-none rounded-md focus:border-blue-950 duration-200 border-transparent border-2">
          </div>
          <div class="flex flex-col items-start w-3/4 gap-[2px]">
            <p class="text-white font-roboto mx-2">Jumlah Ternak</p>
            <input type="number" step="1" name="jumlah_populasi" required value="{{ $kandang->jumlah_populasi }}"
              class="w-full py-2 outline-none font-roboto focus:ring-0 text-neutral-700 px-2 focus:outline-none hover:outline-none focus:shadow-none rounded-md focus:border-blue-950 duration-200 border-transparent border-2">
          </div>
          <div class="flex flex-col items-start w-3/4 gap-[2px]">
            <p class="text-white font-roboto mx-2">Usia Masuk Ternak (hari)</p>
            <input type="number" step="1" name="usia_ternak" required value="{{ $kandang->usia_ternak }}"
              class="w-full py-2 outline-none font-roboto focus:ring-0 text-neutral-700 px-2 focus:outline-none hover:outline-none focus:shadow-none rounded-md focus:border-blue-950 duration-200 border-transparent border-2">
          </div>
          <div class="flex flex-col items-start w-3/4 gap-[2px]">
            <p class="text-white font-roboto mx-2">Tanggal Masuk Ternak</p>
            <input type="date" name="tanggal_masuk_ternak" required value="{{ $kandang->tanggal_masuk_ternak }}"
              class="w-full py-2 outline-none font-roboto focus:ring-0 text-neutral-700 px-2 focus:outline-none hover:outline-none focus:shadow-none rounded-md focus:border-blue-950 duration-200 border-transparent border-2">
          </div>
          <button type="submit"
            class=" w-[10rem] rounded-full text-center bg-teal-400 text-white font-roboto py-2 hover:text-teal-400 hover:bg-white duration-200 hover:shadow-md">Simpan</button>
        </form>

      </div>
    </div>
  </div>
</body>

</html>
