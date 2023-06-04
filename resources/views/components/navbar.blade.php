<div class="flex py-2 px-8 bg-teal-700 backdrop-blur-sm shadow-[0px_5px_7px_0px_rgba(0.3,0.3,0.3,0.3)] z-10">
  <a href="{{ url('/') }}">
    <div class="flex items-center text-white gap-x-2">
      <div class="bg-[url('/logo.png')] bg-contain bg-no-repeat bg-center  w-[4rem] h-[4rem]"></div>
      <h1 class="font-righteous text-white drop-shadow-lg shadow-black text-2xl">AyamCare</h1>
    </div>
  </a>
  <div class="flex-1 w-full flex gap-x-2 items-center justify-center ">
    @auth
      @if (auth('web')->check() && !auth('admin')->check())
        <a class="w-[7rem] text-center py-[2px] rounded-full hover:bg-white/50 text-white font-medium font-roboto"
          href="/kandang/{{ auth()->user()->username }}">Kandang</a>
      @endif
      <a class="w-[7rem] text-center py-[2px] rounded-full hover:bg-white/50 text-white font-medium font-roboto" href="/penyakit">Medis</a>
      <a class="w-[7rem] text-center py-[2px] rounded-full hover:bg-white/50 text-white font-medium font-roboto"
        href="{{ auth('admin')->check() ? '/admin/artikel' : '/artikel' }}">Artikel</a>
      <a class="w-[7rem] text-center py-[2px] rounded-full hover:bg-white/50 text-white font-medium font-roboto" href="/harga-harian">Harga Harian</a>
    @endauth
  </div>
  <div class="flex items-center gap-x-2">
    @auth('admin')
      <a href="/dashboard?users=0"
        class="text-lg text-white font-roboto font-medium cursor-pointer px-4 py-1 rounded-full hover:shadow-md hover:bg-white hover:text-teal-600  duration-200">Halo,
        {{ auth()->user()->username }}</a>
      <a href="/logout"
        class="text-lg text-white font-roboto font-medium rounded-full bg-red-700 hover:shadow-md hover:bg-red-500 duration-200 px-4 py-1">Keluar</a>
    @endauth
    @if (auth('web')->check() && !auth('admin')->check())
      <a href="/profile"
        class="text-lg text-white font-roboto font-medium cursor-pointer px-4 py-1 rounded-full hover:shadow-md hover:bg-white hover:text-teal-600  duration-200">Halo,
        {{ auth()->user()->username }}!</a>
      <a href="/logout"
        class="text-lg text-white font-roboto font-medium rounded-full bg-red-700 hover:shadow-md hover:bg-red-500 duration-200 px-4 py-1">Keluar</a>
    @endif
    @guest()
      <a href="/login ">
        <div onclick=""
          class="w-[7rem] py-1 cursor-pointer duration-200 font-medium bg-blue-600 text-white rounded-full text-center hover:text-blue-600 hover:bg-white hover:shadow-md">
          Masuk
        </div>
      </a>
      <a href="/register">
        <div
          class="w-[7rem] py-1 cursor-pointer duration-200 font-medium bg-amber-400 text-white rounded-full text-center hover:text-amber-400 hover:bg-white hover:shadow-md">
          Daftar
        </div>
      </a>
    @endguest
  </div>
</div>
