@extends('layouts.app')
<nav class="gradient-bg shadow-lg">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <div class="text-2xl font-bold text-white">
                    <span class="flex items-center space-x-2">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                        </svg>
                        <span>Vibe</span>
                    </span>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="hidden md:flex flex-1 max-w-md px-6">
                <div class="relative w-full">
                    <input type="text"
                            name="search"
                            hx-get="/profile/search"
                            hx-trigger="keyup changed delay:300ms" 
                            hx-target="#user-results"
                            hx-indicator=".htmx-indicator"
                           class="w-full px-4 py-2 rounded-full bg-white/20 border border-white/30 text-white placeholder-white/70 focus:ring-2 focus:ring-white/50 focus:outline-none"
                           placeholder="Search users by nickname or email...">
                    <svg class="w-5 h-5 absolute right-3 top-2.5 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
            </div>

            <!-- Navigation Menu -->
            <div class="flex items-center space-x-6">
                <a href="#" class="text-white/90 hover:text-white transition-colors duration-200">Home</a>
                <a href="#" class="text-white/90 hover:text-white transition-colors duration-200">Friends</a>

                <!-- Notifications Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="relative p-2 text-white/90 hover:text-white transition-colors duration-200">
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center animate-pulse">2</span>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                    </button>

                    <!-- Notifications Panel -->
                    <div x-show="open"
                         @click.away="open = false"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         class="absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-xl py-2 z-50">
                        <div class="px-4 py-2 border-b border-gray-100">
                            <h3 class="text-sm font-semibold text-gray-900">Notifications</h3>
                        </div>
                        <!-- Notification Items -->
                        <div class="max-h-64 overflow-y-auto">
                            <a href="#" class="flex items-center px-4 py-3 hover:bg-gray-50 transition-colors duration-200">
                                <img class="h-10 w-10 rounded-full object-cover" src="https://i.pravatar.cc/150?img=1" alt="User">
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">Sarah Johnson</p>
                                    <p class="text-sm text-gray-500">Sent you a friend request</p>
                                    <p class="text-xs text-gray-400 mt-1">2 minutes ago</p>
                                </div>
                            </a>
                            <a href="#" class="flex items-center px-4 py-3 hover:bg-gray-50 transition-colors duration-200">
                                <img class="h-10 w-10 rounded-full object-cover" src="https://i.pravatar.cc/150?img=2" alt="User">
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">Mike Wilson</p>
                                    <p class="text-sm text-gray-500">Accepted your friend request</p>
                                    <p class="text-xs text-gray-400 mt-1">1 hour ago</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Profile Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                        <img class="h-9 w-9 rounded-full object-cover ring-2 ring-white/30" src="https://i.pravatar.cc/150?img=3" alt="Profile">
                    </button>

                    <!-- Profile Menu -->
                    <div x-show="open"
                         @click.away="open = false"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl py-2 z-50">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button  class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">log out</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<main>
    <div class="m-3 flex justify-center">
        <p class="htmx-indicator">Searching for users 🔬...</p>
    </div>
    <div id="user-results"  class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

    </div>
</main>