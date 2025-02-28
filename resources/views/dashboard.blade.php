<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
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

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <!-- Create Post Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center space-x-3">
                        <img src="{{asset('storage/' . Auth::user()->profile_photo)}}" 
                            alt="John Doe" 
                            class="h-10 w-10 rounded-full">
                        <a class="bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-full py-2 px-4 w-full text-left" href="/Post/Create"><button>
                            What's on your mind, {{Auth::user()->fullname}}?
                        </button></a>
                    </div>
                </div>
            </div>

            <!-- Static Post 1 -->
            @foreach ($posts as $post)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-4">
                    <!-- Post Header with User Info -->
                    
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex items-center space-x-3">
                            <img src="{{asset('storage/'. $post->user->profile_photo )}}" 
                                alt="" 
                                class="h-10 w-10 rounded-full">
                            <div>
                                <a href="/users/{{$post->user->id}}"><h3 class="font-semibold text-gray-900 dark:text-white">{{$post->user->fullname}}</h3></a>
                                <p class="text-xs text-gray-500 dark:text-gray-400">{{$post->created_at->diffForHumans()}}</p> 
                            </div>
                        </div>
                        <div class="relative">
                            <button class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Post Content -->
                    <div class="mt-4 text-gray-900 dark:text-gray-100">
                        <p class="whitespace-pre-line">{{$post->post_title}}</p>
                        <div class="mt-3">
                            <img src="{{ $post->post_photo ? asset('storage/' . $post->post_photo) : null}}" alt="" class="rounded-lg w-full">
                        </div>
                    </div>

                    <!-- Post Stats -->
                    <div class="mt-4 flex justify-between text-sm text-gray-500 dark:text-gray-400 border-b border-gray-200 dark:border-gray-700 pb-4">
                        <div class="flex items-center">
                            <div class=" text-white rounded-full p-1 mr-1">
                                ❤️
                            </div>
                            <span>{{ $post->likes->count() }} likes</span>
                        </div>
                        <div>
                            <span>{{ $post->comments->count() }} comments</span>
                        </div>
                    </div>

                    <!-- Post Actions -->
                    <div class="flex justify-between pt-3">
                        
                        <form class="flex items-center justify-center px-4 py-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 w-1/2" action="{{ route('post.like', $post->id) }}" method="POST">
                            @csrf
                            <button type="submit">
                                @if($post->UserAlreadyLiked())
                                    ❤️ Unlike
                                @else
                                    🤍 Like
                                @endif
                            </button>
                        </form>
                        <button class="toggle-comments flex items-center justify-center px-4 py-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 w-1/2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-gray-500 dark:text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700 dark:text-gray-300">Comments</span>
                        </button>
                    </div>

                    <!-- Comments Section -->
                    <div class="comments-section hidden mt-4">
                        <h4 class="text-gray-700 dark:text-gray-300 font-semibold">Comments</h4>
                        <div class="mt-2 space-y-3">
                            @foreach ($post->comments as $comment)
                            <div class="p-3 bg-gray-100 dark:bg-gray-700 rounded-md">
                                <p class="text-gray-900 dark:text-gray-100"><strong>{{ $comment->user->fullname }}</strong>: {{ $comment->content }}</p>
                            </div>
                            @endforeach
                        </div>

                        <form action="{{ route('comments.store', $post) }}" method="POST" class="mt-4">
                            @csrf
                            <textarea name="content" class="block mt-2 w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md focus:border-blue-500 dark:focus:border-blue-500 focus:ring focus:ring-blue-200 dark:focus:ring-blue-800 focus:ring-opacity-50 transition" rows="2" placeholder="Write a comment..."></textarea>
                            <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-full">Post</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script>
            document.querySelectorAll(".toggle-comments").forEach(button => {
                button.addEventListener("click", function () {
                    let commentsSection = this.closest(".p-4").querySelector(".comments-section");
                    commentsSection.classList.toggle("hidden");
                });
            });
    </script>
</x-app-layout>