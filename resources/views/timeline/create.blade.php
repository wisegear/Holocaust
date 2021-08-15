<x-layout>

	<div id="create-form" class="row-fluid">
		<div class="container">
			<div class="col-md-12">
				<h1>Submit a new Timeline Event</h1>
				<p>Enter a new event below, use the text editor to format the text exactly as you would want others to 
				see it.</p>
				<hr>
			</div>
			
			<div class="col-md-12"> 

				<form method="POST" action="/timeline">
				{{ csrf_field() }}
				
				<div class="form-group">
				
					<div class="form-group">
						<label for="title" class="">Title</label>
						<input type="text" id="title" name="title" class="">
					</div>
					
					<div class="form-group">
						<label for="event_date" class="">Date</label>
						<input type="date" id="event_date" name="event_date" class="">
					</div>	
					
					<div class="form-group">
						<label for="description" class="">Description</label>
						<textarea id="description" name="description" class=""></textarea>
					</div>	
					
					<div class="form-group">
						<label for="Published" class="">Published?</label>
						<input type="checkbox" id="published" name="published" value="1">						
					</div>
					
					<div class="form-group">
						<button type="submit">Submit</button>
					</div>	
					
				</div>
				
					
				</form>

			</div> <!-- end col-md-12 -->
			
			
			
			
			
			
		</div>
	</div>
				
</x-layout>