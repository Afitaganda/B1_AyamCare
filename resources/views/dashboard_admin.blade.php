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
        <a href="/dashboard?users=0"
          class="bg-rose-600 my-2 rounded-full w-[7rem] py-1 text-white hover:text-rose-600 hover:bg-white hover:shadow-md duration-200">Tutup</a>
      </div>
    </div>
    {{ session()->forget('success') }}
  @endif
  <x-navbar />
  <div class="flex-1 flex flex-col">
    <h1 class="text-5xl font-righteous text-white text-center my-4">Dashboard Admin</h1>

    <div class="flex rounded-full shadow-lg shadow-black/50 bg-white overflow-hidden w-[21rem] mx-auto mt-8">
      <a href="/dashboard?users=0"
        class="flex-1 cursor-pointer text-rose-700 text-center py-1 hover:text-white hover:bg-rose-700 text-lg font-roboto font-medium duration-200 {{ request()->get('users') == 0 ? 'bg-rose-700 text-white' : '' }}">
        <h2>Profil</h2>
      </a>
      <a href="/dashboard?users=1"
        class="flex-1 cursor-pointer text-rose-700 text-center py-1 hover:text-white hover:bg-rose-700 text-lg font-roboto font-medium duration-200 {{ request()->get('users') == 1 ? 'bg-rose-700 text-white' : '' }}">
        <h2>Daftar Pengguna</h2>
      </a>
    </div>


    @if (request()->get('users') == 1)
      <div class="flex w-[90vw] mx-auto my-4 gap-x-4">
        <div class="flex flex-col w-[15rem] rounded-lg bg-white text-neutral-600 overflow-hidden font-medium">
          <div class="w-full py-2 font-medium text-lg bg-white z-10 shadow-md text-teal-600 px-2 shadow-black/50">
            <h3>Daftar Pengguna</h3>
          </div>
          <div class="flex flex-col flex-1">
            @foreach ($users as $key => $value)
              <a href="/dashboard?users=1&username={{ $value->username }}"
                class="py-1 px-2 {{ request()->get('username') == $value->username ? 'bg-teal-600 text-white' : 'hover:bg-teal-600 hover:text-white' }}">{{ $value->username }}</a>
            @endforeach
          </div>
          <div class="flex w-full ">
            <a
              class="py-1 text-center flex-1 font-medium text-lg text-neutral-700 hover:text-white hover:bg-neutral-700 duration-200 cursor-pointer">{{ '<<Prev' }}</a>
            <a
              class="py-1 text-center flex-1 font-medium text-lg text-neutral-700 hover:text-white hover:bg-neutral-700 duration-200 cursor-pointer">{{ 'Next>>' }}</a>
          </div>
        </div>

        @if (!empty($kandang))
          <div class="flex-1 flex flex-col gap-y-2 rounded-lg bg-neutral-100 overflow-hidden p-4 justify-center">
            <h2 class="text-rose-700 text-2xl text-center font-medium">Rincian Pengguna</h2>
            <div class="grid grid-cols-12 gap-2 p-4 rounded-lg bg-white shadow-md w-[36rem] mx-auto">
              <div class="flex flex-col col-span-6">
                <p class="text-sm font-medium text-neutral-600 mx-[10px]">Nama</p>
                <input type="text" class="outline-none border-2 border-amber-400 px-2 rounded-lg py-1 text-neutral-600 font-medium" disabled
                  value="{{ $detail_user->nama_peternak }}" />
              </div>
              <div class="flex flex-col col-span-6">
                <p class="text-sm font-medium text-neutral-600 mx-[10px]">No Handphone</p>
                <input type="text" class="outline-none border-2 border-amber-400 px-2 rounded-lg py-1 text-neutral-600 font-medium" disabled
                  value="{{ $detail_user->no_handphone }}" />
              </div>
              <div class="flex flex-col col-span-6">
                <p class="text-sm font-medium text-neutral-600 mx-[10px]">Alamat</p>
                <input type="text" class="outline-none border-2 border-amber-400 px-2 rounded-lg py-1 text-neutral-600 font-medium" disabled
                  value="{{ $detail_user->alamat }}" />
              </div>
              <div class="flex flex-col col-span-6">
                <p class="text-sm font-medium text-neutral-600 mx-[10px]">E-mail</p>
                <input type="text" class="outline-none border-2 border-amber-400 px-2 rounded-lg py-1 text-neutral-600 font-medium" disabled
                  value="{{ $detail_user->email }}" />
              </div>
              <div class="flex flex-col col-span-6">
                <p class="text-sm font-medium text-neutral-600 mx-[10px]">Username</p>
                <input type="text" class="outline-none border-2 border-amber-400 px-2 rounded-lg py-1 text-neutral-600 font-medium" disabled
                  value="{{ $detail_user->username }}" />
              </div>
              <div class="flex flex-col col-span-6">
                <p class="text-sm font-medium text-neutral-600 mx-[10px]">Status Akun</p>
                <input type="text" class="outline-none border-2 border-amber-400 px-2 rounded-lg py-1 text-neutral-600 font-medium" disabled
                  value="{{ $detail_user->status_akun }}" />
              </div>
            </div>
            <h2 class="text-rose-700 text-2xl text-center font-medium">Daftar Kandang</h2>
            @if (count($kandang) > 0)
              <div class="grid grid-cols-12 gap-2">
                @foreach ($kandang as $key => $value)
                  <div
                    class="flex flex-col h-full font-roboto gap-y-2 lg:col-span-3 md:col-span-4 sm:col-span-6 col-span-full  cursor-pointer shadow-md hover:shadow-black/50 duration-200 bg-white text-neutral-700 p-4 rounded-md items-center">
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
                  </div>
                @endforeach
              </div>
          </div>
        @else
          <div class="flex-1 w-full rounded-lg flex items-center justify-center text-center">
            <h2 class="text-neutral-600 text-3xl">Pengguna Belum Menambahkan Data Kandang</h2>
          </div>
        @endif
      @else
        <div class="flex-1 w-full h-[21rem] bg-neutral-100 rounded-lg flex items-center justify-center text-center">
          <h2 class="text-neutral-600 text-3xl">Silahkan Pilih Pengguna Untuk Melihat Daftar Kandang</h2>
        </div>
    @endif
  @elseif(request()->get('users') == 0)
    <div class="flex flex-col w-[40rem] p-4 rounded-lg bg-white overflow-hidden mx-auto my-4 shadow-[5px_5px_7px_-5px_rgba(0,0,0,0.5)]">
      <h2 class="text-center font-medium text-2xl text-rose-700">Profil</h2>
      <form action="/admin/edit" method="post" class="grid grid-cols-12 gap-2">
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
          <a href="/dashboard?users=0&edit=1"
            class="col-start-10 cursor-pointer my-2 hover:text-rose-700 hover:bg-white shadow-md shadow-black/40  hover:shadow-rose-700/75 duration-200 col-end-13 py-1 text-center rounded-full bg-rose-700 text-white text-lg font-medium font-roboto ">
            <p>UBAH</p>
          </a>
        @else
          <a href="/dashboard?users=0"
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
    @endif
  </div>

  </div>
</body>

</html>
