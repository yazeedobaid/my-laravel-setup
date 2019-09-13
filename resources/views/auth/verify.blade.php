@extends('layouts.auth')

@section('content')
    <section class="md:flex md:flex-col md:justify-center md:items-center w-full h-full bg-gray-200">
        <div class="sm:w-full md:w-2/5 lg:w-3/12 lg:h-1/3 bg-white shadow rounded-lg">
            <h3 class="font-raleway text-xl text-center bg-teal-400 py-8 px-10 text-white">
                {{ __('Verify Your Email Address') }}
            </h3>
            @if (session('resent'))
                <div class="flex justify-center items-center px-10 py-2 text-sm text-green-500" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif
            <section class="py-8 px-10 border">

                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }},
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <div class="flex flex-col justify-center items-center mt-6">
                        <button type="submit"
                                class="w-full py-2 bg-teal-400 text-center text-white text-raleway font-medium shadow">
                            {{ __('click here to request another') }}
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </section>

@endsection
