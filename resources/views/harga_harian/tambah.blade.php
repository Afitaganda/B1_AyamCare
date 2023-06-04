<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  @vite('resources/js/app.js')

  <title>Harga Harian</title>
</head>

<body class="bg-gradient-to-b from-teal-300 to-teal-600 overflow-x-hidden min-h-screen flex flex-col">
  <x-navbar />
  @if (session()->has('success'))
    <div class="absolute w-full h-full z-20 bg-neutral-400/50 flex justify-center items-center">
      <div class="bg-white rounded-md p-4 text-center text-neutral-700 font-roboto gap-y-2 w-[15rem] items-center flex flex-col">
        <h2>Pesan!</h2>
        <p class="text-neutral-400">{{ session()->get('success') }}</p>
        <a href="/harga_harian/detail/{{ request()->route()->id_harga }}"
          class="bg-rose-600 my-2 rounded-full w-[7rem] py-1 text-white hover:text-rose-600 hover:bg-white hover:shadow-md duration-200">Tutup</a>
      </div>
    </div>
  @endif
  <div class="flex flex-col justify-center my-4 text-center items-center flex-1">
    <div class="bg-white/50 shadow-[3px_3px_10px_3px_rgba(0,0,0,0.3)] rounded-xl w-[30rem] pt-8  overflow-hidden">
      <div class="rounded-t-xl bg-gradient-to-b from-teal-400 to-blue-600 w-full flex flex-col relative">
        <a href="/harga-harian"
          class="absolute top-2 right-2 cursor-pointer flex hover:bg-white/60 duration-200 bg-white/25 p-1 rounded-full text-sm font-roboto text-white items-center">
          <img src="/icons/back.svg" class="w-6 h-6" alt="back">
          {{-- <p>Kembali</p> --}}
        </a>
        <h1 class="text-white font-righteous text-2xl my-2">Tambah Harga Harian</h1>
        <form action="/harga-harian/tambah" method="POST" enctype="multipart/form-data" class="my-4 items-center flex flex-col w-full">
          @csrf

          <div class="mb-4">
            <label for="author" class="block text-gray-700 text-sm font-bold mb-2">Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" required
              class="w-[20rem] border border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:ring focus:border-blue-300">
          </div>

          <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Harga Ayam Boiler:</label>
            <input type="number" step="100" name="harga_ayam_boiler" id="harga_ayam_boiler" required placeholder="Harga Ayam"
              class="w-[20rem] border border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:ring focus:border-blue-300">
          </div>

          <div class="mb-4">
            <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Daerah:</label>
            <input disabled type="text" name="daerah" id="daerah" required value="Jember"
              class="w-[20rem] border border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:ring focus:border-blue-300">
          </div>

          <div class="flex justify-center">
            <button type="submit"
              class="bg-teal-400 w-[11rem] hover:text-teal-400 hover:bg-white hover:shadow-md hover:shadow-teal-400/50 duration-200 text-white font-bold py-2 px-4 rounded">
              Save
            </button>
          </div>
        </form>

      </div>
    </div>
  </div>
</body>

</html>
