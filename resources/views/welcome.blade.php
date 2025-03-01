<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Vibe</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased bg-gradient-to-br from-gray-900 to-gray-800 min-h-screen">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen">
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <!-- Navigation -->
            <nav class="bg-gray-800 bg-opacity-50 backdrop-blur-sm border border-gray-700 rounded-xl p-4 mb-10">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <div class="text-3xl font-bold text-blue-500">Vibe</div>
                    </div>
                    <div class="flex items-center space-x-4">
                        @if (Route::has('login'))
                            <div class="flex space-x-4">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl transition duration-200">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-xl transition duration-200">Log in</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl transition duration-200">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </nav>

            <!-- Hero Section -->
            <div class="flex flex-col md:flex-row items-center justify-between mb-12 gap-8">
                <div class="md:w-1/2">
                    <h1 class="text-5xl font-extrabold text-white mb-6 leading-tight">Connect, Share, Engage with <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-600">Vibe</span></h1>
                    <p class="text-gray-300 text-xl mb-8">Join our growing community and share your moments with friends, family, and the world.</p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-xl text-white bg-blue-600 hover:bg-blue-700 md:py-4 md:text-lg md:px-10 transition duration-200">
                            Get Started
                        </a>
                        <a href="#features" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-xl text-blue-500 bg-gray-800 hover:bg-gray-700 md:py-4 md:text-lg md:px-10 transition duration-200">
                            Learn More
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <div class="relative">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl blur opacity-75"></div>
                        <div class="relative bg-gray-800 p-6 rounded-2xl shadow-xl overflow-hidden">
                            <img src="{{ asset('storage/uploads/some-3d-social-media-icons.jpg') }}" alt="Vibe Preview" class="rounded-xl shadow-lg w-full" onerror="this.src='/api/placeholder/600/400'; this.onerror=null;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Section -->
            <div id="features" class="py-12">
                <h2 class="text-3xl font-bold text-center text-white mb-12">Why Choose <span class="text-blue-500">Vibe</span>?</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="bg-gray-800 bg-opacity-50 backdrop-blur-sm border border-gray-700 rounded-xl p-6 hover:transform hover:scale-105 transition duration-200">
                        <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-2">Connect with Friends</h3>
                        <p class="text-gray-300">Build meaningful connections with friends, family, and colleagues in a safe, engaging environment.</p>
                    </div>
                    
                    <!-- Feature 2 -->
                    <div class="bg-gray-800 bg-opacity-50 backdrop-blur-sm border border-gray-700 rounded-xl p-6 hover:transform hover:scale-105 transition duration-200">
                        <div class="w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-2">Share Your Moments</h3>
                        <p class="text-gray-300">Share photos, thoughts, and life updates with your network. Create and preserve memories together.</p>
                    </div>
                    
                    <!-- Feature 3 -->
                    <div class="bg-gray-800 bg-opacity-50 backdrop-blur-sm border border-gray-700 rounded-xl p-6 hover:transform hover:scale-105 transition duration-200">
                        <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-2">Privacy First</h3>
                        <p class="text-gray-300">Your privacy matters. Control who sees your content with our advanced privacy settings.</p>
                    </div>
                </div>
            </div>

            <!-- Testimonials Section -->
            <div class="py-12">
                <h2 class="text-3xl font-bold text-center text-white mb-12">What Our Users Say</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Testimonial 1 -->
                    <div class="bg-gray-800 bg-opacity-50 backdrop-blur-sm border border-gray-700 rounded-xl p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center mr-4 text-white font-bold">JD</div>
                            <div>
                                <h4 class="text-lg font-semibold text-white">Jane Doe</h4>
                                <p class="text-gray-400 text-sm">Member since 2024</p>
                            </div>
                        </div>
                        <p class="text-gray-300">"Vibe has changed how I stay in touch with my friends who live across the country. The interface is so intuitive and fun to use!"</p>
                    </div>
                    
                    <!-- Testimonial 2 -->
                    <div class="bg-gray-800 bg-opacity-50 backdrop-blur-sm border border-gray-700 rounded-xl p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center mr-4 text-white font-bold">MS</div>
                            <div>
                                <h4 class="text-lg font-semibold text-white">Michael Smith</h4>
                                <p class="text-gray-400 text-sm">Member since 2023</p>
                            </div>
                        </div>
                        <p class="text-gray-300">"I've tried many social platforms, but the community here is special. People are supportive and the engagement is authentic."</p>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="py-12">
                <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl p-8 text-center">
                    <h2 class="text-3xl font-bold text-white mb-4">Ready to Connect?</h2>
                    <p class="text-white text-xl mb-8">Join thousands of users already sharing their stories.</p>
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-xl text-blue-600 bg-white hover:bg-gray-100 md:py-4 md:text-lg md:px-10 transition duration-200">
                        Create Your Account
                    </a>
                </div>
            </div>

            <!-- Footer -->
            <footer class="mt-12 text-center text-gray-400 py-8 border-t border-gray-800">
                <div class="flex justify-center space-x-6 mb-4">
                    <!-- Social Icons -->
                    <a href="#" class="text-gray-400 hover:text-blue-500 transition duration-200">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-500 transition duration-200">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-500 transition duration-200">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
                <p class="mt-2">© 2025 Vibe. All rights reserved.</p>
                <div class="flex justify-center mt-4 space-x-6 text-sm">
                    <a href="#" class="text-gray-400 hover:text-gray-300">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-gray-300">Terms of Service</a>
                    <a href="#" class="text-gray-400 hover:text-gray-300">Contact Us</a>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>