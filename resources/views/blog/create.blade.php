@extends('layouts.app')

@section('content')

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

<h2 class="text-2xl text-center font-bold mb-10">Create a New Post</h2>

<div class="w-3/4 mx-auto">
	<form method="POST" action="/blog" enctype="multipart/form-data">
	{{ csrf_field() }}

		<script>
			function postImage() {
				
				var imagePath = "<?php echo asset('images/media') . '/large-' ?>";
				var imageName = document.getElementById('newimage').value;
				document.getElementById('output').value = "";
				document.getElementById('output').innerHTML = "<img src=\" " + imagePath.concat(imageName) + " \"class=\"rounded-md\" \" \">";
			}
		</script> 
	
	<div class="text-center">
		<a class="border rounded-md text-sm font-semibold py-1 px-2 bg-indigo-100" target="_blank" href="/media" role="button">Upload/Insert Media</a>
	</div>

	<div class="flex justify-center space-x-10 my-5">
		<input type="text" class="w-1/2 border rounded-md text-sm h-8" id="newimage" name="newimage" placeholder="Copy image name here" value="{{ old('newimage') }}">
		<div class="">
			<button class="border rounded-md text-sm py-1 px-2 bg-blue-100 hover:bg-blue-200" onclick="postImage()">Update</button>
		</div>
	</div>	  

	<div class="text-center mt-2 text-red-500">
		{{ $errors->has('newimage') ? 'An image is required' : '' }}
	</div>

	<div class="mx-auto" id="output"></div>            
				
		<div class="mt-3">
			<p class="font-semibold text-gray-700 mb-2">Enter title:</p>
			<div class="mt-2 text-red-500">{{ $errors->has('title') ? 'A title is required' : '' }}</div>
			<input class="border rounded-md text-sm h-8 w-full" type="text" id="title" name="title"  value="{{ old('title') }}" placeholder="Enter a title for this post">
		</div>  
		
		<!-- Text area with TinyMCE for Excerpt of post -->
		<div class="form-group my-10">
			<p class="font-semibold text-gray-700 mb-2">Enter an excerpt:</p>
			<div class="mt-2 text-red-500">{{ $errors->has('excerpt') ? 'A excerpt is required' : '' }}</div>
			<textarea class="border rounded-md text-sm w-full" id="excerpt" name="excerpt"  value="{{ old('excerpt') }}" placeholder="Enter a excerpt for this post"></textarea>
		</div> 

		<!-- Text area with TinyMCE for Body of post -->
		<div class="my-10">
			<p class="font-semibold text-gray-700 mb-2">Enter the body of the post:</p>
			<div class="mt-2 text-red-500">{{ $errors->has('body') ? 'At least some text is required for the body' : '' }}</div>
			<textarea class="" name="body" id="body" placeholder="This is the body of the post">{{ old('body') }}</textarea>	
		</div>
			
		<div class="border my-10">
			<p class="font-semibold text-gray-700 mb-2">Select a category:</p>
			<div class="mt-2 text-red-500">{{ $errors->has('category') ? 'A category is required' : '' }}</div>
			<div class="">
				<ul class="flex justify-evenly mt-4 mb-10">
				@foreach ($categories as $category)
				<li class="">
				<input type="radio" id="category" name="category" value="{{ $category->id }}"> 
				{{ $category->name }}            
				</li class="list-inline-item">
				@endforeach
				</ul>
			</div>
		</div>  

		<div class="my-10">
			<p class="font-semibold text-gray-700 mb-2">Enter some tags if required:</p>
			<input type="text" class="w-full border rounded-md text-sm h-8" id="tags" name="tags" placeholder="Enter tags for the post, eg. one-two-three">
		</div>

		<div class="">
			<p class="font-semibold text-gray-700 mb-2">Post Options:</p>
			<ul class="flex border rounded-md py-2 text-sm justify-evenly">           
				<li class="list-inline-item">
					<label>Publish?</label>     
					<input type="checkbox" class="form-field" id="published" name="published">
				</li>
				<li class="list-inline-item">
					<label>Featured?</label>        
					<input type="checkbox" class="form-field" id="featured" name="featured">
				</li>
			</ul>
		</div> 
		<button type="submit" class="my-10 border rounded-md py-1 px-2 bg-green-300 hover:bg-green-500">Create New Post</button> 
	</form>

</div>

<script>
	window.onload=postImage;
</script>
@endsection