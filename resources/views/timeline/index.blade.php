<x-layout>

   <!-- Page header -->

      <div class="mb-5 w-1/2 mx-auto">
         <h2 class="text-xl font-bold text-center">Timeline</h2>
         <p class="text-center text-gray-500 text-sm">Use the timeline to search for events related to the Holocaust.  Each page has 50 events starting from
            the earliest event through to the last.  You can select a specific year or search for a specific event.  The results will always be in chronological order.</p>
      </div>

   <!-- Page Content -->
      @can('Admin')
         <div class="text-center mb-5">
            <a class="border rounded-md py-1 px-2 bg-green-500 text-white text-sm font-bold" href="/timeline/create" role="button">Create new event</a>
         </div>
      @endcan

      <form method="get" action="/timeline" class="mt-10 my-5">
         <div class="w-1/2 mx-auto">
            <input type="text" class="border border-gray-300 rounded-md w-full text-sm" id="search" name="search" placeholder="Enter search term and press return">
         </div>
		</form>

      <div class="mb-10 w-4/5 mx-auto">
         <ul class="flex justify-center gap-5">
         <li class="border rounded-md p-1 text-xs bg-red-100 hover:bg-red-200 font-bold" role="button"><a href="/timeline?year=earlier">Earlier</a></li>
         @foreach ($uniqueYears as $year)
            @if ($year > 1932 and $year < 1946)
               <li class="border rounded-md p-1 text-xs bg-red-50 hover:bg-red-100" role="button"><a href="/timeline?year={{$year}}">{{$year}}</a></li>
            @endif
         @endforeach 
         <li class="border rounded-md p-1 text-xs bg-red-100 hover:bg-red-200 font-bold" role="button"><a href="/timeline?year=later">Later</a></li>
         </ul>
      </div>
                
      <div class="flex flex-col w-4/5 mx-auto space-y-10">
         @foreach ($events->chunk(2) as $two_events )
            @foreach($two_events as $event)
               @if($loop->odd)
                  <div class="flex space-x-10  justify-start">
                     <div class="w-3/4 flex items-center space-x-5 border rounded-md">
                        <div class="border-r p-4 text-center text-red-500">
                           <span class="text-sm font-bold">{{ date('d M', strtotime($event->event_date)) }}</span>
                           <span class="font-bold">{{ date('Y', strtotime($event->event_date)) }}</span>
                        </div>
                        <div class="p-4 space-y-4">
                           <h2 class="font-bold">{{ $event->title }}</h2>
                           <p class="text-sm">{{ $event->description }}</p>
                        </div>
                     </div>
                  </div>
               @elseif($loop->even)
                  <div class="flex space-x-10 justify-end">
                     <div class="w-3/4 flex items-center space-x-5 border rounded-md">
                     <div class="p-4 space-y-4">
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
