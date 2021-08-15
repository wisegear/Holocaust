<div class="">
				@can('Admin')
					<div class="mb-6 text-center">
						<a class="border rounded-md bg-green-300 text-xs p-2 hover:bg-green-400" href="/blog/create" role="button">Create Post</a>
					</div>
				@endcan

				<form method="get" action="/blog">
					<div class="">
						<input type="text" class="border rounded-md w-full text-sm" id="search" name="search" placeholder="Search Blog Posts">
						<span class="input-group-btn btn-secondary">
							<button class="btn navy text-light" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
						</span>
					</div>
				</form>
			
			<div class="mb-5">
				<h2 class="text-xl font-semibold">Categories</h2>
				<hr class="mt-1 mb-2">
				<ul class="space-y-1">
					@foreach ($categories as $category)
					<li class=""><a href="/blog?category={{ $category->name }}">{{ $category->name }}</a></li>
					@endforeach
				</ul>
			</div>
			
			<div class="mb-5">
				<h2 class="text-xl font-semibold">Featured Posts</h2>
				<hr class="mt-1 mb-2">
					@foreach($featured as $feature)
						<div class="mb-3">
							<p class="mb-1"><a href="/blog/{{ $feature->slug }}">{!! $feature->title !!}</a></p>
<!-- 							<ul class="list-inline mb-1 reduced-font-size">
								<li class="list-inline-item"><i class="fa fa-user pr-1" aria-hidden="true"> </i> <a href="/profile/{{ $feature->users->name }}">{{ $feature->users->name }}</a></li>
								<li class="list-inline-item"><i class="fa fa-clock-o pr-1" aria-hidden="true"> </i> {{ $feature->created_at->diffForHumans() }}</li>
							</ul> -->
							<span class="">{!! Str::limit($feature->text, 75) !!}</span>
						</div>
					@endforeach
			</div>
			
			<div class="mb-5">
				<h2 class="text-xl font-semibold">Popular Tags</h2>
				<hr class="mt-1 mb-4">	
				<div class="">
					@foreach($popular_tags as $popular_tag)
						<a class="border rounded-md text-xs py-1 px-2 inline-block mb-3 hover:bg-blue-50" href="/blog?tag={{ $popular_tag->name }}" role="button">{{ $popular_tag->name }}</a>
					@endforeach
				</div>	
			</div>

			@can('Admin')
				<div class="mt-4">
					<h2 class="font-weight-bold medium-heading text-red-500"><i class="fa fa-user-secret" aria-hidden="true"> </i> Unpublished Posts</h2>
					<hr class="mt-0 mb-2">
					<ul class="list-unstyled reduced-font-size">
						@foreach($unpublished as $post)
							<li style="margin-bottom: 5px;"><a href="/blog/{{ $post->id }}/edit"> {{ $post->title }}</a></li>
						@endforeach
					</ul>
				</div>
			@endcan

</div>