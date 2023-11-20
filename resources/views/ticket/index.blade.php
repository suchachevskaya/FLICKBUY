<x-app-layout>
    <div class="min-h-screen flex flex-col sm: justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
       <div class="flex justify-between w-full sm:max-w-xl text-white">
        <h1 class="text-lg font-bold">Support ticket</h1>
           <div>
               <a href="{{route('ticket.create')}}"> Create New</a>
           </div>
       </div>
        <div
            class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-1g">
            @forelse($tickets as $ticket)
                <div class="text-white flex justify-between py-4">
                    <a href="{{route('ticket.show', $ticket->id)}}">
                        {{$ticket->title}}
                    </a>
                    <p>
                        {{$ticket->created_at->diffForHumans()}}
                    </p>
                </div>
            @empty
                <p class="text-white"> You dont't have any support ticket yet.</p>

            @endforelse
        </div>
    </div>
</x-app-layout>
