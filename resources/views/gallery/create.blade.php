<x-layout>

<div class="">

	<div class="mb-10">
		<h2 class="text-lg text-center font-bold">Add new image to gallery</h2>
		<p class="text-center text-sm w-1/2 mx-auto">Use this form to add a new image to the gallery.  No bulk upload option is provided as it is expected each image will require all fields to 
			be completed on each upload to improve the indexing and searchability of the gallery.</p>
	</div>
			
	<div class=""> 

			<!-- Select category for the image -->
			<form action="">
				<div class="text-center mb-10">
					<p class="font-bold">Which category do you wish to assign this image to?</p>
					<p class="w-1/2 mx-auto text-sm text-gray-500 mb-2">In order to place the image in the right album you must select the top-level category and click on the get albums 
						button.  This will display the albums below.</p>	
					<div class="flex justify-center items-center gap-5">
						@foreach ($gallery_categories as $gallery_category)
							<div>
								<label class="capitalize">{{ $gallery_category->name }}</label>
								<input type="radio" id="gallery_category_id" name="gallery_category_id" value="{{ $gallery_category->id }}">
							</div>
						@endforeach
						<button class="border rounded-md text-xs py-1 px-2 bg-indigo-300 font-bold" type="submit">Get Albums</button>
					</div>
				</div>
			</form>

		<form method="post" action="/gallery" enctype="multipart/form-data">
		{{ csrf_field() }}	

			<!-- Select album for the image -->
			<div class="text-center mb-10">
				<p class="font-bold mb-5">Which Album do you wish to assign this image to?</p>	
				<div class="flex justify-center items-center gap-5">
					@if ( request()->has('gallery_category_id') )
						@foreach ($gallery_albums as $album)
							@if ($album->gallery_categories_id == request()->get('gallery_category_id'))
								<div>
									<label class="capitalize">{{ $album->name }}</label>
									<input type="radio" id="gallery_album_id" name="gallery_album_id" value="{{ $album->id }}">
								</div>
							@endif
						@endforeach
					@else
						<p class="text-red-500 font-bold">Please select a category to display associated albums</p>
					@endif
				</div>
			</div>

			<!-- Select an image to upload -->	
			<div class="w-1/2 mx-auto">
				<h2 class="text-lg font-bold mb-2 text-center">Select an image to upload</h2>
				<input type="file" class="" name="gallery-image" accept="image/*" onchange="loadFile(event)">
				<img id="output" class="rounded-md my-5"/>
				<script>
					var loadFile = function(event) {
					var output = document.getElementById('output');
					output.src = URL.createObjectURL(event.target.files[0]);
					};
				</script>
			</div>

			<!-- Add the image information -->
			<div class="mt-10 w-4/5 mx-auto space-y-5">
				<h2 class="text-lg font-bold mb-5">Add image detail</h2>
				<div class="">
					<label class="block mb-2 font-semibold">Title</label>
					<input type="text" id="title" name="title" class="w-full">
				</div>
			
				<div class="">
					<label class="block mb-2 font-semibold">Description</label>
					<textarea name="description" id="description" class="w-full"></textarea>  	
				</div>	
			
				<div class="">
					<label class="block mb-2 font-semibold">Where Taken?</label>
					<input type="text" id="where_taken" name="where_taken" class="w-full">
				</div>	
			
				<div class="">
					<label class="block mb-2 font-semibold">When Taken</label>
					<input type="text" id="when_taken" name="when_taken" class="w-full">
				</div>	
			
				<div class="">
					<label class="block mb-2 font-semibold">Tags (comma separated - one,two,three)</label>
					<input type="text" id="tags" name="tags" class="w-full">
				</div>
				
				<div class="">
					<label class="">Published?</label>
					<input type="checkbox" id="published" name="published" checked="checked">						
				</div>
				
				<div class="">
					<button type="submit" class="border rounded-md bg-green-300 p-1">Add Image</button>
				</div>	
					
			</div>
		</div>					
	</form>
</div>
</x-layout>