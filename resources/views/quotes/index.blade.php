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
    @can('Admin')
      <div class="text-center">
        <a href="/quotes/create" role="button" class="border rounded-md p-1 bg-green-300 text-xs">Create Quote</a>
      </div>
    @endcan
    <div class="flex flex-col mb-5">
      <h2 class="text-lg font-bold">Popular Authors</h2>
      @foreach ($unique as $item)
        <a href="#" class="py-1 hover:text-red-500">{{$item}}</a>
        @endforeach
    </div>
  </div>
</div>

<div class="w-1/2 my-10">
      {{ $quotes->links() }}
</div>

</x-layout>