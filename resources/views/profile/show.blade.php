<x-layout>

<div class="w-3/4 mx-auto">
	<div class="text-center mb-4">
		<p class="font-semibold">You are viewing the user profile for {{ $user->name }}</p>
	</div>
	<div class="flex justify-evenly items-center my-10">
		<div class="">
			<img src="{{ asset("images/avatars/$user->avatar") }}" class="rounded-md shadow-md">
		</div>
		<div class="">
			<ul class="text-sm space-y-1">
				@if (!empty($user->website))
				<li class=""><a href="{{ $user->website }}">{{ $user->website }}</a></li>
				@endif

				@if (!empty($user->location))
				<li class="">{{ $user->location }}</li>
				@endif

				@if ($user->email_visible)
				<li class="">{{ $user->email }}</li>
				@endif

				<div class="flex space-x-4 text-sm">
					@if (!empty($user->twitter))
					<li class=""><a href="{{ $user->twitter }}"></a>Twitter</li>
					@endif

					@if (!empty($user->facebook))
					<li class=""><a href="{{ $user->facebook }}">Facebook</a></li>
					@endif

					@if (!empty($user->linkedin))
					<li class=""><a href="{{ $user->linkedin }}">LinkedIn</a></li>
					@endif
				</div>
			</ul>
		</div>
	</div>
	<div class="">
	@if (empty($user->bio))
				<p class="border p-2">User has not provided any information about themselves.</p>
			@else
				<p class="border rounded-md p-2 text-gray-700 text-sm">{{ $user->bio }}</p>
			@endif
	</div>

		@if (Auth::user()->name === $user->name || Auth::user()->has_user_role('Admin'))
			<div class="my-4 text-center">
				<a class="border rounded-md py-1 px-2 text-sm bg-green-500" href="/profile/{{ $user->name }}/edit" role="button">Edit Profile</a>
			</div>
		@endif
</div>

</x-layout>