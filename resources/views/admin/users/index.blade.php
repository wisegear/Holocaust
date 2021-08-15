<x-admin>

<div class="mb-10 mx-auto">
	<h1 class="text-xl font-bold text-center">User Administration</h1>
	<p class="text-gray-500 text-center text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime corporis esse dolor sunt qui necessitatibus cupiditate temporibus vitae dolores id molestiae architecto quia, nulla laborum itaque beatae minima quo numquam iste laboriosam veniam eum consectetur veritatis. Porro est eveniet in.</p>
</div>

	<div class="text-sm text-center">		
		<table class="table-fixed">
		  <thead class="border">
		    <tr class="bg-gray-100">
		      <th class="border p-2 w-2/12">Name 
		      		<a href="/admin/users?field=name&order=asc">&#8593</a>
		      		<a href="/admin/users?field=name&order=desc">&#8595</a>
		      </th>

		      <th class="border p-2 w-1/12">Membership</th>
		      
		      <th class="border p-2 w-2/12">Email
		      		<a href="/admin/users?field=email&order=asc">&#8593</a>
		      		<a href="/admin/users?field=email&order=desc">&#8595</a>
		      </th>
		      <th class="border p-2 w-1/12">Created
		      		<a href="/admin/users?field=created_at&order=asc">&#8593</a>
		      		<a href="/admin/users?field=created_at&order=desc">&#8595</a>
		      </th>
		      <th class="border p-2 w-1/12">Trusted?
		      		<a href="/admin/users?field=trusted&order=asc">&#8593</a>
		      		<a href="/admin/users?field=trusted&order=desc">&#8595</a>
		      </th>
		      <th class="border p-2">Notes
		      		<a href="/admin/users?field=notes&order=asc">&#8593</a>
		      		<a href="/admin/users?field=notes&order=desc">&#8595</a>
		      </th>
		      <th class="border p-2">Edit</th>
		      <th class="border p-2">Delete</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach ($users as $user)
		    <tr>

		      <td class="border text-indigo-500"><a href="/profile/{{ $user->name }}">{{ $user->name}}</a></td>
		      <td class="border">
		      	@foreach ( $user->user_roles as $role)
		      		{{ $role->name }} </br>
		      	@endforeach
		      </td>
		      <td class="border">{{ $user->email }}</td>
		      <td class="border">{{ $user->created_at->DiffForHumans() }}</td>
		      <td class="border">{{ $user->trusted  ? 'Yes' : 'No' }}</td>
		      <td class="border">{{ $user->notes }}</td>
		      <td class="border"><a class="border rounded-md text-xs bg-yellow-500 p-1 inline-block my-1" href="/profile/{{ $user->name }}/edit" role="button">Edit</a></td>

		      <form action="/admin/users/{{ $user->id}}" method="post" onsubmit="return confirm('Do you really want to delete this user? ');">
		      	@csrf
		      	@method('DELETE')
					@if ( $user->lock === 1)
						<td class="border"><button class="border rounded-md text-xs bg-red-300 p-1 inline-block my-1 text-white font-bold" type="submit" disabled>Lock</button></td>
					@else
		      			<td class="border"><button class="border rounded-md text-xs bg-red-500 p-1 inline-block my-1 text-white font-bold" type="submit">Del</button></td>
					@endif
		      </form>

		    </tr>
		    @endforeach
		  </tbody>
		</table>
		<div class="my-5 w-1/2 mx-auto">{{ $users->appends(Request::except('page'))->links() }}</div>			

	</div>

</x-admin>