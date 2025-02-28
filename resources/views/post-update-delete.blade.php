<x-app-layout>
    <div class="py-6 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="p-6 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <section>
                <header class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100">
                        {{ __('My Posts') }}
                    </h2>

                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Here you can update or delete your posts safely.') }}
                    </p>
                </header>

                <div class="mt-6">
                    @if(count($posts) > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($posts as $post)
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:shadow-md">
                                <!-- Post Image with overlay for title -->
                                <div class="relative">
                                    <img src="{{ asset('storage/' . $post->post_photo) }}" alt="{{ $post->post_title }}" class="w-full h-52 object-cover">
                                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-3">
                                        <h3 class="font-semibold text-white text-lg">{{ $post->post_title }}</h3>
                                    </div>
                                </div>

                                <div class="p-4">
                                    <p class="text-gray-600 dark:text-gray-300 text-sm line-clamp-3 mb-4 h-16">
                                        {{ Str::limit($post->content, 120) }}
                                    </p>

                                    <div class="flex justify-between items-center mt-4 pt-3 border-t border-gray-100 dark:border-gray-700">
                                        <!-- Created date -->
                                        <span class="text-xs text-gray-500 dark:text-gray-400">
                                            {{ $post->created_at->format('M d, Y') }}
                                        </span>
                                        
                                        <div class="space-x-2 flex">
                                            <!-- Edit Button -->
                                            <a href="{{ route('posts.edit', $post->id) }}" class="px-3 py-1.5 bg-indigo-600 text-white rounded-md text-xs font-medium hover:bg-indigo-700 transition-colors duration-200 inline-flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Edit
                                            </a>

                                            <!-- Delete Button -->
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1.5 bg-red-600 text-white rounded-md text-xs font-medium hover:bg-red-700 transition-colors duration-200 inline-flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            <p class="mt-2 text-gray-500 dark:text-gray-400">No posts found. Create your first post!</p>
                        </div>
                    @endif
                </div>
            </section>
        </div>
    </div>
</x-app-layout>