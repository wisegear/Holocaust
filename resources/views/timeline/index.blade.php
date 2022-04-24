<x-layout>

   <!-- Page header -->

      <div class="mb-5 w-1/2 mx-auto">
         <h2 class="text-xl font-bold pb-2 text-center">Timeline</h2>
         <p class="text-center text-gray-500 text-sm">Use the timeline to search for events related to the Holocaust.  Each page has 50 events starting from
            the earliest event through to the last.  You can select a specific year or search for a specific event.  The results will always be in chronological order.</p>
      </div>

   <!-- Page Content -->
      @can('Admin')
         <div class="text-center mb-5">
            <a class="border rounded-md py-2 px-2 hover:bg-green-50 hover:border-green-500 text-sm" href="/timeline/create" role="button">Create new event</a>
         </div>
      @endcan

      <form method="get" action="/timeline" class="mt-10 my-5">
         <div class="w-1/2 mx-auto">
            <input type="text" class="border border-gray-300 rounded-md w-full text-sm" id="search" name="search" placeholder="Enter search term and press return">
         </div>
		</form>

      <div class="mb-10 w-4/5 mx-auto">
         <ul class="flex justify-center gap-5">
         <li class="border rounded-md p-1 text-xs bg-gray-50 hover:border-gray-500" role="button"><a href="/timeline?year=earlier">Earlier</a></li>
         @foreach ($uniqueYears as $year)
            @if ($year > 1932 and $year < 1946)
               <li class="border rounded-md p-1 text-xs bg-gray-50 hover:border-gray-500" role="button"><a href="/timeline?year={{$year}}">{{$year}}</a></li>
            @endif
         @endforeach 
         <li class="border rounded-md p-1 text-xs bg-gray-50 hover:border-gray-500" role="button"><a href="/timeline?year=later">Later</a></li>
         </ul>
      </div>

      <!-- Timeline display -->

      <div class="timeline">

         @foreach ($events->chunk(2) as $two_events)

            <!-- Left side of the timeline -->
            @foreach($two_events as $event)
               @if($loop->odd)
               <div class="timeline-container timeline-left">
                  <div class="timeline-content">
                     <h3 class="text-lg font-bold text-right text-gray-600 mb-4">{{ date('d M Y', strtotime($event->event_date)) }}</h3> 
                     <h2 class="text-lg font-bold mt-2 pb-2 text-gray-400 text-center">{{ $event->title }}</h2>
                     <div class="text-sm text-gray-600 text-center">{!! $event->description !!}</div>
                     <!-- Admin edit & delete options -->
                     <div class="flex space-x-2 justify-end">
                        @can ('Admin')
                           <form action="/timeline/{{ $event->id }}" method="POST" onsubmit="return confirm('Do you really want to delete this Event?');">
                           {{ csrf_field() }}
                           {{ method_field ('DELETE') }} 
                           <input class="border rounded-md text-xs p-1 bg-red-50 hover:bg-red-500" role="button" type="submit" value="D">
                           </form>
                           <a class="border rounded-md p-1 text-xs font-semibold bg-yellow-50 hover:bg-yellow-500" href="/timeline/{{ $event->id }}/edit" role="button">E</a>
                        @endcan                    
                     </div>
                  </div>
               </div>

               <!-- Right side of the timeline -->
               @elseif($loop->even)
               <div class="timeline-container timeline-right">  
                  <div class="timeline-content">
                     <h3 class="text-lg font-bold text-gray-600 mb-4">{{ date('d M Y', strtotime($event->event_date)) }}</h3> 
                     <h2 class="text-xl font-bold mt-2 pb-2 text-gray-400 text-center">{{ $event->title }}</h2>
                     <div class="text-sm text-gray-600 text-center">{!! $event->description !!}</div>
                     <!-- Admin edit & delete options -->
                     <div class="flex space-x-2 justify-end">
                        @can ('Admin')
                           <form action="/timeline/{{ $event->id }}" method="POST" onsubmit="return confirm('Do you really want to delete this Event?');">
                           {{ csrf_field() }}
                           {{ method_field ('DELETE') }} 
                           <input class="border rounded-md text-xs p-1 bg-red-50 hover:bg-red-500" role="button" type="submit" value="D">
                           </form>
                           <a class="border rounded-md p-1 text-xs font-semibold bg-yellow-50 hover:bg-yellow-500" href="/timeline/{{ $event->id }}/edit" role="button">E</a>
                        @endcan                    
                     </div>
                  </div>
               </div>

               @endif

            @endforeach

         @endforeach 

      </div>

      <!-- / Timeline display -->

      <!-- Event pagination -->
      <div class="w-1/2 mx-auto mt-10">
         {{ $events->links() }}
      </div>

</x-layout>
