<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/js/app.js')

  <title>Profil</title>
</head>

<body class="bg-gradient-to-b from-teal-300 to-teal-600 overflow-x-hidden flex flex-col min-h-screen">
  @if (session()->has('success'))
    <div class="flex-1 z-20 absolute w-full bg-neutral-600/50 flex items-center justify-center h-full">
      <div class="bg-white rounded-md p-4 text-center text-neutral-700 font-roboto gap-y-2 w-[15rem] items-center flex flex-col">
        <h2>Pesan!</h2>
        <p class="text-neutral-400">{{ session()->get('success') }}</p>
        <a href="/profile"
          class="bg-rose-600 my-2 rounded-full w-[7rem] py-1 text-white hover:text-rose-600 hover:bg-white hover:shadow-md duration-200">Tutup</a>
      </div>
    </div>
    {{ session()->forget('success') }}
  @endif
  <x-navbar />
  <div class="flex-1 flex flex-col">
    <h2 class="font-semibold text-white leading-tight font-righteous text-center text-3xl my-4">
      {{ __('Profil') }}
    </h2>
    <div class="flex flex-col w-[40rem] p-4 rounded-lg bg-white overflow-hidden mx-auto my-4 shadow-[5px_5px_7px_-5px_rgba(0,0,0,0.5)]">
      <h2 class="text-center font-medium text-2xl text-rose-700">Rincian Pengguna</h2>
      <form action="/user/edit" method="post" class="grid grid-cols-12 gap-2">
        @csrf
        <div class="flex flex-col col-span-6">
          <p class="text-sm font-medium text-neutral-600 mx-[10px]">Nama Peternak</p>
          <input type="text" name="nama_peternak"
            class="outline-none border-2 border-amber-400 focus:border-rose-700 focus:ring-0 duration-200 px-2 rounded-lg py-1 text-neutral-600 placeholder:text-neutral-400 font-medium"
            {{ empty(request()->get('edit')) ? 'disabled' : '' }} {{ empty($detail_user->nama_peternak) ? 'placeholder=john' : '' }}
            value="{{ $detail_user->nama_peternak }}" />
        </div>
        <div class="flex flex-col col-span-6">
          <p class="text-sm font-medium text-neutral-600 mx-[10px]">No Handphone</p>
          <input type="text" name="no_handphone"
            class="outline-none border-2 border-amber-400 focus:border-rose-700 focus:ring-0 duration-200 px-2 rounded-lg py-1 text-neutral-600 placeholder:text-neutral-400 font-medium"
            {{ empty(request()->get('edit')) ? 'disabled' : '' }} {{ empty($detail_user->no_handphone) ? 'placeholder=08123456' : '' }}
            value="{{ $detail_user->no_handphone }}" />
        </div>
        <div class="flex flex-col col-span-6">
          <p class="text-sm font-medium text-neutral-600 mx-[10px]">Alamat</p>
          <input type="text" name="alamat"
            class="outline-none border-2 border-amber-400 focus:border-rose-700 focus:ring-0 duration-200 px-2 rounded-lg py-1 text-neutral-600 placeholder:text-neutral-400 font-medium"
            {{ empty(request()->get('edit')) ? 'disabled' : '' }} {{ empty($detail_user->alamat) ? 'placeholder=st.mary' : '' }}
            value="{{ $detail_user->alamat }}" />
        </div>
        <div class="flex flex-col col-span-6">
          <p class="text-sm font-medium text-neutral-600 mx-[10px]">E-mail</p>
          <input type="text" name="email"
            class="outline-none border-2 border-amber-400 focus:border-rose-700 focus:ring-0 duration-200 px-2 rounded-lg py-1 text-neutral-600 placeholder:text-neutral-400 font-medium"
            {{ empty(request()->get('edit')) ? 'disabled' : '' }} {{ empty($detail_user->email) ? 'placeholder=user@mail.com' : '' }}
            value="{{ $detail_user->email }}" />
        </div>
        <div class="flex flex-col col-span-6">
          <p class="text-sm font-medium text-neutral-600 mx-[10px]">Username</p>
          <input type="text" name="username"
            class="outline-none border-2 border-amber-400 focus:border-rose-700 focus:ring-0 duration-200 px-2 rounded-lg py-1 text-neutral-600 placeholder:text-neutral-400 font-medium"
            {{ empty(request()->get('edit')) ? 'disabled' : '' }} {{ empty($detail_user->username) ? 'placeholder=username' : '' }}
            value="{{ $detail_user->username }}" />
        </div>
        <div class="flex flex-col col-span-6">
          <p class="text-sm font-medium text-neutral-600 mx-[10px]">Status Akun</p>
          <input type="text" name="status_akun" class="outline-none border-2 border-amber-400 px-2 rounded-lg py-1 text-neutral-600 font-medium"
            disabled value="{{ $detail_user->status_akun }}" />
        </div>
        @if (empty(request()->get('edit')))
          <a href="/profile?edit=1"
            class="col-start-10 cursor-pointer my-2 hover:text-rose-700 hover:bg-white shadow-md shadow-black/40  hover:shadow-rose-700/75 duration-200 col-end-13 py-1 text-center rounded-full bg-rose-700 text-white text-lg font-medium font-roboto ">
            <p>UBAH</p>
          </a>
        @else
          <a href="/profile"
            class="col-start-7 cursor-pointer my-2 hover:text-rose-700 hover:bg-white shadow-md shadow-black/40  hover:shadow-rose-700/75 duration-200 col-end-10 py-1 text-center rounded-full bg-rose-700 text-white text-lg font-medium font-roboto ">
            <p>BATAL</p>
          </a>
          <button type="submit"
            class="col-start-10 cursor-pointer my-2 hover:text-rose-700 hover:bg-white shadow-md shadow-black/40  hover:shadow-rose-700/75 duration-200 col-end-13 py-1 text-center rounded-full bg-rose-700 text-white text-lg font-medium font-roboto ">
            <p>SIMPAN</p>
          </button>
        @endif
      </form>
    </div>
    <a href="/cara-upgrade-vip"
      class="w-[21rem] mx-auto my-4 cursor-pointer py-2 text-white bg-yellow-500 rounded-full text-center text-lg font-righteous hover:text-yellow-500 hover:bg-white hover:shadow-md hover:shadow-yellow-500/50 duration-[400ms]">
      VIP SEKARANG
    </a>
  </div>
</body>

</html>
