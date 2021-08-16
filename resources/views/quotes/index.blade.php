<x-layout>

<div class="flex gap-10">
  
  <div class="w-9/12 grid grid-cols-3 gap-10">
    @foreach ($quotes as $quote)
      <div class="border rounded-md p-2 text-sm bg-gray-50">
        <p class="">{{ $quote->quote }}</p>
        <p class="font-bold mt-2">-- {{ $quote->author }}</p>
      </div>
    @endforeach
  </div>

  <div class="w-3/12">
    <h2 class="text-xl font-semibold text-gray-500">Sidebar</h2>
    @can('Admin')
      <a href="/quotes/create" role="button" class="border rounded-md p-1 bg-green-500">Create Quote</a>
    @endcan
  </div>
</div>

<div class="w-1/2 my-10">
      {{ $quotes->links() }}
</div>

</x-layout>