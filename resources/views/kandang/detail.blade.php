<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/js/app.js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

  <title>Kandang</title>
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
    {{-- JUDUL / NAMA KANDANG --}}
    <h1 class="text-3xl font-righteous text-white">{{ $kandang->nama_kandang }}</h1>

    {{-- BAGIAN PILIH MENU KIRI --}}
    <div class="flex w-full px-8 my-4 gap-x-8">
      <div class="flex flex-col w-[12rem] h-[14rem] overflow-hidden bg-white rounded-md text-rose-600 font-roboto font-medium text-lg">
        <div class=" flex-1 flex items-center cursor-default px-2 w-full text-white bg-rose-700 duration-200">MENU</div>
        <a href="/kandang/detail/{{ $kandang->id_kandang }}?menu=0"
          class=" flex-1 flex items-center cursor-pointer px-2 w-full hover:text-white hover:bg-rose-700/90 duration-200">Data Harian</a>
        <a href="/kandang/detail/{{ $kandang->id_kandang }}?menu=1"
          class=" flex-1 flex items-center cursor-pointer px-2 w-full hover:text-white hover:bg-rose-700/90 duration-200">Data Pemasukan</a>
        <a href="/kandang/detail/{{ $kandang->id_kandang }}?menu=2"
          class=" flex-1 flex items-center cursor-pointer px-2 w-full hover:text-white hover:bg-rose-700/90 duration-200">Data Pengeluaran</a>
        <a href="/kandang/detail/{{ $kandang->id_kandang }}?menu=3"
          class=" flex-1 flex items-center cursor-pointer px-2 w-full hover:text-white hover:bg-rose-700/90 duration-200">Rekap Keuangan</a>
      </div>

      {{-- JIKA BARU MASUK / MENU DATA HARIAN --}}
      @if ($menu == 0 || $menu == null)
        <div class="flex-1 flex flex-col items-center bg-white/50 p-4 rounded-md">
          <div class="bg-neutral-100/50 rounded-md w-[36rem] min-h-[24rem] flex justify-center items-center text-2xl text-neutral-700">
            {!! $grafik->container() !!}

            {!! $grafik->script() !!}
          </div>
          @if (count($data_harian) > 0)
            <div class="flex flex-col items-center">
              <table class="w-[64rem] bg-white/50 text-rose-700 table-fixed rounded-lg my-4">
                <thead>
                  <tr>
                    <th class="border border-teal-800 w-16">Nomor</th>
                    <th class="border border-teal-800">Tanggal</th>
                    <th class="border border-teal-800">Bobot</th>
                    <th class="border border-teal-800">Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach ($data_harian as $key => $value)
                    <tr class="text-center">
                      <td class="border border-teal-800">{{ $key + 1 }}</td>
                      <td class="border border-teal-800">{{ $value->tanggal_pengukuran }}</td>
                      <td class="border border-teal-800">{{ $value->bobot_ternak }} Kg</td>
                      <td class="border border-teal-800">
                        <div class="flex mx-auto my-1 text-rose-700 rounded-full bg-neutral-400/75 w-[10rem] items-center overflow-hidden ">
                          {{-- <div class="px-2 py-1 flex-1 hover:bg-teal-400 hover:text-white duration-200 cursor-pointer text-center">View</div> --}}
                          <a href="/kandang/data_harian/edit/{{ $value->id_harian }}"
                            class="px-2 py-1 flex-1 hover:bg-amber-400 hover:text-white duration-200 cursor-pointer text-center">Ubah</a>
                          <div onclick="showMessage('Hapus Data Harian', '/kandang/data_harian/delete/{{ $value->id_harian }}')"
                            class="px-2 py-1 flex-1 hover:bg-red-700 hover:text-white duration-200 cursor-pointer text-center">Hapus</div>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <a href="/kandang/data_harian/add/{{ $kandang->id_kandang }}"
                class="bg-emerald-400 rounded-full text-white font-medium font-roboto  hover:text-emerald-400 hover:bg-white hover:shadow-md duration-200 cursor-pointer text-center px-4 py-1">
                Tambah
              </a>
            </div>
          @else
            <div class="w-[30rem] flex flex-col items-center gap-2 my-2">
              <div class="p-8 rounded-lg bg-neutral-200/50 text-3xl font-roboto text-white text-center w-full">
                <p>Pengguna Belum Memiliki Data Harian Kandang</p>
              </div>
              <a href="/kandang/data_harian/add/{{ $kandang->id_kandang }}"
                class="bg-emerald-400 rounded-full text-white font-medium font-roboto  hover:text-emerald-400 hover:bg-white hover:shadow-md duration-200 cursor-pointer text-center px-4 py-1">
                Tambah
              </a>
            </div>

          @endif
        </div>

        {{-- JIKA PILIH MENU DATA PEMASUKAN --}}
      @elseif($menu == 1)
        <div class="flex-1 flex flex-col items-center bg-white/50 p-4 rounded-md">
          <h2 class="text-rose-600 font-medium font-roboto text-2xl">Data Pemasukan</h2>
          @if (count($data_pemasukan) > 0)
            <div class="flex bg-emerald-400 rounded-full px-4 py-1 font-medium text-white">
              <p>Total Pemasukan: Rp. {{ $total_pemasukan }}</p>
            </div>
            <table class="w-[64rem] bg-white/50 text-rose-700 table-fixed rounded-lg my-4">
              <thead>
                <tr>
                  <th class="border border-teal-800 w-16">Nomor</th>
                  <th class="border border-teal-800">Jenis Pemasukan</th>
                  <th class="border border-teal-800">Jumlah Pemasukan</th>
                  <th class="border border-teal-800">Tanggal Pemasukan</th>
                  <th class="border border-teal-800">Aksi</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($data_pemasukan as $key => $value)
                  <tr class="text-center">
                    <td class="border border-teal-800">{{ $key + 1 }}</td>
                    <td class="border border-teal-800">{{ $value->jenis_pemasukan }}</td>
                    <td class="border border-teal-800">Rp. {{ $value->jumlah_pemasukan }}</td>
                    <td class="border border-teal-800">{{ $value->tanggal_pemasukan }}</td>
                    <td class="border border-teal-800">
                      <div class="flex mx-auto my-1 text-rose-700 rounded-full bg-neutral-400/75 w-[10rem] items-center overflow-hidden ">
                        {{-- <div class="px-2 py-1 flex-1 hover:bg-teal-400 hover:text-white duration-200 cursor-pointer text-center">View</div> --}}
                        <a href="/kandang/data_pemasukan/edit/{{ $value->id_pemasukan }}"
                          class="px-2 py-1 flex-1 hover:bg-amber-400 hover:text-white duration-200 cursor-pointer text-center">Ubah</a>
                        <div onclick="showMessage('Hapus Data Pemasukan', '/kandang/data_pemasukan/delete/{{ $value->id_pemasukan }}')"
                          class="px-2 py-1 flex-1 hover:bg-red-700 hover:text-white duration-200 cursor-pointer text-center">Hapus</div>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          @else
            <div class="bg-neutral-400/25 my-2 rounded-xl w-3/4 h-20 flex items-center justify-center">
              <p class="text-white text-xl">Data pemasukan masih kosong</p>
            </div>
          @endif
          <a href="/kandang/data_pemasukan/add/{{ $kandang->id_kandang }}"
            class="bg-emerald-400 rounded-full text-white font-medium font-roboto  hover:text-emerald-400 hover:bg-white hover:shadow-md duration-200 cursor-pointer text-center px-4 py-1">
            Tambah
          </a>
        </div>

        {{-- JIKA PILIH MENU DATA PENGELUARAN --}}
      @elseif($menu == 2)
        <div class="flex-1 flex flex-col items-center bg-white/50 p-4 rounded-md">
          <h2 class="text-rose-600 font-medium font-roboto text-2xl">Data Pengeluaran</h2>
          @if (count($data_pengeluaran) > 0)
            <div class="flex bg-emerald-400 rounded-full px-4 py-1 font-medium text-white">
              <p>Total Pengeluaran: Rp. {{ $total_pengeluaran }}</p>
            </div>
            <table class="w-[64rem] bg-white/50 text-rose-700 table-fixed rounded-lg my-4">
              <thead>
                <tr>
                  <th class="border border-teal-800 w-16">Nomor</th>
                  <th class="border border-teal-800">Jenis Pengeluaran</th>
                  <th class="border border-teal-800">Jumlah Pengeluaran</th>
                  <th class="border border-teal-800">Tanggal Pengeluaran</th>
                  <th class="border border-teal-800">Aksi</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($data_pengeluaran as $key => $value)
                  <tr class="text-center">
                    <td class="border border-teal-800">{{ $key + 1 }}</td>
                    <td class="border border-teal-800">{{ $value->jenis_pengeluaran }}</td>
                    <td class="border border-teal-800">Rp. {{ $value->jumlah_pengeluaran }}</td>
                    <td class="border border-teal-800">{{ $value->tanggal_pengeluaran }}</td>
                    <td class="border border-teal-800">
                      <div class="flex mx-auto my-1 text-rose-700 rounded-full bg-neutral-400/75 w-[10rem] items-center overflow-hidden ">
                        {{-- <div class="px-2 py-1 flex-1 hover:bg-teal-400 hover:text-white duration-200 cursor-pointer text-center">View</div> --}}
                        <a href="/kandang/data_pengeluaran/edit/{{ $value->id_pengeluaran }}"
                          class="px-2 py-1 flex-1 hover:bg-amber-400 hover:text-white duration-200 cursor-pointer text-center">Ubah</a>
                        <div onclick="showMessage('Hapus Data Pengeluaran', '/kandang/data_pengeluaran/delete/{{ $value->id_pengeluaran }}')"
                          class="px-2 py-1 flex-1 hover:bg-red-700 hover:text-white duration-200 cursor-pointer text-center">Hapus</div>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          @else
            <div class="bg-neutral-400/25 my-2 rounded-xl w-3/4 h-20 flex items-center justify-center">
              <p class="text-white text-xl">Data pengeluaran masih kosong</p>
            </div>
          @endif
          <a href="/kandang/data_pengeluaran/add/{{ $kandang->id_kandang }}"
            class="bg-emerald-400 rounded-full text-white font-medium font-roboto  hover:text-emerald-400 hover:bg-white hover:shadow-md duration-200 cursor-pointer text-center px-4 py-1">
            Tambah
          </a>
        </div>
      @elseif($menu == 3)
        <div class="flex-1 flex flex-col items-center bg-white/50 p-4 rounded-md">
          <h2 class="text-rose-600 font-medium font-roboto text-2xl">Rekap Keuangan</h2>
          @if (count($data_pengeluaran) > 0 || count($data_pemasukan) > 0)
            <div class="flex bg-emerald-400 rounded-full px-4 py-1 font-medium text-white">
              <p>Total Keuangan: Rp. {{ $total_pemasukan - $total_pengeluaran }}</p>
            </div>
          @else
            <div class="bg-neutral-400/25 my-2 rounded-xl w-3/4 h-20 flex items-center justify-center">
              <p class="text-white text-xl">Data Pengeluaran dan Pemasukan masih kosong</p>
            </div>
          @endif
        </div>
      @else
        <div class="flex-1 flex flex-col items-center bg-white/50 p-4 rounded-md">
          <p>Error</p>
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

</html>
