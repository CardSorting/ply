@extends('layouts.app')

@section('content')
    <div class="relative bg-white/10 backdrop-blur-sm overflow-hidden shadow-lg shadow-black/10 sm:rounded-lg border border-white/10">
        <!-- Background Energy Symbols -->
        <div class="absolute inset-0 overflow-hidden opacity-10">
            <div class="absolute top-0 left-0 w-32 h-32 bg-yellow-500/10 rounded-full -translate-x-16 -translate-y-16"></div>
            <div class="absolute top-0 right-0 w-32 h-32 bg-red-500/10 rounded-full translate-x-16 -translate-y-16"></div>
            <div class="absolute bottom-0 left-0 w-32 h-32 bg-blue-500/10 rounded-full -translate-x-16 translate-y-16"></div>
            <div class="absolute bottom-0 right-0 w-32 h-32 bg-green-500/10 rounded-full translate-x-16 translate-y-16"></div>
        </div>

        <div class="relative p-12 text-center">
            <!-- Animated Pokeball -->
            <div class="group inline-flex items-center justify-center w-32 h-32 rounded-full bg-gradient-to-br from-red-500/30 to-red-600/30 border-[6px] border-white/20 mb-10 relative overflow-hidden transition-transform hover:scale-110 cursor-pointer">
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-full h-[6px] bg-white/30 group-hover:bg-white/40 transition-colors"></div>
                </div>
                <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
                    <div class="w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/40 border-4 border-white/40 group-hover:border-white/50 transition-colors"></div>
                </div>
            </div>
            
            <!-- Welcome Section -->
            <div class="relative">
                <h3 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-400 mb-6">
                    Begin Your Pokemon Journey
                </h3>
                <p class="text-xl text-gray-300 max-w-2xl mx-auto mb-12">
                    Create your own legendary Pokemon cards with powerful abilities and stunning designs.
                </p>
            </div>

            <!-- Energy Types -->
            <div class="grid grid-cols-2 md:grid-cols-5 gap-4 max-w-3xl mx-auto mb-12">
                <div class="bg-yellow-500/10 rounded-xl p-4 transform hover:scale-105 transition-transform">
                    <div class="text-yellow-400 text-2xl mb-1">⚡</div>
                    <div class="text-yellow-400 font-medium">Electric</div>
                </div>
                <div class="bg-red-500/10 rounded-xl p-4 transform hover:scale-105 transition-transform">
                    <div class="text-red-400 text-2xl mb-1">🔥</div>
                    <div class="text-red-400 font-medium">Fire</div>
                </div>
                <div class="bg-blue-500/10 rounded-xl p-4 transform hover:scale-105 transition-transform">
                    <div class="text-blue-400 text-2xl mb-1">💧</div>
                    <div class="text-blue-400 font-medium">Water</div>
                </div>
                <div class="bg-gray-500/10 rounded-xl p-4 transform hover:scale-105 transition-transform">
                    <div class="text-gray-400 text-2xl mb-1">⭐</div>
                    <div class="text-gray-400 font-medium">Normal</div>
                </div>
                <div class="bg-orange-500/10 rounded-xl p-4 transform hover:scale-105 transition-transform">
                    <div class="text-orange-400 text-2xl mb-1">👊</div>
                    <div class="text-orange-400 font-medium">Fighting</div>
                </div>
            </div>
            
            <!-- Create Button -->
            <div class="mb-16">
                <a href="{{ route('cards.create') }}" 
                   class="group relative inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl font-bold text-lg text-white uppercase tracking-wider hover:from-blue-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-900 transition-all duration-200 shadow-lg shadow-blue-500/20 transform hover:scale-105">
                    <span class="absolute inset-0 rounded-xl overflow-hidden">
                        <span class="absolute inset-0 bg-gradient-to-r from-blue-400/20 to-purple-400/20 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></span>
                    </span>
                    <svg class="w-6 h-6 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Create Your First Card
                </a>
            </div>
            
            <!-- Features Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="group bg-gradient-to-br from-blue-500/5 to-purple-500/5 rounded-xl p-6 border border-white/5 hover:border-white/10 transform hover:-translate-y-1 transition-all duration-200">
                    <div class="bg-gradient-to-br from-blue-500/10 to-purple-500/10 rounded-lg p-3 w-14 h-14 mx-auto mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                        </svg>
                    </div>
                    <h4 class="text-lg font-semibold text-blue-400 mb-2">Unique Abilities</h4>
                    <p class="text-gray-400">Design powerful attacks with custom damage values and energy requirements</p>
                </div>
                
                <div class="group bg-gradient-to-br from-purple-500/5 to-pink-500/5 rounded-xl p-6 border border-white/5 hover:border-white/10 transform hover:-translate-y-1 transition-all duration-200">
                    <div class="bg-gradient-to-br from-purple-500/10 to-pink-500/10 rounded-lg p-3 w-14 h-14 mx-auto mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-purple-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                        </svg>
                    </div>
                    <h4 class="text-lg font-semibold text-purple-400 mb-2">Battle Stats</h4>
                    <p class="text-gray-400">Set HP, weakness, resistance, and retreat cost for strategic gameplay</p>
                </div>
                
                <div class="group bg-gradient-to-br from-pink-500/5 to-red-500/5 rounded-xl p-6 border border-white/5 hover:border-white/10 transform hover:-translate-y-1 transition-all duration-200">
                    <div class="bg-gradient-to-br from-pink-500/10 to-red-500/10 rounded-lg p-3 w-14 h-14 mx-auto mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-pink-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.53 16.122a3 3 0 00-5.78 1.128 2.25 2.25 0 01-2.4 2.245 4.5 4.5 0 008.4-2.245c0-.399-.078-.78-.22-1.128zm0 0a15.998 15.998 0 003.388-1.62m-5.043-.025a15.994 15.994 0 011.622-3.395m3.42 3.42a15.995 15.995 0 004.764-4.648l3.876-5.814a1.151 1.151 0 00-1.597-1.597L14.146 6.32a15.996 15.996 0 00-4.649 4.763m3.42 3.42a6.776 6.776 0 00-3.42-3.42" />
                        </svg>
                    </div>
                    <h4 class="text-lg font-semibold text-pink-400 mb-2">Custom Design</h4>
                    <p class="text-gray-400">Add artwork, choose card numbers, and credit your favorite artists</p>
                </div>
            </div>
        </div>
    </div>
@endsection
