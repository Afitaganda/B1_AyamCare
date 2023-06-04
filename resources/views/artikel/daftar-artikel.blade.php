<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Artikel</title>
  @vite('resources/js/app.js')

</head>

<body class="bg-neutral-100 overflow-x-hidden min-h-screen flex flex-col relative">
  <x-navbar />
  <div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold my-6 text-center font-righteous text-neutral-800">Artikel</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      @foreach ($daftar_artikel as $article)
        <a href="/artikel/{{ $article->id_artikel }}" class="bg-white shadow-md rounded-lg p-6 hover:shadow-lg">
          <h2 class="text-xl font-bold mb-4 h-14 line-clamp-2 ">{{ $article->title }}</h2>
          <p class="text-gray-600 mb-4">{{ $article->author }}</p>
          <img src="{{ $article->gambar }}" alt="{{ $article->title }}" class="w-full h-[16rem] object-cover mb-4">
          <p class=" font-roboto font-medium text-neutral-600 ">{{ $article->deskripsi }}</p>
          {{-- {!! $article->content !!} --}}
        </a>
      @endforeach
    </div>
  </div>

</body>

</html>
