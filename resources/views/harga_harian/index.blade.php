<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/js/app.js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>


  <title>Harga Harian</title>
</head>

<body class="bg-gradient-to-b from-teal-300 to-teal-600 overflow-x-hidden overflow-y-scroll flex flex-col relative">

  <div id="delete_message" class="flex hidden z-20 cursor-default items-center justify-center absolute w-full h-full bg-neutral-600/50 ">
    <div class="bg-white p-4 gap-y-2 text-center rounded-md">
      <h2 id="pesan" class="text-xl font-medium font-roboto">Hapus Data </h2>
      <p class="w-[12rem]">Apakah anda yakin akan menghapus data tersebut?</p>
      <div class="flex gap-x-2 my-2">
        <a id="url" href=""
          class="py-1 cursor-pointer rounded-md hover:shadow-md flex-1 bg-emerald-400 text-white hover:bg-white hover:text-emerald-400 duration-200">Ya</a>
        <div onclick="hideMessage()"
          class="py-1 cursor-pointer rounded-md hover:shadow-md flex-1 bg-red-700 text-white hover:bg-white hover:text-red-700 duration-200">Tidak
        </div>
      </div>
    </div>
  </div>

  {{-- NAVBAR COMPONENT --}}
  <x-navbar />
  @if (session()->has('pesan'))
    <div class="absolute w-full h-full z-20 bg-neutral-400/50 flex justify-center items-center">
      <div class="bg-white rounded-md p-4 text-center text-neutral-700 font-roboto gap-y-2 w-[15rem] items-center flex flex-col">
        <h2>Pesan!</h2>
        <p class="text-neutral-400">{{ session()->get('pesan') }}</p>
        <a href="/harga-harian"
          class="bg-rose-600 my-2 rounded-full w-[7rem] py-1 text-white hover:text-rose-600 hover:bg-white hover:shadow-md duration-200">Tutup</a>
      </div>
    </div>
  @endif



  {{-- BODY SECTION --}}
  <div class="flex flex-col min-h-screen items-center my-4">
    {{-- JUDUL / NAMA KANDANG --}}
    <h1 class="text-3xl font-righteous text-white">Harga Harian Ayam Broiler Wilayah Jember</h1>
    <a href="/harga-harian/tambah"
      class="text-center font-roboto font-medium mt-4 rounded-md py-1 w-[15rem] text-white bg-amber-400 hover:text-amber-400 hover:bg-white hover:shadow-md hover:shadow-amber-400/75 duration-200 ">Tambah</a>
    @if (count($daftar_harga_harian) > 0)
      <div class="flex flex-col items-center">
        <table class="w-[64rem] bg-white/50 text-rose-700 table-fixed rounded-lg my-4">
          <thead>
            <tr>
              <th class="border border-teal-800 w-16">Nomor</th>
              <th class="border border-teal-800">Tanggal</th>
              <th class="border border-teal-800">Wilayah</th>
              <th class="border border-teal-800">Harga</th>
              @if (auth('admin')->check())
                <th class="border border-teal-800">Aksi</th>
              @endif

            </tr>
          </thead>
          <tbody>
            @php
              $start = 0;
              $end = 10;
              if (request()->get('menu') != null) {
                  $start += 10 * request()->get('menu');
                  $end += 10 * request()->get('menu');
              }
            @endphp
            @foreach ($daftar_harga_harian->slice($start, $end) as $key => $value)
              <tr class="text-center">
                <td class="border border-teal-800">{{ $key + 1 }}</td>
                <td class="border border-teal-800">{{ $value->tanggal }}</td>
                <td class="border border-teal-800">{{ $value->daerah }}</td>
                <td class="border border-teal-800">{{ $value->harga_ayam_boiler }}</td>
                @if (auth('admin')->check())
                  <td class="border border-teal-800">
                    <div class="flex mx-auto my-1 text-rose-700 rounded-full bg-neutral-400/75 w-[10rem] items-center overflow-hidden ">
                      {{-- <div class="px-2 py-1 flex-1 hover:bg-teal-400 hover:text-white duration-200 cursor-pointer text-center">View</div> --}}
                      <a href="/harga-harian/edit/{{ $value->id_harga_harian }}"
                        class="px-2 py-1 flex-1 hover:bg-amber-400 hover:text-white duration-200 cursor-pointer text-center">Ubah</a>
                      <div onclick="showMessage('Hapus Harga Harian', '/harga-harian/hapus/{{ $value->id_harga_harian }}')"
                        class="px-2 py-1 flex-1 hover:bg-red-700 hover:text-white duration-200 cursor-pointer text-center">Hapus</div>
                    </div>
                  </td>
                @endif
              </tr>
            @endforeach
          </tbody>
        @else
          <div>
            <div class="w-[40rem] h-[25rem] bg-[url('/images/nothing.jpg')] mt-4 mb-2 bg-cover bg-center rounded-md">
            </div>
            <div class="text-center font-roboto font-medium text-xl text-white">
              Belum Ada Data Harga Harian
            </div>
          </div>
    @endif
    </table>
    @if (count($daftar_harga_harian) > 0)
      <div class="flex rounded-full my-2 w-[15rem] bg-neutral-200 overflow-hidden text-center font-roboto font-medium text-neutral-600">
        <a href="{{ request()->get('menu') != null && request()->get('menu') != 0 ? '/harga-harian?menu=' . request()->get('menu') - 1 : '/harga-harian?menu=0' }}"
          class="py-1 flex-1 hover:bg-teal-400 hover:text-white duration-200">Sebelumnya</a>
        <a href="{{ request()->get('menu') != null ? '/harga-harian?menu=' . request()->get('menu') + 1 : '/harga-harian?menu=1' }}"
          class="py-1 flex-1 hover:bg-teal-400 hover:text-white duration-200">Selanjutnya</a>
      </div>
    @endif

  </div>



  </div>

  <script>
    let messageDisplayer = document.querySelector('#delete_message')
    let pesanWarning = document.querySelector('#pesan')
    let deleteUrl = document.querySelector('#url')

    function showMessage(pesan, url) {
      messageDisplayer.classList.remove("hidden");
      pesanWarning.innerHTML = pesan
      deleteUrl.href = url
    }

    function hideMessage() {
      messageDisplayer.classList.add("hidden")
    }
  </script>
</body>
