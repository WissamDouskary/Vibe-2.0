<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vibe - Profile View</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>

<x-app-layout>
    <main class="flex justify-center items-center min-h-screen bg-[#111826] text-white">
        <div class="max-w-4xl w-full px-6 py-10">
            <!-- Profile Header -->
            <div class="bg-[#1f2a37] rounded-2xl shadow-xl p-8 mb-8 hover:shadow-2xl transition-all duration-300">
                <div class="flex flex-col sm:flex-row items-center sm:items-start space-y-4 sm:space-y-0 sm:space-x-6">
                    <!-- Profile Picture -->
                    <div class="relative">
                        <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile picture" class="w-40 h-40 rounded-full object-cover border-4 border-[#1f2a37]">
                        <div class="absolute bottom-2 right-2 w-4 h-4 bg-green-400 rounded-full border-2 border-[#111826]"></div>
                    </div>

                    <!-- Profile Info -->
                    <div class="flex-1 text-center sm:text-left">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h1 class="text-3xl font-semibold text-white">{{$user->fullname}}</h1>
                                <p class="text-gray-400 text-lg">@ {{$user->username}}</p>
                            </div>
                        </div>
                        <p class="mt-4 text-gray-300 max-w-2xl">
                            {{ $user->bio ?? 'There is no bio yet.' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Profile Details -->
            <div class="bg-[#1f2a37] rounded-2xl shadow-xl p-8 hover:shadow-2xl transition-all duration-300">
                <h2 class="text-2xl font-semibold text-white mb-6">Profile Information</h2>

                <!-- Information Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Personal Information -->
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-sm font-medium text-gray-400">Full Name</h3>
                            <p class="mt-1 text-lg text-white">{{$user->fullname}}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-gray-400">Username</h3>
                            <p class="mt-1 text-lg text-white">@ {{$user->username}}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-gray-400">Email</h3>
                            <p class="mt-1 text-lg text-white">{{$user->email}}</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- show user posts --}}
            <div class="bg-[#1f2a37] rounded-2xl shadow-xl p-8 hover:shadow-2xl transition-all duration-300 mt-6">
                <h2 class="text-2xl font-semibold text-white mb-6">Posts</h2>
                @unless (count($posts) > 0)
                <p class="text-2xl font-semibold text-white mb-6">This user doesn't have any posts yet</p>
                @else
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
                                <h3 class="font-semibold text-gray-900 dark:text-white">{{$post->user->fullname}}</h3>
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
            @endunless
            </div>
        </div>
    </main>
    <script>
        document.querySelectorAll(".toggle-comments").forEach(button => {
            button.addEventListener("click", function () {
                let commentsSection = this.closest(".p-4").querySelector(".comments-section");
                commentsSection.classList.toggle("hidden");
            });
        });
</script>
</x-app-layout>
