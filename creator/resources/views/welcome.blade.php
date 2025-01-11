<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pokemon Card Creator - Design Your Own Pokemon Cards</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gradient-to-br from-gray-50 via-gray-50 to-gray-100 dark:from-gray-900 dark:via-gray-900 dark:to-gray-800 min-h-screen">
        <!-- Background Decoration -->
        <div class="fixed inset-0 -z-10 overflow-hidden">
            <div class="absolute -top-1/2 -right-1/2 w-full h-full bg-gradient-to-bl from-[#FF2D20]/10 via-transparent to-transparent dark:from-[#FF2D20]/5 transform rotate-12 blur-3xl"></div>
            <div class="absolute -bottom-1/2 -left-1/2 w-full h-full bg-gradient-to-tr from-[#FF2D20]/10 via-transparent to-transparent dark:from-[#FF2D20]/5 transform -rotate-12 blur-3xl"></div>
        </div>

        <!-- Navigation -->
        <nav class="fixed top-0 left-0 right-0 bg-white/80 backdrop-blur-xl shadow-lg shadow-gray-900/5 dark:bg-gray-900/80 dark:shadow-gray-900/20 z-50 border-b border-gray-200/30 dark:border-gray-700/30">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <span class="text-2xl font-extrabold bg-gradient-to-r from-[#FF2D20] to-[#FF6B4D] bg-clip-text text-transparent dark:from-white dark:to-gray-300">Pokemon Card Creator</span>
                    </div>
                    
                    @if (Route::has('login'))
                        <div class="flex items-center gap-6">
                            @auth
                                <a href="{{ url('/cards') }}" class="text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white transition-colors duration-200">My Collection</a>
                                <a href="{{ url('/cards/create') }}" class="group relative inline-flex items-center px-4 py-2 bg-gradient-to-r from-[#FF2D20] to-[#FF6B4D] border border-transparent rounded-lg font-semibold text-white shadow-sm hover:shadow-md hover:shadow-[#FF2D20]/20 dark:hover:shadow-[#FF2D20]/10 transition-all duration-200 ease-out hover:-translate-y-0.5">
                                    <span class="relative">Create Card</span>
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white transition-colors duration-200">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="group relative inline-flex items-center px-4 py-2 bg-gradient-to-r from-[#FF2D20] to-[#FF6B4D] border border-transparent rounded-lg font-semibold text-white shadow-sm hover:shadow-md hover:shadow-[#FF2D20]/20 dark:hover:shadow-[#FF2D20]/10 transition-all duration-200 ease-out hover:-translate-y-0.5">
                                        <span class="relative">Get Started</span>
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="relative pt-32 pb-20 px-4 sm:px-6 lg:px-8 overflow-hidden">
            <div class="max-w-7xl mx-auto">
                <div class="lg:grid lg:grid-cols-2 lg:gap-16 items-center">
                    <!-- Left Column: Text Content -->
                    <div class="text-center lg:text-left relative">
                        <div class="inline-flex items-center rounded-full px-4 py-1 text-sm font-semibold bg-[#FF2D20]/10 text-[#FF2D20] ring-1 ring-inset ring-[#FF2D20]/20 mb-6">
                            ✨ Create stunning Pokemon cards
                        </div>
                        <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight">
                            <span class="bg-clip-text text-transparent bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-300">Design Your Own </span>
                            <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#FF2D20] to-[#FF6B4D]">Pokemon Cards</span>
                        </h1>
                        <p class="mt-8 text-xl text-gray-600 dark:text-gray-300 leading-relaxed">
                            Unleash your creativity and bring your Pokemon cards to life. Design, customize, and share unique cards with our intuitive creator.
                        </p>
                        <div class="mt-12 flex flex-wrap gap-6 justify-center lg:justify-start">
                            @auth
                                <a href="{{ url('/cards/create') }}" class="group relative inline-flex items-center px-8 py-4 bg-gradient-to-r from-[#FF2D20] to-[#FF6B4D] rounded-xl font-bold text-white text-lg shadow-lg shadow-[#FF2D20]/20 dark:shadow-[#FF2D20]/10 transition-all duration-200 ease-out hover:-translate-y-1 hover:shadow-xl hover:shadow-[#FF2D20]/30 dark:hover:shadow-[#FF2D20]/20">
                                    <span class="relative">Start Creating</span>
                                    <svg class="ml-3 -mr-1 w-6 h-6 transition-transform duration-200 group-hover:translate-x-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                </a>
                            @else
                                <a href="{{ route('register') }}" class="group relative inline-flex items-center px-8 py-4 bg-gradient-to-r from-[#FF2D20] to-[#FF6B4D] rounded-xl font-bold text-white text-lg shadow-lg shadow-[#FF2D20]/20 dark:shadow-[#FF2D20]/10 transition-all duration-200 ease-out hover:-translate-y-1 hover:shadow-xl hover:shadow-[#FF2D20]/30 dark:hover:shadow-[#FF2D20]/20">
                                    <span class="relative">Get Started Free</span>
                                    <svg class="ml-3 -mr-1 w-6 h-6 transition-transform duration-200 group-hover:translate-x-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>
                            @endauth
                            <a href="#features" class="inline-flex items-center px-8 py-4 border-2 border-gray-300 dark:border-gray-700 rounded-xl font-bold text-gray-700 dark:text-gray-300 text-lg hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-all duration-200 ease-out hover:-translate-y-1">
                                Learn More
                            </a>
                        </div>
                        <!-- Stats -->
                        <div class="mt-12 grid grid-cols-3 gap-6 py-8 border-y border-gray-200 dark:border-gray-800">
                            <div>
                                <div class="text-4xl font-bold bg-gradient-to-r from-[#FF2D20] to-[#FF6B4D] bg-clip-text text-transparent">1000+</div>
                                <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">Cards Created</div>
                            </div>
                            <div>
                                <div class="text-4xl font-bold bg-gradient-to-r from-[#FF2D20] to-[#FF6B4D] bg-clip-text text-transparent">500+</div>
                                <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">Active Users</div>
                            </div>
                            <div>
                                <div class="text-4xl font-bold bg-gradient-to-r from-[#FF2D20] to-[#FF6B4D] bg-clip-text text-transparent">4.9/5</div>
                                <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">User Rating</div>
                            </div>
                        </div>
                    </div>
                    <!-- Right Column: Preview Card -->
                    <div class="hidden lg:block relative mt-12 lg:mt-0">
                        <div class="absolute inset-0 bg-gradient-to-tr from-[#FF2D20]/20 to-transparent dark:from-[#FF2D20]/10 rounded-3xl transform rotate-3 blur-2xl"></div>
                        <div class="relative bg-white dark:bg-gray-900 rounded-3xl shadow-2xl p-8 transform hover:-rotate-2 transition-transform duration-300">
                            <div class="aspect-[2.5/3.5] bg-gradient-to-br from-[#FF2D20]/5 to-transparent dark:from-[#FF2D20]/10 rounded-2xl border-2 border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex flex-col h-full">
                                    <div class="flex justify-between items-start">
                                        <div class="text-xl font-bold text-gray-900 dark:text-white">Charizard</div>
                                        <div class="text-sm font-semibold text-[#FF2D20]">HP 120</div>
                                    </div>
                                    <div class="flex-1 flex items-center justify-center">
                                        <div class="w-32 h-32 bg-gradient-to-br from-[#FF2D20]/20 to-transparent dark:from-[#FF2D20]/10 rounded-full flex items-center justify-center">
                                            <svg class="w-20 h-20 text-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M12.786 3.764a1 1 0 0 0-1.572 0l-8 10A1 1 0 0 0 4 15h16a1 1 0 0 0 .786-1.236l-8-10Z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="space-y-4">
                                        <div class="bg-gray-100 dark:bg-gray-800 rounded-lg p-3">
                                            <div class="text-sm font-semibold text-gray-900 dark:text-white">Fire Blast</div>
                                            <div class="text-xs text-gray-600 dark:text-gray-400">80 damage</div>
                                        </div>
                                        <div class="text-xs text-gray-600 dark:text-gray-400 text-center">
                                            The flame on its tail indicates its life force. If it is healthy, the flame burns brightly.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="relative py-24 bg-white/50 dark:bg-gray-800/50 backdrop-blur-xl border-y border-gray-200/30 dark:border-gray-700/30">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto">
                    <h2 class="text-3xl sm:text-4xl font-extrabold bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-300 bg-clip-text text-transparent">Everything You Need to Create Amazing Cards</h2>
                    <p class="mt-4 text-lg text-gray-600 dark:text-gray-300">Our powerful yet simple tools make it easy to bring your Pokemon cards to life</p>
                </div>

                <div class="mt-20 grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="group relative p-8 bg-white dark:bg-gray-900 rounded-2xl shadow-xl shadow-gray-900/5 dark:shadow-gray-900/20 transition-all duration-200 hover:-translate-y-1 hover:shadow-2xl hover:shadow-gray-900/10 dark:hover:shadow-gray-900/30">
                        <div class="absolute inset-0 bg-gradient-to-br from-[#FF2D20]/5 to-transparent dark:from-[#FF2D20]/10 rounded-2xl transition-opacity duration-200 opacity-0 group-hover:opacity-100"></div>
                        <div class="relative">
                            <div class="flex items-center justify-center w-14 h-14 bg-gradient-to-br from-[#FF2D20] to-[#FF6B4D] rounded-xl mb-6 shadow-lg shadow-[#FF2D20]/20 dark:shadow-[#FF2D20]/10">
                                <svg class="w-7 h-7 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Intuitive Design Tools</h3>
                            <p class="mt-4 text-gray-600 dark:text-gray-300 leading-relaxed">
                                Easy-to-use tools that make customizing every aspect of your Pokemon card a breeze. No design experience needed.
                            </p>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="group relative p-8 bg-white dark:bg-gray-900 rounded-2xl shadow-xl shadow-gray-900/5 dark:shadow-gray-900/20 transition-all duration-200 hover:-translate-y-1 hover:shadow-2xl hover:shadow-gray-900/10 dark:hover:shadow-gray-900/30">
                        <div class="absolute inset-0 bg-gradient-to-br from-[#FF2D20]/5 to-transparent dark:from-[#FF2D20]/10 rounded-2xl transition-opacity duration-200 opacity-0 group-hover:opacity-100"></div>
                        <div class="relative">
                            <div class="flex items-center justify-center w-14 h-14 bg-gradient-to-br from-[#FF2D20] to-[#FF6B4D] rounded-xl mb-6 shadow-lg shadow-[#FF2D20]/20 dark:shadow-[#FF2D20]/10">
                                <svg class="w-7 h-7 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Digital Collection</h3>
                            <p class="mt-4 text-gray-600 dark:text-gray-300 leading-relaxed">
                                Organize and showcase your custom cards in your personal digital collection. Access them anytime, anywhere.
                            </p>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="group relative p-8 bg-white dark:bg-gray-900 rounded-2xl shadow-xl shadow-gray-900/5 dark:shadow-gray-900/20 transition-all duration-200 hover:-translate-y-1 hover:shadow-2xl hover:shadow-gray-900/10 dark:hover:shadow-gray-900/30">
                        <div class="absolute inset-0 bg-gradient-to-br from-[#FF2D20]/5 to-transparent dark:from-[#FF2D20]/10 rounded-2xl transition-opacity duration-200 opacity-0 group-hover:opacity-100"></div>
                        <div class="relative">
                            <div class="flex items-center justify-center w-14 h-14 bg-gradient-to-br from-[#FF2D20] to-[#FF6B4D] rounded-xl mb-6 shadow-lg shadow-[#FF2D20]/20 dark:shadow-[#FF2D20]/10">
                                <svg class="w-7 h-7 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Share & Connect</h3>
                            <p class="mt-4 text-gray-600 dark:text-gray-300 leading-relaxed">
                                Share your creations with friends and join a community of Pokemon card creators. Get inspired by others' designs.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section class="py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-300 bg-clip-text text-transparent">What Our Users Say</h2>
                    <p class="mt-4 text-lg text-gray-600 dark:text-gray-300">Join thousands of satisfied Pokemon card creators</p>
                </div>
                
                <div class="mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Testimonial 1 -->
                    <div class="bg-white dark:bg-gray-900 p-8 rounded-2xl shadow-xl">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-[#FF2D20] to-[#FF6B4D] rounded-full flex items-center justify-center text-white font-bold">AS</div>
                            <div>
                                <div class="font-semibold text-gray-900 dark:text-white">Alex Smith</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">Pokemon Enthusiast</div>
                            </div>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300">"The best tool I've found for creating custom Pokemon cards. The interface is intuitive and the results are amazing!"</p>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="bg-white dark:bg-gray-900 p-8 rounded-2xl shadow-xl">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-[#FF2D20] to-[#FF6B4D] rounded-full flex items-center justify-center text-white font-bold">MJ</div>
                            <div>
                                <div class="font-semibold text-gray-900 dark:text-white">Maria Johnson</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">Card Collector</div>
                            </div>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300">"I love how easy it is to create professional-looking cards. The community features are great for sharing and getting inspiration."</p>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="bg-white dark:bg-gray-900 p-8 rounded-2xl shadow-xl lg:col-span-1 md:col-span-2 lg:col-span-1">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-[#FF2D20] to-[#FF6B4D] rounded-full flex items-center justify-center text-white font-bold">RK</div>
                            <div>
                                <div class="font-semibold text-gray-900 dark:text-white">Ryan Kim</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">Digital Artist</div>
                            </div>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300">"As a designer, I appreciate the attention to detail in the card creation process. The results are truly professional."</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="relative py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="relative overflow-hidden bg-gradient-to-br from-[#FF2D20] to-[#FF6B4D] rounded-3xl shadow-2xl shadow-[#FF2D20]/20 dark:shadow-[#FF2D20]/10">
                    <div class="absolute inset-0 bg-grid-white/10 [mask-image:linear-gradient(0deg,transparent,black)]"></div>
                    <div class="relative px-8 py-16 sm:px-12 sm:py-20 lg:flex lg:items-center lg:justify-between lg:px-16">
                        <div>
                            <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                                Start Creating Today
                                <span class="block text-xl mt-2 font-semibold text-white/90">Join thousands of Pokemon card creators and bring your ideas to life.</span>
                            </h2>
                        </div>
                        <div class="mt-8 lg:mt-0 lg:ml-8">
                            @auth
                                <a href="{{ url('/cards/create') }}" class="group inline-flex items-center px-8 py-4 bg-white rounded-xl font-bold text-[#FF2D20] text-lg shadow-lg shadow-[#FF2D20]/20 transition-all duration-200 ease-out hover:-translate-y-1 hover:shadow-xl hover:shadow-[#FF2D20]/30">
                                    Create Your First Card
                                    <svg class="ml-3 -mr-1 w-6 h-6 transition-transform duration-200 group-hover:translate-x-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                </a>
                            @else
                                <a href="{{ route('register') }}" class="group inline-flex items-center px-8 py-4 bg-white rounded-xl font-bold text-[#FF2D20] text-lg shadow-lg shadow-[#FF2D20]/20 transition-all duration-200 ease-out hover:-translate-y-1 hover:shadow-xl hover:shadow-[#FF2D20]/30">
                                    Get Started Free
                                    <svg class="ml-3 -mr-1 w-6 h-6 transition-transform duration-200 group-hover:translate-x-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="relative bg-white/50 dark:bg-gray-800/50 backdrop-blur-xl border-t border-gray-200/30 dark:border-gray-700/30">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <p class="text-center text-gray-500 dark:text-gray-400">
                    Pokemon Card Creator - A Laravel Application
                </p>
            </div>
        </footer>
    </body>
</html>
