<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  @vite('resources/js/app.js')

  <title>Data Pengeluaran</title>
</head>

<body class="bg-gradient-to-b from-teal-300 to-teal-600 overflow-x-hidden min-h-screen flex flex-col">
  <x-navbar />
  @if (session()->has('success'))
    <div class="absolute w-full h-full z-20 bg-neutral-400/50 flex justify-center items-center">
      <div class="bg-white rounded-md p-4 text-center text-neutral-700 font-roboto gap-y-2 w-[15rem] items-center flex flex-col">
        <h2>Pesan!</h2>
        <p class="text-neutral-400">{{ session()->get('success') }}</p>
        <a href="/kandang/detail/{{ session()->get('id_kandang') }}"
          class="bg-rose-600 my-2 rounded-full w-[7rem] py-1 text-white hover:text-rose-600 hover:bg-white hover:shadow-md duration-200">Tutup</a>
      </div>
    </div>
  @endif
  <div class="flex flex-col justify-center my-4 text-center items-center flex-1">
    <div class="bg-white/50 shadow-[3px_3px_10px_3px_rgba(0,0,0,0.3)] rounded-xl w-[30rem] pt-8  overflow-hidden">
      <div class="rounded-t-xl bg-gradient-to-b from-teal-400 to-blue-600 w-full flex flex-col relative">
        <a href="/kandang/{{ auth()->user()->username }}"
          class="absolute top-2 right-2 cursor-pointer flex hover:bg-white/60 duration-200 bg-white/25 p-1 rounded-full text-sm font-roboto text-white items-center">
          <img src="/icons/back.svg" class="w-6 h-6" alt="back">
          {{-- <p>Kembali</p> --}}
        </a>
        <h1 class="text-white font-righteous text-2xl my-2">Ubah Data Pengeluaran</h1>
        <form action="" method="post" class="flex flex-col items-center gap-y-4 my-4 h-full relative">
          @csrf
          <div class="flex flex-col items-start w-3/4 gap-[2px]">
            <p class="text-white font-roboto mx-2">Jenis Pengeluaran</p>
            <select name="jenis_pengeluaran"
              class="w-full py-2 outline-none font-roboto focus:ring-0 text-neutral-700 px-2 focus:outline-none hover:outline-none focus:shadow-none rounded-md focus:border-blue-950 duration-200 border-transparent border-2">
              <option value="Beli Pakan">Beli Pakan</option>
              <option value="Beli Obat">Beli Obat</option>
              <option value="Perawatan Alat Operasional">Perawatan Alat Operasional</option>
              <option value="Perawatan Kandang">Perawatan Kandang</option>
              <option value="Perawatan Ternak">Perawatan Ternak</option>
              <option value="Vaksinasi">Vaksinasi</option>
              <option value="Lain-lain">Lain-lain</option>
            </select>
          </div>
          <div class="flex flex-col items-start w-3/4 gap-[2px]">
            <p class="text-white font-roboto mx-2">Jumlah Pengeluaran (Rupiah)</p>
            <input type="number" step="100" name="jumlah_pengeluaran" required
              class="w-full py-2 outline-none font-roboto focus:ring-0 text-neutral-700 px-2 focus:outline-none hover:outline-none focus:shadow-none rounded-md focus:border-blue-950 duration-200 border-transparent border-2">
          </div>
          <div class="flex flex-col items-start w-3/4 gap-[2px]">
            <p class="text-white font-roboto mx-2">Tanggal Pengeluaran</p>
            <input type="date" name="tanggal_pengeluaran" required
              class="w-full py-2 outline-none font-roboto focus:ring-0 text-neutral-700 px-2 focus:outline-none hover:outline-none focus:shadow-none rounded-md focus:border-blue-950 duration-200 border-transparent border-2">
          </div>
          <button type="submit"
            class=" w-[10rem] rounded-full text-center bg-teal-700 text-white font-roboto py-2 hover:text-teal-400 hover:bg-white duration-200 hover:shadow-md">Simpan</button>
        </form>

      </div>
    </div>
  </div>
</body>

</html>
