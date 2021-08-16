<x-admin>

<div class="mb-4 w-4/5 mx-auto">
    <h1 class="text-center text-xl font-bold">Quotes</h1>
    <p class="text-gray-500 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos omnis quidem odio placeat, non voluptate adipisci ad obcaecati, nesciunt quod quasi esse aliquid ducimus! Debitis commodi accusantium nesciunt, non animi aspernatur? Officia optio debitis veritatis architecto dolores quisquam id, error et nam earum rerum vero itaque ab laboriosam autem repudiandae.</p>
</div>

<div class="">
    <table class="text-center table-auto border-separate border">
        <thead class="border">
            <tr class="border bg-gray-50">
                <th class="border w-1/12">ID</th>
                <th class="border w-3/12">Author</th>
                <th class="border w-1/12">Quote</th>
                <th class="border w-1/12">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($quotes as $quote)
            <tr class="border">
                <td class="border text-sm">{{ $quote->id }}</td>
                <td class="border text-sm">{{ $quote->author }}</td>
                <td class="border w-4/12 text-sm">{{ $quote->quote }}</td>
                <td class="border py-2">
                <form action="/quotes/{{ $quote->id }}" method="POST" onsubmit="return confirm('Do you really want to delete this quote?');">
                    {{ csrf_field() }}
                    {{ method_field ('DELETE') }} 			
                    <a class="border rounded-md bg-yellow-500 p-1 inline-block text-xs text-white font-bold" href="/quotes/{{ $quote->id }}/edit" role="button">Edit</a>
                    <button type="submit" class="border rounded-md bg-red-500 p-1 inline-block text-xs text-white font-bold">Del</button>
                </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="w-1/2 mx-auto my-5"> 
        {{ $quotes->links() }} 
    </div>
</div>

</x-admin>