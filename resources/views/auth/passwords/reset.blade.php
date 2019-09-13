@extends('layouts.auth')

@section('content')
    <section class="md:flex md:flex-col md:justify-center md:items-center w-full h-full bg-gray-200">
        <div class="sm:w-full md:w-2/5 lg:w-3/12 lg:h-1/3 bg-white shadow rounded-lg">
            <h3 class="font-raleway text-xl text-center bg-teal-400 py-8 px-10 text-white">
                {{ __('Reset Password') }}
            </h3>
            <section class="py-8 px-10 border">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="flex flex-col">
                        <label for="email" class="font-raleway text-md text-gray-600">
                            {{ __('E-Mail Address') }}
                        </label>
                        <input id="email" type="email"
                               class="mt-1 py-2 px-3 border @error('email') border-red-500 outline-none @enderror"
                               name="email" value="{{ $email ?? old('email') }}"
                               placeholder="{{ __('johndoe@example.com') }}"
                               required autocomplete="email" autofocus>

                        @error('email')
                        <span class="text-xs mt-1 text-red-500" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="flex flex-col mt-4">
                        <label for="password" class="font-raleway text-md text-gray-600">
                            {{ __('Password') }}
                        </label>
                        <input id="password" type="password"
                               class="mt-1 py-2 px-3 border @error('password') border-red-500 outline-none @enderror"
                               placeholder="{{ __('********') }}"
                               name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="text-xs mt-1 text-red-500" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="flex flex-col mt-4">
                        <label for="password-confirm" class="font-raleway text-md text-gray-600">
                            {{ __('Confirm Password') }}
                        </label>
                        <input id="password-confirm" type="password" class="mt-1 py-2 px-3 border"
                               placeholder="{{ __('********') }}"
                               name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="flex flex-col justify-center items-center mt-6">
                        <button type="submit"
                                class="w-full py-2 bg-teal-400 text-center text-white text-raleway font-medium shadow">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </section>

@endsection
