<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <!-- Search Bar -->
    <div class="mb-4 p-4">
        <form class="flex items-center gap-4" action="{{ url('/search') }}" method="GET">
            <input 
                name="term" 
                type="text" 
                placeholder="Search users..." 
                class="w-full pl-4 pr-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600"
            />
            <button 
                type="submit" 
                class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring"
            >
                Search
            </button>
        </form>
    </div>


    <!-- User List -->
    <ul class="space-y-6 px-4">
        @foreach($listusers as $user)
        <li class="flex items-center justify-between bg-white dark:bg-gray-800 p-4 rounded-lg shadow">
            <div class="flex items-center gap-4">
                <!-- Profile Image -->
                <div class="p-2">
                    <img 
                        class="w-24 h-24 rounded-full object-cover" 
                        src="{{ asset('storage/' . $user->profile_photo) }}" 
                        alt="{{ $user->fullname }}'s Profile Photo"
                    >
                </div>

                <!-- User Info -->
                <div>
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $user->fullname }}</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">@ {{ $user->username }}</p>
                    <a 
                        class="text-sm text-blue-500 hover:underline" 
                        href="users/{{$user->id}}"
                    >
                        View details
                    </a>
                </div>
            </div>

            @if(auth()->user()->isFriendWith($user->id))
                <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full">
                    Friend
                </span>
            @else
                <form method="POST" action="/friends/send/{{$user->id}}">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                        Add Friend
                    </button>
                </form>
            @endif
        </li>
        @endforeach
    </ul>
</x-app-layout>
