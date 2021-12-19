<x-admin>

<div>

    <div class="mb-4 w-4/5 mx-auto">
        <h1 class="text-center text-xl font-bold">Gallery Index</h1>
        <p class="text-gray-500 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos omnis quidem odio placeat, non voluptate adipisci ad obcaecati, nesciunt quod quasi esse aliquid ducimus! Debitis commodi accusantium nesciunt, non animi aspernatur? Officia optio debitis veritatis architecto dolores quisquam id, error et nam earum rerum vero itaque ab laboriosam autem repudiandae.</p>
    </div>

    <div class="text-center my-5">
        <a class="border rounded-md py-1 px-2 bg-indigo-300 text-sm" href="/admin/gallery-categories" role="button">Categories</a>
    </div>

    <div class="">
        <table class="table-fixed text-center">
            <thead class="border">
                <tr class="border bg-gray-50">
                    <th class="border w-1/12">ID</th>
                    <th class="border w-3/12">Title</th>
                    <th class="border w-3/12">Category</th>
                    <th class="border w-3/12">Album</th>
                    <th class="border w-1/12">Image</th>
                    <th class="border w-1/12">Date Created</th>
                    <th class="border w-1/12">Published</th>
                    <th class="border w-1/12">Action</th>
                </tr>
            </thead>
            <tbody class="text-sm">
            @foreach ($gallery_images as $image)
                <tr class="border">
                    <td class="border">{{ $image->id }}</td>
                    <td class="border"><a href="/gallery/{{ $image->id }}" class="text-indigo-700 hover:text-indigo-300">{{ $image->title }}</a></td>
                    <td class="border">{{ $image->galleryalbums->gallerycategories->name }}</td>
                    <td class="border">{{ $image->galleryalbums->name }}</td>
                    <td class="border text-xs p-2"><img src="{{$gallery_path}}/{{$image->galleryalbums->gallerycategories->name}}/{{$image->galleryAlbums->name}}/thumb-{{$image->image}}"></td>
                    <td class="border">{{ $image->created_at->format('d-m-Y') }}</td>
                    <td class="border">{{ $image->published }}</td>
                    <td class="border">
                    <form action="/gallery/{{ $image->id }}" method="POST" onsubmit="return confirm('Do you really want to delete this Image?');" class="flex justify-evenly w-20">
                        {{ csrf_field() }}
                        {{ method_field ('DELETE') }} 			
                        <a class="border rounded-md bg-yellow-500 p-1 inline-block text-xs text-white font-bold" href="/gallery/{{ $image->id }}/edit" role="button">Edit</a>
                        <button type="submit" class="border rounded-md bg-red-500 p-1 inline-block text-xs text-white font-bold">Del</button>
                    </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="w-1/2 mx-auto my-5"> 
            {{ $gallery_images->links() }} 
        </div>
    </div>

</div>

</x-admin>