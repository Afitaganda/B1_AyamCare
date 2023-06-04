<x-guest-layout>
  <form method="POST" action="/registrasi">
    @csrf

    <!-- Username -->
    <div>
      <x-input-label for="username" :value="__('Username')" />
      <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
      <x-input-error :messages="$errors->get('username')" class="mt-2" />
    </div>

    <!-- Nama Lengkap -->
    <div class="mt-4">
      <x-input-label for="nama_peternak" :value="__('Nama Lengkap')" />
      <x-text-input id="nama_peternak" class="block mt-1 w-full" type="text" name="nama_peternak" :value="old('nama_peternak')" required autofocus
        autocomplete="nama_peternak" />
      <x-input-error :messages="$errors->get('nama_peternak')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
      <x-input-label for="email" :value="__('Email')" />
      <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
      <x-input-label for="password" :value="__('Password')" />

      <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
      <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />

      <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required
        autocomplete="new-password" />

      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
      <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
        href="/login">
        {{ __('Sudah memiliki akun?') }}
      </a>

      <x-primary-button class="ml-4">
        {{ __('Daftar') }}
      </x-primary-button>
    </div>
  </form>
</x-guest-layout>
