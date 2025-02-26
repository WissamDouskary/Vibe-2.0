<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    @if(session('success'))
    <div id="success-message" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-md shadow-md relative">
        <div class="flex items-center">
            <svg class="h-6 w-6 text-green-500 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v4a1 1 0 002 0V7zM9 12a1 1 0 012 0v1a1 1 0 01-2 0v-1z" clip-rule="evenodd" />
            </svg>
            <p class="font-semibold">{{ session('success') }}</p>
        </div>
        <!-- Close Button -->
        <button id="close-button" class="absolute top-2 right-2 text-green-700 hover:text-green-900">
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M6.293 4.293a1 1 0 011.414 0L10 6.586l2.293-2.293a1 1 0 111.414 1.414L11.414 8l2.293 2.293a1 1 0 01-1.414 1.414L10 9.414l-2.293 2.293a1 1 0 01-1.414-1.414L8.586 8 6.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    <script>
        setTimeout(function() {
            document.getElementById('success-message').style.display = 'none';
        }, 3000);

        document.getElementById('close-button').addEventListener('click', function() {
            document.getElementById('success-message').style.display = 'none';
        });
    </script>
    @endif

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

            @if (auth()->user()->hasPendingRequestTo($user->id))
            <button disabled class="bg-gray-400 text-white px-4 py-2 rounded-full">Request Sent</button>
                @elseif (auth()->user()->isFriendWith($user->id))
            <button disabled class="bg-green-500 text-white px-4 py-2 rounded-full">Friends</button>
                @else
            <form method="POST" action="/friends/send/{{$user->id}}">
                @csrf
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Friend</button>
            </form>
                @endif
        </li>
        @endforeach
    </ul>
</x-app-layout>
