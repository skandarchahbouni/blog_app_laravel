@extends('layouts.layout')

@section('search')
    @include('partials._search')
@endsection

@section('content')

@error('authorization')
<script> 
    alert("{{$message}}")
</script>
@enderror

{{-- @auth
    @if (auth()->user()->id == $gig->user_id)
       <button>Edit</button>
    @endif
@endauth --}}

<a href="index.html" class="inline-block text-black ml-4 mb-4" >
    <i class="fa-solid fa-arrow-left"></i> Back
</a>

<div class="mx-4">
    <div class="bg-gray-50 border border-gray-200 p-10 rounded">
        <div
            class="flex flex-col items-center justify-center text-center"
        >
            <img
                class="w-48 mr-6 mb-6"
                src="{{ $gig->company_logo ? asset("storage/" . $gig->company_logo): asset("images/placeholder.png") }}"
                alt=""
            />

            <h3 class="text-2xl mb-2">{{ $gig->job_title }}</h3>
            <div class="text-xl font-bold mb-4">{{ $gig->company_name }}</div>
            <ul class="flex">
                @foreach ($gig->tags as $tag)
                    <x-tag :title="$tag->name" />
                @endforeach
            </ul>
            <div class="text-lg my-4">
                <i class="fa-solid fa-location-dot"></i> {{ $gig->company_location }}
            </div>
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold mb-4">
                    Job Description
                </h3>
                <div class="text-lg space-y-6">
                    {{ $gig->job_description }}
                    <a
                        href="mailto:test@test.com"
                        class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-envelope"></i>
                        Contact Employer</a
                    >

                    <a
                        href="{{ $gig->company_website }}"
                        target="_blank"
                        class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-globe"></i> Visit
                        Website</a
                    >
                </div>
            </div>
        </div>
    </div>
</div>
@endsection