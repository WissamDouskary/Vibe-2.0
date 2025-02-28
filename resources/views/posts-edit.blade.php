<x-app-layout>
    <div class="py-6 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="p-6 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100">
                Edit Post
            </h2>
            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mt-4">
                    <label for="post_title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" id="post_title" name="post_title" value="{{ $post->post_title }}" class="block mt-2 w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md focus:border-blue-500 dark:focus:border-blue-500 focus:ring focus:ring-blue-200 dark:focus:ring-blue-800 focus:ring-opacity-50 transition" >
                </div>

                <div class="mt-4">
                    <label for="post_photo" class="block text-sm font-medium text-gray-700">Post Image</label>
                    <input type="file" id="post_photo" name="post_photo" class="block mt-2 w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md focus:border-blue-500 dark:focus:border-blue-500 focus:ring focus:ring-blue-200 dark:focus:ring-blue-800 focus:ring-opacity-50 transition" >
                </div>

                <div class="mt-6">
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Update Post</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
