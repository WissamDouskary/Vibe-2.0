<x-guest-layout>
    <div class="max-w-lg mx-auto p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Create a New Post</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-1">Share your Post!</p>
        </div>

        <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Post Title -->
            <div>
                <x-input-label for="post_title" :value="__('Post Title')" class="text-gray-700 dark:text-gray-300 font-medium" />
                <x-text-input 
                    id="post_title" 
                    class="block mt-2 w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md focus:border-blue-500 dark:focus:border-blue-500 focus:ring focus:ring-blue-200 dark:focus:ring-blue-800 focus:ring-opacity-50 transition" 
                    type="text" 
                    name="post_title" 
                    placeholder="Enter a title for your post" 
                    required 
                    autofocus 
                />
                <x-input-error :messages="$errors->get('post_title')" class="mt-2 text-sm" />
            </div>

            <!-- Post photo -->
            <div class="mt-4">
                <x-input-label for="post_photo" :value="__('Post Image')" class="text-gray-700 dark:text-gray-300 font-medium" />
                <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-md hover:border-blue-400 dark:hover:border-blue-500 transition bg-gray-50 dark:bg-gray-700">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600 dark:text-gray-400">
                            <label for="post_photo" class="relative cursor-pointer bg-transparent rounded-md font-medium text-blue-600 dark:text-blue-400 hover:text-blue-500 dark:hover:text-blue-300">
                                <span>Upload a file </span>
                                <x-text-input id="post_photo" class="sr-only" type="file" name="post_photo" required />
                            </label>
                            <p class="pl-1"> or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, GIF up to 10MB</p>
                    </div>
                </div>
                <x-input-error :messages="$errors->get('post_photo')" class="mt-2 text-sm" />
            </div>

            <!-- Preview (optional) -->
            <div id="image-preview" class="hidden mt-4 p-4 border border-gray-200 dark:border-gray-700 rounded-md">
                <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Image Preview</p>
                <div class="aspect-w-16 aspect-h-9 bg-gray-100 dark:bg-gray-700 rounded">
                    <img id="preview-img" src="#" alt="Preview" class="object-cover rounded" />
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end mt-6">
                <x-primary-button class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-md transition">
                    {{ __('Create Post!') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('post_photo').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview-img').src = e.target.result;
                    document.getElementById('image-preview').classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-guest-layout>