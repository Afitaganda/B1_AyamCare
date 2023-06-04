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
  @if (session()->has('pesan'))
    <div class="absolute w-full h-full bg-neutral-500/50 flex items-center justify-center z-10">
      <div class="p-4 bg-white rounded-md flex flex-col items-center text-neutral-700 font-roboto font-medium gap-2 text-center">
        <h2 class="text-lg">Pesan!</h2>
        <p class="text-sm font-light text-neutral-400 w-[10rem]">{{ session()->get('pesan') }}</p>
        <a href="{{ '/admin/artikel/' . $detail_artikel->id_artikel }}"
          class="py-1 w-[7rem] text-center bg-red-500 text-white hover:text-red-500 hover:bg-white rounded-md hover:shadow-md hover:shadow-red-500/50">Tutup</a>
      </div>
    </div>
    {{ session()->forget('pesan') }}
  @endif
  <div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
      <h1 class="text-3xl font-bold mb-4">{{ $detail_artikel->title }}</h1>
      <p class="text-gray-600 mb-4">By {{ $detail_artikel->author }}</p>
      <img src="{{ $detail_artikel->image }}" alt="{{ $detail_artikel->title }}" class="w-full max-h-[40rem] object-cover mb-6">
      <p class="text-lg text-gray-800 mb-4">{{ $detail_artikel->description }}</p>
      <div class="prose max-w-none mb-6">
        {!! $detail_artikel->content !!}
      </div>
      <p class="text-gray-600">Dipublikasi pada {{ $detail_artikel->created_at->format('F j, Y') }}</p>
    </div>
  </div>

  <div class="max-w-lg flex flex-col self-center items-center ml-8">
    <h3 class="text-neutral-800 font-righteous text-2xl my-4">Komentar</h3>
    @foreach ($komentar as $comment)
      <div class="flex items-start mt-4 w-full">
        {{-- <div class="flex-shrink-0">
                <img class="h-10 w-10 rounded-full" src="{{ $comment->user->avatar }}" alt="User Avatar">
            </div> --}}
        <div class="ml-4">
          <div class="flex items-center">
            <div class="bg-gray-200 rounded-lg px-4 py-2 ">
              <p class="text-sm text-gray-700">{{ $comment->deskripsi }}</p>
            </div>
            <a href="/komentar/hapus/{{ $comment->id_komentar }}">
              <img src="/icons/delete.svg" alt="" class="hover:bg-red-100 w-10 h-10 rounded-full mx-2 p-2 cursor-pointer">
            </a>
          </div>
          <div class="mt-1 text-xs text-gray-500">
            <span>{{ $comment->akunPeternak->nama_peternak }}</span>
            <span class="mx-1">•</span>
            <span>{{ $comment->created_at->diffForHumans() }}</span>
          </div>
        </div>
      </div>
    @endforeach
    <form action="/komentar/tambah/{{ $detail_artikel->id_artikel }}" class="w-full my-4 ml-4" method="POST">
      @csrf
      <div class="flex">
        <input type="text" name="deskripsi" placeholder="Write a comment" required
          class="w-full rounded-l-lg py-2 px-4 bg-white text-gray-700 outline-none focus:border-blue-300">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-r-lg">
          Simpan
        </button>
      </div>
    </form>
  </div>
  <div class="max-w-lg mx-auto my-4">

  </div>

  <div class="bg-neutral-300 py-8">
    <div class="container mx-auto flex flex-col items-center px-4">
      <h2 class="text-2xl font-bold mb-4 text-center font-righteous text-neutral-800  ">Artikel Rekomendasi</h2>
      <div class="flex flex-col gap-6 lg:w-[60rem] md:w-[40rem] sm:w-[30rem]">
        @foreach ($recommend_artikel as $recommendedArticle)
          <div class="bg-white shadow-md flex sm:flex-row sm:items-start flex-col items-center rounded-lg p-6 gap-6">
            <img src="{{ $recommendedArticle->image }}" class="sm:w-[15rem] max-h-[12rem] object-cover w-full" alt="">
            <div class="flex flex-col">
              <h3 class="text-lg font-bold mb-2">{{ $recommendedArticle->title }}</h3>
              <p class="text-gray-600 mb-4">By {{ $recommendedArticle->author }}</p>
              <p class="text-gray-600 mb-4">By {{ $recommendedArticle->deskripsi }}</p>
              <a href="/admin/artikel/{{ $recommendedArticle->id_artikel }}" class="text-blue-600 hover:underline">Baca Selengkapnya</a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</body>

</html>
