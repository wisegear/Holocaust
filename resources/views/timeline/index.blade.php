<x-layout>

   <!-- Page header -->

      <div class="mb-5">
         <h2 class="text-xl font-bold text-center">Timeline</h2>
         <p class="text-center text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, perspiciatis.</p>
      </div>

   <!-- Page Content -->
      @can('Admin')
         <div class="text-center mb-5">
            <a class="border rounded-md py-1 px-2 bg-green-500 text-white text-sm font-bold" href="/timeline/create" role="button">Create new event</a>
         </div>
      @endcan

      <div class="my-10">
         <ul class="flex justify-center gap-5">
            <li class="border rounded-md p-1 text-sm bg-gray-100"><a href="#">1933</a></li>
            <li class="border rounded-md p-1 text-sm bg-gray-100"><a href="#">1934</a></li>
            <li class="border rounded-md p-1 text-sm bg-gray-100"><a href="#">1935</a></li>
            <li class="border rounded-md p-1 text-sm bg-gray-100"><a href="#">1936</a></li>
            <li class="border rounded-md p-1 text-sm bg-gray-100"><a href="#">1937</a></li>
            <li class="border rounded-md p-1 text-sm bg-gray-100"><a href="#">1938</a></li>
            <li class="border rounded-md p-1 text-sm bg-gray-100"><a href="#">1939</a></li>
            <li class="border rounded-md p-1 text-sm bg-gray-100"><a href="#">1940</a></li>
            <li class="border rounded-md p-1 text-sm bg-gray-100"><a href="#">1941</a></li>
            <li class="border rounded-md p-1 text-sm bg-gray-100"><a href="#">1942</a></li>
            <li class="border rounded-md p-1 text-sm bg-gray-100"><a href="#">1943</a></li>
            <li class="border rounded-md p-1 text-sm bg-gray-100"><a href="#">1944</a></li>
            <li class="border rounded-md p-1 text-sm bg-gray-100"><a href="#">1945</a></li> 
            <li class="border rounded-md p-1 text-sm bg-gray-100"><a href="#">Beyond</a></li> 
         </ul>
      </div>
                
      <div class="flex flex-col w-4/5 mx-auto space-y-10">
         @foreach ($events->chunk(2) as $two_events )
            @foreach($two_events as $event)
               @if($loop->odd)
                  <div class="flex space-x-10">
                     <div class="w-1/2 flex items-center space-x-5 border rounded-md">
                        <div class="border-r p-4 text-center text-red-500">
                           <span class="text-sm font-bold">{{ date('d M', strtotime($event->event_date)) }}</span>
                           <span class="font-bold">{{ date('Y', strtotime($event->event_date)) }}</span>
                        </div>
                        <div class="p-4 space-y-4">
                           <h2 class="font-bold">{{ $event->title }}</h2>
                           <p class="text-sm">{{ $event->description }}</p>
                        </div>
                     </div>
                     <div class="w-1/2">
                        <!-- Intentionally blank -->
                     </div>
                  </div>
               @elseif($loop->even)
                  <div class="flex space-x-10">
                     <div class="w-1/2">
                        <!-- Intentionally blank -->
                     </div>
                     <div class="w-1/2 flex items-center space-x-5 border rounded-md">
                     <div class="p-4">
                           <h2 class="font-bold">{{ $event->title }}</h2>
                           <p class="text-sm">{{ $event->description }}</p>
                        </div>
                        <div class="border-l p-4 text-center text-red-500">
                           <span class="text-sm font-bold">{{ date('d M', strtotime($event->event_date)) }}</span>
                           <span class="font-bold">{{ date('Y', strtotime($event->event_date)) }}</span>
                        </div>

                     </div>
                  </div>     
               @endif
            @endforeach
         @endforeach 
      </div>

</x-layout>

<!--
            <div class="flex my-10">
            @foreach ($events as $event)
               <div class="flex">
                  <h3 class="text-indigo-500">{{ $event->title }}</h3>
                     <p>@if (Auth::user() && Auth::user()->has_user_role('Admin'))
                        <form action="/timeline/{{ $event->id }}" METHOD="POST" onsubmit="return confirm('Really delete?');">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                           <input class="" role="button" type="submit" value="delete">
                           <a class="btn btn-outlined btn-warning btn-xs" href="/timeline/{!! $event->id !!}/edit" role="button">-Edit-</a>
                        </form>
                     @endif</p>
               </div>
               <div class="">
                  <p>{{ $event->event_date }}</p>
                  <p>{{ $event->description }}</p>
               </div>
            @endforeach
            </div>
-->