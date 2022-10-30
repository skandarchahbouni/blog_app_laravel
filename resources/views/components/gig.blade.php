@props(['gig'])

<div class="bg-gray-50 border border-gray-200 rounded p-6">
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{ $gig->company_logo ? asset("storage/" . $gig->company_logo): asset("images/placeholder.png") }}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href={{"/gigs/$gig->id"}}>{{ $gig->job_title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $gig->comapany_name }}</div>
            <ul class="flex"> 
                @php
                    $tags = ["Laravel", "Mysql", "Php", "Vue"]
                @endphp
                @foreach ($gig->tags as $tag)
                    <x-tag :title="$tag->name" />
                @endforeach
            </ul>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $gig->job_location }}
            </div>
        </div>
    </div>
</div>