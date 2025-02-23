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
        </div>
    </main>
</x-app-layout>
