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

  {{-- PESAN WARNING JIKA HAPUS DATA --}}
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


    {{-- BODY SECTION --}}
    <div class="flex flex-col min-h-screen items-center my-4">
    {{-- JUDUL--}}
    <h1 class="text-3xl font-righteous text-white">Harga Harian Ayam Broiler</h1>

        @if (count($data_harian) > 0)
            <div class="flex flex-col items-center">
                <table class="w-[64rem] bg-white/50 text-rose-700 table-fixed rounded-lg my-4">
                    <thead>
                        <tr>
                            <th class="border border-teal-800 w-16">Nomor</th>
                            <th class="border border-teal-800">Tanggal</th>
                            <th class="border border-teal-800">Wilayah</th>
                            <th class="border border-teal-800">Harga</th>
                            <th class="border border-teal-800">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($harga_harian as $key => $value)
                            <tr class="text-center">
                                <td class="border border-teal-800">{{ $key + 1 }}</td>
                                <td class="border border-teal-800">{{ $value->tanggal }}</td>
                                <td class="border border-teal-800">{{ $value->wilayah }}</td>
                                <td class="border border-teal-800">{{ $value->harga }}</td>
                                <td class="border border-teal-800">
                                    <div class="flex mx-auto my-1 text-rose-700 rounded-full bg-neutral-400/75 w-[10rem] items-center overflow-hidden ">
                                    {{-- <div class="px-2 py-1 flex-1 hover:bg-teal-400 hover:text-white duration-200 cursor-pointer text-center">View</div> --}}
                                    <a href="/harga_harian/edit/{{ $value->id_harga }}"
                                        class="px-2 py-1 flex-1 hover:bg-amber-400 hover:text-white duration-200 cursor-pointer text-center">Ubah</a>
                                    <div onclick="showMessage('Hapus Harga Harian', '/harga_harian/delete/{{ $value->id_harga }}')"
                                        class="px-2 py-1 flex-1 hover:bg-red-700 hover:text-white duration-200 cursor-pointer text-center">Hapus</div>
                                    </div>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
    @endif

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
