@extends('layouts.layout')

@section('content')
<div class="mx-4">
    @error('authorization')
        <script> 
            alert("{{$message}}")
        </script>
    @enderror
    <div class="bg-gray-50 border border-gray-200 p-10 rounded">
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Manage Gigs
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @forelse ($user_gigs as $gig)
                    <x-gigRow :gig="$gig"/>
                @empty
                    You don't have any gig
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection