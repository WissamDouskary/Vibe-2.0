<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Friends') }}
        </h2>
    </x-slot>

    <!-- User List -->
    <ul class="space-y-6 px-4 mt-6">
        @unless (count($friendslist) > 0)
        <li class="flex items-center justify-between bg-white dark:bg-gray-800 p-4 rounded-lg shadow text-white">
            There are no friends
        </li>
        @else
        @foreach($friendslist as $friend)
        <li class="flex items-center justify-between bg-white dark:bg-gray-800 p-4 rounded-lg shadow">
            <div class="flex items-center gap-4">
                <!-- Profile Image -->
                <div class="p-2">
                    <img 
                        class="w-24 h-24 rounded-full object-cover" 
                        src="{{ asset('storage/' . $friend->profile_photo) }}" 
                        alt="{{ $friend->fullname }}'s Profile Photo"
                    >
            </div>

                <!-- User Info -->
            <div>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $friend->fullname }}</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">@ {{ $friend->username }}</p>
                <a 
                    class="text-sm text-blue-500 hover:underline" 
                    href="{{ url('users/'.$friend->id) }}"
                >
                    View details
                </a>
            </div>
            </div>
        </li>
        @endforeach
        @endunless
    </ul>
</x-app-layout>
