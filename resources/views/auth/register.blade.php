<x-guest-layout class="px-5">
    <div class="mb-8 text-center">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Join Vibe</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">Create your account and start connecting</p>
            </div>
            
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <!-- Fullname -->
                <div class="mb-6">
                    <x-input-label for="fullname" :value="__('Full Name')" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2" />
                    <x-text-input id="fullname" class="block w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white" type="text" name="fullname" :value="old('fullname')" required autofocus autocomplete="name" placeholder="Your full name" />
                    <x-input-error :messages="$errors->get('fullname')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
                </div>

                <!-- Username -->
                <div class="mb-6">
                    <x-input-label for="username" :value="__('Username')" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2" />
                    <x-text-input id="username" class="block w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white" type="text" name="username" :value="old('username')" required autocomplete="name" placeholder="Choose a unique username" />
                    <x-input-error :messages="$errors->get('username')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
                </div>

                <!-- Profile Photo -->
                <div class="mb-6">
                    <x-input-label for="profile_photo" :value="__('Profile Photo')" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2" />
                    <div class="relative border-2 border-dashed border-gray-300 dark:border-gray-700 rounded-lg p-6 text-center hover:bg-gray-50 dark:hover:bg-gray-800 transition-all duration-200">
                        <input id="profile_photo" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" type="file" name="profile_photo" required />
                        <div class="flex flex-col items-center justify-center space-y-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="text-sm text-gray-600 dark:text-gray-400">Upload your photo</span>
                            <span class="text-xs text-gray-500 dark:text-gray-500">JPG, PNG or GIF (Max 10MB)</span>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('profile_photo')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
                </div>

                <!-- Bio -->
                <div class="mb-6">
                    <x-input-label for="bio" :value="__('Bio')" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2" />
                    <textarea id="bio" name="bio" rows="4" class="block w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white" placeholder="Tell us a bit about yourself">{{ old('bio') }}</textarea>
                    <x-input-error :messages="$errors->get('bio')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
                </div>

                <!-- Email Address -->
                <div class="mb-6">
                    <x-input-label for="email" :value="__('Email')" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2" />
                    <x-text-input id="email" class="block w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Your email address" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <x-input-label for="password" :value="__('Password')" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2" />
                    <x-text-input id="password" class="block w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white" type="password" name="password" required autocomplete="new-password" placeholder="Create a secure password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2" />
                    <x-text-input id="password_confirmation" class="block w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat your password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-between mt-8">
                    <a class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 underline rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition duration-150 ease-in-out">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
</x-guest-layout>