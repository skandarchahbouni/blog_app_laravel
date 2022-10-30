@extends('layouts.layout')

@section('content')
<div class="mx-4">
    <div
        class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
    >
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Login
            </h2>
            <p class="mb-4">Login to post gigs</p>
            @error('failure')
            <span class="text-red-600 sans-serif text-lg mt-1">
                {{ $message }}
            </span>
            @enderror
        </header>
        <form action={{ route('login') }} method="POST">
            @csrf
            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2"
                    >Email</label
                >
                <input
                    class="@error('email') border-red-400 @enderror border border-gray-200 rounded p-2 w-full"
                    name="email"
                    value="{{old('email')}}"
                />
                @error('email')
                    <x-error :message="$message" />
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="password"
                    class="inline-block text-lg mb-2"
                >
                    Password
                </label>
                <input
                    type="password"
                    class="@error('password') border-red-400 @enderror border border-gray-200 rounded p-2 w-full"
                    name="password"
                    value="{{old('password')}}"
                />
                @error('password')
                    <x-error :message="$message" />
                @enderror
            </div>

            <div class="mb-6">
                <button
                    type="submit"
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                >
                    Login
                </button>
            </div>

            <div class="mt-8">
                <p>
                    Don't have an account?
                    <a href={{ route('register') }} class="text-laravel"
                        >Register</a
                    >
                </p>
            </div>
        </form>
    </div>
</div>
@endsection