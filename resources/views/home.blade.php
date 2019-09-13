@extends('layouts.app')

@section('header')
    <h3 class="w-screen flex justify-center items-center h-16 font-raleway bg-gray-100 shadow">
        Welcome
    </h3>
@endsection

@section('content')
    <section class="flex flex-col justify-center items-center mt-20">
        @if (session('status'))
            <div class="flex justify-center items-center px-10 py-2 text-sm text-green-500" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <h3 class="text-xl">You are logged in!</h3>

        <div class="flex flex-col justify-center items-center w-20 mt-6">
            <a class="w-full py-2 bg-teal-400 text-center text-white text-raleway font-medium shadow"
               href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </section>
@endsection
