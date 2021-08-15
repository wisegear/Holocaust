<x-layout>

	<div id="create-form" class="row-fluid">
		<div class="container">
			<div class="col-md-12">
				<h1>Submit a new Quote</h1>
				<p>Enter a new quote below, use the text editor to format the text exactly as you would want others to 
				see it.</p>
				<hr>
			</div>
			
			<div class="col-md-12"> 

				<form action="/quotes" method="POST">
				{{ csrf_field() }}
				
				<div class="form-group">
							
					<div class="form-group">
						<label for="author">Author</label>
						<input type="text" id="quote-author" name="quote_author" class="">
					</div>
					
					<div class="form-group">
						<label for="quote_text">Quote Text</label>
						<textarea name="quote_text" id="quote_text" cols="30" rows="10"></textarea>
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