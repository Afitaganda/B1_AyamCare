<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/js/app.js')

  <title>Edit Artikel</title>

  <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
  {{-- <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script> --}}
  <script src="https://cdn.tiny.cloud/1/wnobc72ke3j16k27hlchjvkext8quapeatov1srb4r96qh7y/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: '#content',
      height: 300,
      plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount',
        'lists'
      ],
      toolbar: 'undo redo | formatselect | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help' + 'numlist bullist',
      content_css: '//www.tiny.cloud/css/codepen.min.css'
    });
  </script>
</head>

<body class="antialiased bg-neutral-200 min-h-screen w-full flex flex-col overflow-x-hidden relative">
  @if (session()->has('pesan'))
    <div class="absolute w-full h-full bg-neutral-500/50 flex items-center justify-center z-10">
      <div class="p-4 bg-white rounded-md flex flex-col items-center text-neutral-700 font-roboto font-medium gap-2 text-center">
        <h2 class="text-lg">Pesan!</h2>
        <p class="text-sm font-light text-neutral-400 w-[10rem]">{{ session()->get('pesan') }}</p>
        <a href="{{ '/artikel/edit/' . $article->id_artikel }}"
          class="py-1 w-[7rem] text-center bg-red-500 text-white hover:text-red-500 hover:bg-white rounded-md hover:shadow-md hover:shadow-red-500/50">tutup</a>
      </div>
    </div>
    {{ session()->forget('pesan') }}
  @endif
  <x-navbar />
  <div class="max-w-3xl mx-auto mb-8">
    <h1 class="font-righteous text-center text-neutral-800 text-3xl my-4">Ubah Artikel</h1>
    <form action="/artikel/edit/{{ $article->id_artikel }}" method="POST" enctype="multipart/form-data" class="mt-4">
      @csrf

      <div class="mb-4">
        <label for="author" class="block text-gray-700 text-sm font-bold mb-2">Penulis:</label>
        <input value="{{ $article->author }}" type="text" name="author" id="author" required
          class="w-full border border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:ring focus:border-blue-300"
          placeholder="Masukkan nama penulis">
      </div>

      <div class="mb-4">
        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Judul:</label>
        <input value="{{ $article->title }}" type="text" name="title" id="title" required
          class="w-full border border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:ring focus:border-blue-300"
          placeholder="Enter the article title">
      </div>

      <div class="mb-4">
        <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi:</label>
        <input value="{{ $article->deskripsi }}" type="text" name="deskripsi" id="deskripsi" required
          class="w-full border border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:ring focus:border-blue-300"
          placeholder="Masukkan deskripsi artikel">
      </div>

      <div class="mb-4">
        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Gambar:</label>
        <input type="file" name="image" id="image" accept="image/*" class="w-full">
      </div>

      <div class="mb-4">
        <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Konten:</label>
        <textarea required name="content" id="content"
          class="w-full border border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:ring focus:border-blue-300" rows="8"
          placeholder="Masukkan asi artikel">{{ $article->content }}</textarea>
        @error('content')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex justify-center">
        <button type="submit"
          class="bg-teal-400 w-[11rem] hover:text-teal-400 hover:bg-white hover:shadow-md hover:shadow-teal-400/50 duration-200 text-white font-bold py-2 px-4 rounded">
          Simpan
        </button>
      </div>
    </form>
  </div>

</body>

</html>
