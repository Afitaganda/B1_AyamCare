<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/js/app.js')

  <!-- Fonts -->
  <title>Medis</title>
</head>

<body>
  <div class="flex flex-col w-full min-h-screen bg-gradient-to-b from-teal-300 to-teal-600 overflow-hidden">
    <x-navbar></x-navbar>
    {{-- @yield('penyakit_list') --}}
    {{-- {{ session()->get('penyakit_list') }} --}}
    @if (count($penyakit_list) > 0)
      <div class="flex flex-col flex-1 items-center">
        <h1 class="text-white font-righteous text-3xl my-2">Daftar Penyakit</h1>
        <div class="grid w-[80vw] lg:min-w-[56rem] gap-4 p-4 grid-cols-12 mx-auto">
          @foreach ($penyakit_list as $key => $value)
            <div
              class="flex flex-col h-full font-roboto gap-y-2 lg:col-span-3 md:col-span-4 sm:col-span-6 col-span-full  cursor-pointer hover:shadow-md duration-200 bg-white text-neutral-700 p-4 rounded-md items-center">
              <h2 class="text-amber-400 font-medium text-center flex-1 ">{{ $value->nama_penyakit }}</h2>


              <div class="w-[10rem] my-2 bg-neutral-200  text-center text-white rounded-full flex items-center overflow-hidden">
                {{-- <div class="flex-1 ">View</div> --}}
                <a href="/penyakit/{{ $value->id_penyakit }}"
                  class="flex-1 py-1 text-blue-400 hover:bg-blue-400 hover:text-white duration-200">Lihat</a>
              </div>
            </div>
          @endforeach

    @endif
  </div>

</body>

</html>
