<x-layout>

	<div id="create-form" class="row-fluid">
		<div class="container">
			<div class="col-md-12">
				<h1>Edit an existing Timeline Event</h1>
				<p>Enter a new event below, use the text editor to format the text exactly as you would want others to 
				see it.</p>
				<hr>
			</div>
			
			<div class="col-md-12"> 

				<form action="/timeline/{{ $timeline_event->id }}" method="POST">
	 			{{ csrf_field() }}
				{{ method_field('PUT') }}
				
				<div class="form-group">
				
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" id="title" name="title" value="{{ $timeline_event->title }}" class="">
					</div>
					
					<div class="form-group">
						<label for="date">Date</label>
						<input type="date" id="event_date" name="event_date" value="{{ $timeline_event->event_date }}" class="">
					</div>	
					
					<div class="form-group">
						<label for="description">Description</label>
						<textarea id="description" name="description" class="">{{ $timeline_event->description }}</textarea>
					</div>	
					
					<div class="form-group">
						<label for="Published" class="">Published?</label>
						<input type="checkbox" id="published" name="published" value="1">								
					</div>
					
					<div class="form-group">
						<button role="submit">Submit</button>
					</div>	
					
				</div>
				
					
				</form>

			</div> <!-- end col-md-12 -->			
			
			
			
			
			
			
		</div>
	</div>
				
</x-layout>