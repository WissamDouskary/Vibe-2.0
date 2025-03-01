<x-guest-layout>
    <div class="mb-8 text-center">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Welcome back</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">Sign in to your Vibe account</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-6" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-6">
                    <x-input-label for="email" :value="__('Email')" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2" />
                    <x-text-input id="email" class="block w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Your email address" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-2">
                        <x-input-label for="password" :value="__('Password')" class="block font-medium text-sm text-gray-700 dark:text-gray-300" />
                        @if (Route::has('password.request'))
                            <a class="text-xs text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
                    <x-text-input id="password" class="block w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white" type="password" name="password" required autocomplete="current-password" placeholder="Your password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
                </div>

                <!-- Remember Me -->
                <div class="mb-6">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col space-y-4 mt-8">
                    <x-primary-button class="w-full justify-center py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition duration-150 ease-in-out">
                        {{ __('Log in') }}
                    </x-primary-button>
                    
                    <div class="text-center">
                        <a href="{{ route('register') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                            {{ __("Don't have an account?") }} <span class="text-indigo-600 dark:text-indigo-400 font-medium">{{ __('Sign up') }}</span>
                        </a>
                    </div>
                </div>
            </form>
</x-guest-layout>