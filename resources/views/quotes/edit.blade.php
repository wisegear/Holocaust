<x-layout>

	<div id="create-form" class="row-fluid">
		<div class="container">
			<div class="col-md-12">
				<h1>Edit a Quote</h1>
				<p>Enter a new quote below, use the text editor to format the text exactly as you would want others to 
				see it.</p>
				<hr>
			</div>
			
			<div class="col-md-12"> 

				<form action="/quotes/{{ $quote->id }}" method="POST">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				
				<div class="form-group">
							
					<div class="form-group">
						<label for="author">Author</label>
						<input type="text" id="quote-author" name="quote_author" value="{{ $quote->author }}" class="">
					</div>
					
					<div class="form-group">
						<label for="quote_text">Quote Text</label>
						<textarea name="quote_text" id="quote_text" cols="30" rows="10">{{ $quote->quote }}</textarea>
					</div>	
					
					<div class="form-group">
						<label for="Published" class="">Published?</label>
						<input type="checkbox" id="published" name="published" checked="checked">								
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