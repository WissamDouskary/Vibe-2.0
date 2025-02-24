<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Friends Requests') }}
        </h2>
    </x-slot>

    <!-- User List -->
    <ul class="space-y-6 px-4 mt-6">
        @foreach($receivedRequests as $request)
        <li class="flex items-center justify-between bg-white dark:bg-gray-800 p-4 rounded-lg shadow">
            <div class="flex items-center gap-4">
                <!-- Profile Image -->
                <div class="p-2">
                    <img 
                        class="w-24 h-24 rounded-full object-cover" 
                        src="{{ asset('storage/' . $request->profile_photo) }}" 
                        alt="{{ $request->sender_name }}'s Profile Photo"
                    >
                </div>

                <!-- User Info -->
                <div>
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $request->sender_name }}</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">@ {{ $request->username }}</p>
                    <a 
                        class="text-sm text-blue-500 hover:underline" 
                        href="{{ url('users/'.$request->sender_id) }}"
                    >
                        View details
                    </a>
                </div>
            </div>
            <div class="flex gap-6">
                <!-- Accept Button -->
                <form method="POST" action="{{ url('/friends/accept/'.$request->id) }}">
                    @csrf
                    <button 
                        type="submit" 
                        class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:outline-none focus:ring"
                    >
                        Accept
                    </button>
                </form>

                <!-- Refuse Button -->
                <form method="POST" action="{{ url('/friends/refuse/'.$request->id) }}">
                    @csrf
                    <button 
                        type="submit" 
                        class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none focus:ring"
                    >
                        Refuse
                    </button>
                </form>
            </div>
        </li>
        @endforeach
    </ul>
</x-app-layout>
