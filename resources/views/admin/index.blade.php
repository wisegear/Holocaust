<x-admin>

<div class="w-1/2 mx-auto text-center mb-10">
	<h1 class="text-2xl font-bold">Dashboard</h1>
	<p class="text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci tempora laborum explicabo enim iusto, earum tempore voluptatum natus sapiente rem voluptas? Culpa, nulla. Deserunt vel a obcaecati illum qui voluptas!</p>
</div>

<div class="flex justify-evenly">

	<div class="border rounded-md p-3 w-2/12 bg-gray-50">
		<div class="">
			<h2 class="text-xl font-bold text-center">Users</h2>
			<h2 class="text-indigo-500 text-center">{{ $users->count() }}</h2>
		</div>
		<div class="mt-5 text-center text-sm text-gray-500">
			<p class="">Pending: <span class="">{{ $users_pending }}</span></p>
			<p class="">Members: <span class="">{{ $users_active }}</span></p>
			<p class="">Banned: <span class="">{{ $users_banned }}</span></p>
		</div>
	</div>

	<div class="border rounded-md p-3 w-2/12 bg-gray-50">
		<div class="">
			<h2 class="text-xl font-bold text-center">Blog Posts</h2>
			<h2 class="text-indigo-500 text-center">{{ $blogposts->count() }}</h2>
		</div>
		<div class="mt-5 text-center text-sm text-gray-500">
			<p class="">Not published: <span class=""></span>{{ $blogunpublished->count() }}</p>
		</div>
	</div>

	<div class="border rounded-md p-3 w-2/12 bg-gray-50">
		<div class="">
			<h2 class="text-xl font-bold text-center">Support</h2>
			<h2 class="text-indigo-500 text-center">{{ $tickets->count() }}</h2>
		</div>
		<div class="mt-5 text-center text-sm text-gray-500">
			<p class="">In Progress:  <span class="">{{ $in_progress_tickets }}</span></p>
			<p class="">Awaiting Reply:  <span class="">{{ $awaiting_reply }}</span></p>
			<p class="">Open:  <span class="">{{ $open_tickets }}</span></p>
		</div>
	</div>

	<div class="border rounded-md p-3 w-2/12 bg-gray-50">
		<div class="">
			<h2 class="text-xl font-bold text-center">Quotes</h2>
			<h2 class="text-indigo-500 text-center">{{ $quote_count->count() }}</h2>
		</div>
		<div class="mt-5 text-center text-sm text-gray-500">
			<p class="">Not Published:  <span class="">{{ $quotes_hidden->count() }}</span></p>
		</div>
	</div>

</div>

</x-admin>