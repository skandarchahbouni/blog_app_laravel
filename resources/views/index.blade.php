@extends('layouts.layout')

@section('hero')
    @include('partials._hero')
@endsection

@section('search')
    @include('partials._search')
@endsection

@section('content')
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4" >
        <!-- Item 1 -->
        @forelse ($gigs as $gig)
            <x-gig :gig="$gig"/>
        @empty
            <p>No gigs</p>
        @endforelse
        <div class="w-100 bg-red">
            {{ $gigs->links() }}
        </div>
    </div>
    
@endsection