<x-layout>

<!-- Adding TinyMCE for text edits-->
<script type="text/javascript">
	tinymce.init({
		selector: "textarea",
		height: "200",
		plugins: [
			"advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table paste"
		],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	});
</script>

<h2 class="text-2xl text-center font-bold mb-10">Edit Existing Post</h2>

<div class="w-3/4 mx-auto">
	<!-- Form to edit existing blog post-->
	<form method="POST" action="/blog/{{ $post->id }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
		<!-- Script to manage collection of uploaded image and display it. -->
		<script>
			function postImage() {			
				var imagePath = "<?php echo asset('images/media') . '/small-' ?>";
				var imageName = document.getElementById('getimage').value;
				document.getElementById('newimage').value = "";
				document.getElementById('newimage').innerHTML = "<img src=\" " + imagePath.concat(imageName) + " \"class=\"rounded-md\" \" \">";
			}
		</script> 
	
	<!-- Link to the Media section for imae uploads -->
	<div class="text-center">
		<a class="border rounded-md text-sm font-semibold py-1 px-2 bg-indigo-100" target="_blank" href="/media" role="button">Find/Upload Media</a>
	</div>

	<!-- Add image form-->		
	<div class="flex justify-center space-x-10 my-5">
		<input type="text" class="w-1/2 border rounded-md text-sm h-8" id="getimage" name="getimage" placeholder="Copy image name here">
		<div class="">
			<a class="border rounded-md text-sm py-1 px-2 bg-blue-100 hover:bg-blue-200" onclick="postImage()" role="button">Replace Image</a>
		</div>
	</div>	  

	<!-- Display the existing image and new image side by side-->
	<div class="flex justify-around mx-auto mb-10">
		<div class="">
			<P class="text-center font-semibold my-4">Existing Image</P>
			<div class="" id="oldimage"><img src="{{ asset('images/media/' . 'small-' . $post->image) }}" class="rounded-md"></div> 
		</div>
		<div class="">
			<p class="text-center font-semibold my-4">New Image (if selected)</p>
			<!-- newimage comes from JS above -->
			<div class="" id="newimage"></div> 
		</div>
	</div>

	<!-- Form elements -->
	<div class="text-center mt-2 text-red-500">
		{{ $errors->has('newimage') ? 'An image is required' : '' }}
	</div>
	
	<!-- Display old image -->
	<div class="mx-auto" id="output"></div>            
		
		<!-- Post Title -->	
		<div class="mt-3">
			<p class="font-semibold text-gray-700 mb-2">Enter title:</p>
			<div class="mt-2 text-red-500">{{ $errors->has('title') ? 'A title is required' : '' }}</div>
			<input class="border rounded-md text-sm h-8 w-full" type="text" id="title" name="title" value="{{ $post->title }}">
		</div>  
		
		<!-- Text area with TinyMCE for Excerpt of post -->
		<div class="form-group my-10">
			<p class="font-semibold text-gray-700 mb-2">Enter an excerpt:</p>
			<div class="mt-2 text-red-500">{{ $errors->has('excerpt') ? 'A excerpt is required' : '' }}</div>
			<textarea class="border rounded-md text-sm w-full" id="excerpt" name="excerpt">{{ $post->excerpt }}</textarea>
		</div> 

		<!-- Text area with TinyMCE for Body of post -->
		<div class="my-10">
			<p class="font-semibold text-gray-700 mb-2">Enter the body of the post:</p>
			<div class="mt-2 text-red-500">{{ $errors->has('body') ? 'At least some text is required for the body' : '' }}</div>
			<textarea class="" name="body" id="body">{{ $post->body }}</textarea>	
		</div>
			
		<!-- Manage category selection -->
		<div class="border my-10">
			<p class="font-semibold text-gray-700 mb-2">Select a category:</p>
			<div class="mt-2 text-red-500">{{ $errors->has('category') ? 'A category is required' : '' }}</div>
			<div class="">
				<ul class="flex justify-evenly mt-4 mb-10">
					@foreach ($categories as $category)
					<li class="">
						{{ $category->name }}
						<input type="radio" id="category" name="category" value="{{ $category->id }}"
							@if ($post->categories_id === $category->id)
								checked="checked"
							@endif
						>
					</li>
					@endforeach 
				</ul>
			</div>
		</div>  

		<!-- Post tags -->
		<div class="my-10">
			<p class="font-semibold text-gray-700 mb-2">Enter some tags if required:</p>
			<input type="text" class="w-full border rounded-md text-sm h-8" id="tags" name="tags" value="{{ $split_tags }}">
		</div>

		<!-- Post Options -->	
		<div class="">
			<p class="font-semibold text-gray-700 mb-2">Post Options:</p>
			<ul class="flex border rounded-md py-2 text-sm justify-evenly">           
				<li class="list-inline-item">
					<label>Publish?</label>     
					<input type="checkbox" class="form-field" id="published" name="published" checked="checked">
				</li>
				<li class="list-inline-item">
					<label>Featured?</label>        
					<input type="checkbox" class="form-field" id="featured" name="featured"
						@if ($post->featured == 1)
							checked="checked"
						@endif
					>
				</li>
			</ul>
		</div> 
		<button type="submit" class="my-10 border rounded-md py-1 px-2 bg-green-300 hover:bg-green-500">Update Post</button> 
	</form>

</div>

<!-- Not even sure why I added this, I think it is needed to actually load the new image on the page-->
<script>
	window.onload=postImage;
</script>

</x-layout>