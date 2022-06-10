@extends('layouts.app')

@section('content')
    <div class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-lg text-light dark:text-gray-500 underline">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-lg text-light dark:text-gray-500 underline">Log in</a>
                @endauth
            </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <h1 class="text-danger">SAYPR Case - Emre Karameşe</h1>

        </div>
    </div>
    </div>
@endsection
