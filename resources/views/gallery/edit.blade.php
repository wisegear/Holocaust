<x-layout>

	<div id="create-form" class="row-fluid">
		<div class="container">
			<div class="col-md-12">
				<h1>Edit an Existing image</h1>
				<p>Use the form below to change the image.</p>
				<hr>
			</div>
			
			<div class="col-md-12"> 

				{!!  Form::open(array('method' => 'put', 'action' => array('GalleryController@update', $gallery_image->id), 'files' => true))  !!}
				
				<div class="form-group">
					<p><b>Which category do you wish to assign this image to?</b></p>
				
					@foreach ($gallery_categories as $gallery_category)
					
						{!! Form::label('gallery_category_id', $gallery_category->name) !!}
						{!! Form::radio('gallery_category_id', $gallery_category->id, $gallery_category->id == $gallery_image->galleryAlbums->galleryCategories->id , ['class' => 'field']) !!}
					
					@endforeach
									
					<div><hr></div>
					
					<script>
						
					</script>
					
					<p><b>Which album do you wish to assign this image to?</b></p>
					
					@foreach ($gallery_albums as $gallery_album)
					
						{!! Form::label('gallery_album_id', $gallery_album->name) !!}
						{!! Form::radio('gallery_album_id', $gallery_album->id, $gallery_album->id == $gallery_image->gallery_albums_id, ['class' => 'field']) !!}
					
					@endforeach
					
					<div><hr></div>
					<h3>Existing Image</h3>
					<div><hr></div>	
					
					<div><img src="{{ URL::asset($gallery_path . $image_path . $gallery_image->image) }}" class="img-responsive img-thumbnail center-block"></div>
					
					<div><hr></div>
					<h3>Change the above image, upload a new one</h3>
					<div><hr></div>
					<input type="file" name="new-image" accept="image/*" onchange="loadFile(event)">
					
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
						{!! Form::label('title', 'Title:') !!}
						{!! Form::text('title', $gallery_image->title, ['class' => 'form-control']) !!}
					</div>
				
					<div class="form-group">
						{!! Form::label('description', 'Description:') !!}
						<!-- Summernote id required to enable wysiwyg editor -->
						{!! Form::textarea('description', $gallery_image->description, ['class' => 'form-control', 'id' => 'summernote']) !!}

							<!-- Initialise summernote -->

							<script>
							$(document).ready(function() {
								$('#summernote').summernote({height: 100});
							});
							</script>  <!-- End summernote -->

					</div>	
				
					<div class="form-group">
						{!! Form::label('Where_taken', 'Where was it taken?:') !!}
						{!! Form::text('where_taken', $gallery_image->location, ['class' => 'form-control']) !!}
					</div>	
				
					<div class="form-group">
						{!! Form::label('When_taken', 'When was it taken?:') !!}
						{!! Form::text('when_taken', $gallery_image->taken, ['class' => 'form-control']) !!}
					</div>	
				
					<div class="form-group">
						{!! Form::label('tags', 'Enter relevant tags for the image use a comma to seperate each tag:') !!}
						{!! Form::text('tags', $split_tags, ['class' => 'form-control']) !!}
					</div>
					
					<div class="form-group">
						{!! Form::label('published', 'Do you want to publish this image?:') !!}
						{!! Form::checkbox('published', 1, $gallery_image->published, ['class' => 'field']) !!}							
					</div>
					
					<div class="form-group">
						{!! Form::submit('Update Image', ['class' => 'btn btn-outlined btn-default form-control']) !!}
					</div>	
					
				</div>
				
					
				{!! Form::close() !!}

			</div> <!-- end col-md-12 -->			
			
		</div>
	</div>
				
</x-layout>