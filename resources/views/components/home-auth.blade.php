<div class="flex flex-col w-full h-screen justify-start items-center gap-8 ">

  {{-- Deskripsi Budidaya Broiler --}}
  <div class="text-sm text-center max-w-3xl text-white font-roboto mt-8">
    <h1 class="text-3xl ">Budidaya Ayam Boiler</h1>
    <p>Sebuah peternakan ayam broiler adalah fasilitas yang mengkhususkan diri dalam produksi ayam komersial yang dibesarkan untuk diambil dagingnya.
      Ayam-ayam ini, yang dikenal sebagai broiler, umumnya merupakan jenis ayam yang telah dimodifikasi secara genetik untuk tumbuh dengan cepat dan
      efisien mengubah pakan menjadi daging. Peternakan ayam broiler didesain untuk mengoptimalkan pertumbuhan dan produktivitas, dengan hunian yang
      dikontrol suhu, sistem pemberian pakan dan air otomatis, serta sistem ventilasi dan pencahayaan yang canggih. Ayam-ayam tersebut dipelihara
      dalam ruang terbuka yang luas dengan akses makanan dan air setiap saat, dan biasanya dipanen pada usia sekitar enam hingga delapan minggu,
      ketika mereka telah mencapai berat badan yang diinginkan. Peternakan ayam broiler adalah industri yang penting di seluruh dunia, menyediakan
      sumber protein yang signifikan untuk konsumsi manusia.</p>
  </div>

  {{-- Grid Opsi --}}
  <div class="grid grid-cols-12 max-w-3xl font-light font-roboto gap-4">
    @if (auth('web')->check() && !auth('admin')->check())
      <a href="/kandang/{{ auth()->user()->username }}"
        class="flex flex-col col-span-6 p-4 rounded-md bg-white text-center text-amber-600 items-center hover:shadow-md hover:shadow-amber-400/50 duration-200 cursor-pointer">
        <img src="/icons/barn.svg" class="w-10 my-4">
        <h2 class="font-medium">Kandang</h2>
        <p>Melakukan pencatatan terkait data
          kandang peternak</p>
      </a>
    @endif
    <a
      class="flex flex-col p-4 rounded-md col-span-6 bg-white text-center text-amber-600 items-center hover:shadow-md hover:shadow-amber-400/50 duration-200 cursor-pointer">
      <img src="/icons/virus.svg" class="w-10 my-4">
      <h2 class="font-medium">Medis</h2>
      <p>Melakukan pencatatan terkait data
        penyakit hewan ternak</p>
    </a>
    <a
      class="flex flex-col p-4 rounded-md bg-white col-span-6 text-center text-amber-600 items-center hover:shadow-md hover:shadow-amber-400/50 duration-200 cursor-pointer">
      <img src="/icons/newspaper.svg" class="w-10 my-4">
      <h2 class="font-medium">Artikel</h2>
      <p>Artikel mengenai hewan ternak dan majalah perawatan hewan ternak</p>
    </a>
    <a
      class="flex flex-col p-4 rounded-md bg-white text-center text-amber-600 items-center hover:shadow-md hover:shadow-amber-400/50 duration-200 cursor-pointer {{ auth('web')->check() && !auth('admin')->check() ? 'col-span-6' : 'col-start-4 col-end-10' }}">
      <img src="/icons/diagram.svg" class="w-10 my-4">
      <h2 class="font-medium">Harga Harian</h2>
      <p>Grafik dan data terbaru terkait harga komoditas hewan ternak</p>
    </a>
  </div>
</div>
