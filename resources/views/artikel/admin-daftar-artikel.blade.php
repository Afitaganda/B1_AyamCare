<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/js/app.js')

  <title>Tambah Artikel</title>

  <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
  <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
  <script>
    const showDeleteModal = (link) => {
      document.getElementById("modal-delete-data").classList.remove("hidden")
      document.getElementById("modal-delete-data-link").href = `${link}`
      document.getElementById("modal-delete-data-main").scrollIntoView({
        behavior: 'smooth'
      });
      window.scrollBy(0, -500)
    }

    const hideDeleteModal = () => {
      document.getElementById("modal-delete-data").classList.add("hidden")
      document.getElementById("modal-delete-data-link").href = "/"
    }
  </script>
  <style>
    trix-toolbar [data-trix-button-group='file-tools'] {
      display: none
    }

    trix-editor {
      background: white
    }

    trix-toolbar [data-trix-button-group] {
      background: white
    }
  </style>
</head>

<body class="bg-neutral-100 overflow-x-hidden min-h-screen flex flex-col relative ">
  <x-navbar />
  <x-modal-delete-data />
  @if (session()->has('pesan'))
    <div class="absolute w-full h-full bg-neutral-500/50 flex items-center justify-center z-10">
      <div class="p-4 bg-white rounded-md flex flex-col items-center text-neutral-700 font-roboto font-medium gap-2 text-center">
        <h2 class="text-lg">Pesan!</h2>
        <p class="text-sm font-light text-neutral-400 w-[10rem]">{{ session()->get('pesan') }}</p>
        <a href="/admin/artikel"
          class="py-1 w-[7rem] text-center bg-red-500 text-white hover:text-red-500 hover:bg-white rounded-md hover:shadow-md hover:shadow-red-500/50">Tutup</a>
      </div>
    </div>
    {{ session()->forget('pesan') }}
  @endif
  <a href="/artikel/tambah"
    class="w-[11rem] mx-auto my-4 text-center font-roboto font-medium rounded-md py-1 bg-teal-400 text-white hover:bg-white hover:text-teal-400 hover:shadow-md hover:shadow-teal-400/50 duration-200">Tambah
    Artikel</a>
  <div class="container mx-auto px-4 mb-8">
    <h1 class="text-3xl font-bold my-6 text-center font-righteous text-neutral-800">Artikel</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      @foreach ($daftar_artikel as $article)
        <div href="/artikel/{{ $article->id_artikel }}" class="bg-white shadow-md rounded-lg p-6 hover:shadow-lg flex flex-col">
          <h2 class="text-xl font-bold mb-4 h-14 line-clamp-2 ">{{ $article->title }}</h2>
          <p class="text-gray-600 mb-4">{{ $article->author }}</p>
          <img src="{{ $article->image }}" alt="{{ $article->title }}" class="w-full h-[16rem] object-cover mb-4">
          <p class="flex-1 mb-2 font-roboto font-medium text-neutral-600 ">{{ $article->deskripsi }}</p>
          <div class="flex items-end gap-2 w-full">
            <a href="/admin/artikel/{{ $article->id_artikel }}"
              class="flex-1 font-roboto font-medium text-center cursor-pointer rounded-md py-1 bg-teal-400 text-white hover:bg-white hover:text-teal-400 hover:shadow-md hover:shadow-teal-400/50 duration-200">
              Lihat</a>
            <a href="/artikel/edit/{{ $article->id_artikel }}"
              class="flex-1 font-roboto font-medium text-center cursor-pointer rounded-md py-1 bg-yellow-500 text-white hover:bg-white hover:text-yellow-500 hover:shadow-md hover:shadow-yellow-500/50 duration-200">
              Ubah</a>
            <button onclick="showDeleteModal('{{ '/artikel/hapus/' . $article->id_artikel }}')"
              class="flex-1 font-roboto font-medium text-center cursor-pointer rounded-md py-1 bg-red-600 text-white hover:bg-white hover:text-red-600 hover:shadow-md hover:shadow-red-600/50 duration-200">
              Hapus</button>
          </div>
          {{-- {!! $article->content !!} --}}
        </div>
      @endforeach
    </div>
  </div>

</body>

</html>
