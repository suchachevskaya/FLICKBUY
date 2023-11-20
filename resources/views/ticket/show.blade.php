<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100
dark:bg-gray-900">
        <h1 class="text-white text-lg font-bold">{{ $ticket->title }}</h1>
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-nd overflow-hidden
sm: rounded-1g">
            <div class="text-white flex justify-between py-4">
                <p>{{ $ticket->description }}</p>
                <p>{{ $ticket->created_at->diffForHumans() }}</p> I
                @if ($ticket->attachment)
                    <a href="{{ '/storage/'. $ticket->attachment }}" target=" _blank">Attachment</a>
                @endif
            </div>
            <div class="flex justify-between">
                <div class="flex">
                    <a href="{{route('ticket.edit',$ticket->id)}}">
                        <x-primary-button>Edit</x-primary-button>
                    </a>
                    <form class="ml-2" action="{{route('ticket.destroy',$ticket->id)}}" method="post">
                        @method('delete')
                        @csrf
                        <x-primary-button>Delete</x-primary-button>
                    </form>
                </div>
                <div class="flex">
                    <x-primary-button class="mr-2">Approve</x-primary-button>
                    <x-primary-button>Reject</x-primary-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
