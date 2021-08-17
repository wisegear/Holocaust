<x-layout>

<div class="flex gap-10">
  
  <!-- Loop through all quotes and paginate -->
  <div class="w-9/12">
    <div class="grid grid-cols-3 gap-10">
      @foreach ($quotes as $quote)
        <div class="border rounded-md p-2 text-sm bg-gray-50">
          <p class="">{{ $quote->quote }}</p>
          <p class="font-bold mt-2">-- {{ $quote->author }}</p>
        </div>
      @endforeach
    </div>
    <div class="mt-10 w-1/2 mx-auto">
      {{ $quotes->links() }}
    </div>
  </div>

  <!-- Sidebar area of the Quotes Index -->
  <div class="w-3/12">
    @can('Admin')
      <div class="text-center mb-4">
        <a href="/quotes/create" role="button" class="border rounded-md p-1 bg-green-300 text-xs">Create Quote</a>
      </div>
    @endcan
    <!-- Find quotes based on user search input -->
    <form method="get" action="/quotes" class="mb-5">
    <h2 class="text-lg font-bold mb-2">Search Quotes</h2>
      <div class="w-1/2 mx-auto w-full">
        <input type="text" class="border border-gray-300 rounded-md w-full text-sm" id="search" name="search" placeholder="Enter search term and press return">
      </div>
  </form>
    <div class="flex flex-col mb-5">
      <h2 class="text-lg font-bold">Popular Authors</h2>
      @foreach ($unique as $item)
        <a href="/quotes?author={{$item}}" class="py-1 hover:text-red-500 text-sm">{{$item}}</a>
        @endforeach
    </div>
  </div>
</div>

</x-layout>