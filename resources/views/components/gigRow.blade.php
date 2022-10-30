@props(['gig'])
<tr class="border-gray-300">
    <td
        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
    >
        <a href={{ route('gigs.show', ['gig'=>$gig->id]) }}>
            {{ $gig->job_title }}
        </a>
    </td>
    <td
        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
    >
    
        <a
            href={{ route('gigs.edit', ['gig'=>$gig->id]) }}
            class="text-blue-400 px-6 py-2 rounded-xl"
            ><i
                class="fa-solid fa-pen-to-square"
            ></i>
            Edit</a
        >
    </td>
    <td
        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
    >
        <form action={{ route('gigs.destroy', ['gig'=>$gig->id]) }} method="POST">
            @csrf
            @method('DELETE')
            <button class="text-red-600">
                <i class="fa-solid fa-trash-can"></i>
                Delete
            </button>
        </form>
    </td>
</tr>