<x-admin>

<div class="mb-4 w-4/5 mx-auto">
    <h1 class="text-center text-xl font-bold">Timeline</h1>
    <p class="text-gray-500 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos omnis quidem odio placeat, non voluptate adipisci ad obcaecati, nesciunt quod quasi esse aliquid ducimus! Debitis commodi accusantium nesciunt, non animi aspernatur? Officia optio debitis veritatis architecto dolores quisquam id, error et nam earum rerum vero itaque ab laboriosam autem repudiandae.</p>
</div>

<div class="">
    <table class="text-center table-auto border">
        <thead class="border">
            <tr class="border bg-gray-50">
                <th class="border w-1/12">ID</th>
                <th class="border w-3/12">Date</th>
                <th class="border w-1/12">Title</th>
                <th class="border w-1/12">Desc</th>
                <th class="border w-1/12">Published?</th>
                <th class="border w-1/12">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($timeline as $event)
            <tr class="border">
                <td class="border text-sm">{{ $event->id }}</td>
                <td class="border text-sm">{{ $event->event_date->format('d-m-Y') }}</td>
                <td class="border text-sm">{{ $event->title }}</td>
                <td class="border w-4/12 text-sm p-2">{{ $event->description }}</td>
                <td class="border text-sm">{{ $event->published }}</td>
                <td class="border py-2">
                <form action="/timeline/{{ $event->id }}" method="POST" onsubmit="return confirm('Do you really want to delete this event?');">
                    {{ csrf_field() }}
                    {{ method_field ('DELETE') }} 			
                    <a class="border rounded-md bg-yellow-500 p-1 inline-block text-xs text-white font-bold" href="/timeline/{{ $event->id }}/edit" role="button">Edit</a>
                    <button type="submit" class="border rounded-md bg-red-500 p-1 inline-block text-xs text-white font-bold">Del</button>
                </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="w-1/2 mx-auto my-5"> 
        {{ $timeline->links() }} 
    </div>
</div>

</x-admin>