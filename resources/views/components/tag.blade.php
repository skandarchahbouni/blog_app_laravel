@props(['title'])
<li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs" >
    <a href="{{ route('gigs.index') . "?tag=$title"}}">{{ $title }}</a>
</li>