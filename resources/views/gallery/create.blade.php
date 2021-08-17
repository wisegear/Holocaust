<x-layout>

	<div id="create-form" class="row-fluid">
		<div class="container">
			<div class="col-md-12">
				<h1>Upload a new image</h1>
				<p>Use the form below to upload a new image.</p>
				<hr>
			</div>
			
			<div class="col-md-12"> 

				<form action="/gallery" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				
				<div class="form-group">
					<p><b>Which category do you wish to assign this image to?</b></p>
				
					@foreach ($gallery_categories as $gallery_category)
						<label class="">{{ $gallery_category->name }}</label>
						<input type="radio" id="gallery_category_id" name="gallery_category_id" value="{{ $gallery_category->id }}">
					
					@endforeach
									
					<div><hr></div>
					
					<script>
						
					</script>
					
					<p><b>Which album do you wish to assign this image to?</b></p>
					
					@foreach ($gallery_albums as $gallery_album)
					
						<label class="">{{ $gallery_album->name }}</label>
						<input type="radio" id="{{ $gallery_album->id }}" name="gallery_album_id" Value="{{ $gallery_album->id }}">
					
					@endforeach
					
					<div><hr></div>
					
					<input type="file" name="gallery-image" accept="image/*" onchange="loadFile(event)">
					
					<img id="output" class="img-responsive img-thumbnail center-block" style="margin-top: 30px;" />
					
						<script>
						  var loadFile = function(event) {
						    var output = document.getElementById('output');
						    output.src = URL.createObjectURL(event.target.files[0]);
						  };
						</script>
					
					<hr>
				</div>
				
					<div class="form-group">
						<label class="">Title</label>
						<input type="text" id="title" name="title">
					</div>
				
					<div class="form-group">
						<label class="">Description</label>
						<textarea name="description" id="description" cols="30" rows="10"></textarea>  	
					</div>	
				
					<div class="form-group">
						<label class="">Where Taken?</label>
						<input type="text" id="where_taken" name="where_taken">
					</div>	
				
					<div class="form-group">
						<label class="">When Taken</label>
						<input type="text" id="when_taken" name="when_taken">
					</div>	
				
					<div class="form-group">
						<label class="">Tags</label>
						<input type="text" id="tags" name="tags">
					</div>
					
					<div class="form-group">
						<label class="">Published?</label>
						<input type="checkbox" id="published" name="published">						
					</div>
					
					<div class="form-group">
						<button type="submit">Add Image</button>
					</div>	
					
				</div>
				
					
				</form>

			</div> <!-- end col-md-12 -->			
			
		</div>
	</div>

</x-layout>