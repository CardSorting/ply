@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('/img/grid.svg')] bg-center opacity-20"></div>
        <div class="absolute inset-0 bg-gradient-radial from-transparent via-black/40 to-black/60"></div>
        
        <div class="relative max-w-[90%] mx-auto py-24">
            <div class="fixed top-8 right-8 z-50">
                <a href="{{ route('cards.create') }}" 
                   class="inline-flex items-center px-4 py-2 bg-black/20 hover:bg-black/40 text-gray-400 hover:text-white backdrop-blur-md border border-white/10 rounded-lg transition-all duration-300 shadow-2xl hover:shadow-white/5">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add Card
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-12 gap-y-16 perspective-1000">
                @forelse ($cards as $card)
                    <div class="group relative preserve-3d">
                        <!-- Card Slot Background -->
                        <div class="absolute inset-0 rounded-2xl bg-black/40 transform -translate-y-2 translate-z-[-50px] blur-sm"></div>
                        
                        <!-- Card Slot -->
                        <div class="absolute inset-0 rounded-2xl bg-gradient-to-br from-white/5 to-transparent backdrop-blur-sm border border-white/10"></div>
                        
                        <!-- Shine Effect -->
                        <div class="absolute inset-0 rounded-2xl bg-gradient-to-tr from-white/0 via-white/5 to-white/0 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                        
                        <!-- Glow Effect -->
                        <div class="absolute -inset-2 bg-gradient-to-r from-blue-500/10 to-purple-500/10 rounded-3xl blur-xl opacity-0 group-hover:opacity-100 transition-all duration-700"></div>
                        
                        <!-- Card Container -->
                        <div class="relative transform transition-all duration-500 ease-out group-hover:scale-110 group-hover:rotate-2 group-hover:-translate-y-4 group-hover:translate-z-8">
                            <x-pokemon-card :card="$card" class="mx-auto shadow-2xl rounded-xl relative z-10" />
                        </div>
                    </div>
                @empty
                    <div class="col-span-full">
                        <div class="bg-black/20 p-16 rounded-3xl shadow-2xl text-center backdrop-blur-md border border-white/10 max-w-lg mx-auto">
                            <div class="relative w-48 h-64 mx-auto mb-8 rounded-xl bg-gradient-to-br from-white/5 to-transparent border border-white/10 shadow-2xl"></div>
                            <p class="text-gray-400 mb-8 text-lg">Your digital album is ready for its first card.</p>
                            <a href="{{ route('cards.create') }}" 
                               class="inline-flex items-center px-6 py-3 bg-black/20 hover:bg-black/40 text-gray-300 hover:text-white backdrop-blur-md border border-white/10 rounded-xl transition-all duration-300 shadow-2xl hover:shadow-white/5">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Add Card
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>

            @if($cards->hasPages())
                <div class="flex justify-center mt-16 preserve-3d">
                    <div class="inline-flex rounded-xl bg-black/20 backdrop-blur-md border border-white/10 p-2 shadow-2xl hover:translate-z-4 transition-transform duration-300">
                        {{ $cards->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>

    <style>
        .preserve-3d {
            transform-style: preserve-3d;
            perspective: 1000px;
        }
        .translate-z-8 {
            transform: translateZ(8px);
        }
        .translate-z-4 {
            transform: translateZ(4px);
        }
        .translate-z-[-50px] {
            transform: translateZ(-50px);
        }
        @keyframes floating {
            0%, 100% { transform: translateY(0) translateZ(0); }
            50% { transform: translateY(-5px) translateZ(5px); }
        }
        .group:hover > div:last-child {
            animation: floating 3s ease-in-out infinite;
        }
    </style>
