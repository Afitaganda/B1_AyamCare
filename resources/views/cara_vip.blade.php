<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/js/app.js')

  <title>VIP</title>
</head>

<body class="bg-gradient-to-b min-w-[100vw] from-teal-300 to-teal-600 overflow-x-hidden flex flex-col  min-h-screen">
  <x-navbar />
  <div class="flex-1 flex flex-col">
    <h1 class="text-5xl font-righteous text-white text-center my-4">Cara Upgrade VIP</h1>
    <div class="flex p-4 w-[60rem] self-center bg-white rounded-lg gap-2 items-center text-yellow-500 font-semibold">
      <div class="flex flex-col flex-1 text-center">
        <h2 class="text-rose-700 font-roboto font-medium ">Langkah 1</h2>
        <p class="text-neutral-400 text-sm">Pastikan Anda sudah mengisi nomor handphone aktif yang akan digunakan untuk pembayaran pada bagian profil</p>
      </div>
      -->
      <div class="flex flex-col flex-1 text-center">
        <h2 class="text-rose-700 font-roboto font-medium">Langkah 2</h2>
        <p class="text-neutral-400 text-sm">Klik tombol "JADI VIP SEKARANG"</p>
      </div>
      -->
      <div class="flex flex-col flex-1 text-center">
        <h2 class="text-rose-700 font-roboto font-medium">Langkah 3</h2>
        <p class="text-neutral-400 text-sm">Tulis informasi data diri Anda pada format chat yang tersedia di WhatsApp admin AyamCare</p>
      </div>
      -->
      <div class="flex flex-col flex-1 text-center">
        <h2 class="text-rose-700 font-roboto font-medium">Langkah 4</h2>
        <p class="text-neutral-400 text-sm">Admin AyamCare akan memberikan detail pembayaran yang langsung bisa Anda proses untuk menikmati fitur Premium kami!</p>
      </div>
    </div>
    <a href="/cara-upgrade-vip"
      class="w-[21rem] mx-auto my-4 cursor-pointer py-2 text-white bg-yellow-500 rounded-full text-center text-lg font-righteous hover:text-yellow-500 hover:bg-white hover:shadow-md hover:shadow-yellow-500/50 duration-[400ms]">
      JADI VIP SEKARANG
    </a>
  </div>
  @if (session()->has('success'))
    <div class="flex-1 z-20 absolute w-full bg-neutral-600/50 flex items-center justify-center h-full">
      <div class="bg-white rounded-md p-4 text-center text-neutral-700 font-roboto gap-y-2 w-[15rem] items-center flex flex-col">
        <h2>Pesan!</h2>
        <p class="text-neutral-400">{{ session()->get('success') }}</p>
        <a href="/dashboard?users=0"
          class="bg-rose-600 my-2 rounded-full w-[7rem] py-1 text-white hover:text-rose-600 hover:bg-white hover:shadow-md duration-200">Tutup</a>
      </div>
    </div>
    {{ session()->forget('success') }}
  @endif
</body>

</html>
