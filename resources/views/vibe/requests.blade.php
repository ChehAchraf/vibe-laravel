<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friend Requests - Vibe</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .hover-scale {
            transition: transform 0.2s;
        }
        .hover-scale:hover {
            transform: scale(1.02);
        }
    </style>
</head>
<body class="bg-gray-50">
<!-- Navigation Bar (Same as other pages) -->
<nav class="gradient-bg shadow-lg">
    <!-- ... Navigation content ... -->
</nav>

<!-- Main Content -->
<main class="max-w-4xl mx-auto px-4 py-8">
    <!-- Tabs -->
    <div class="flex space-x-1 rounded-xl bg-gray-200 p-1 mb-8" x-data="{ activeTab: 'received' }">
        <button @click="activeTab = 'received'"
                :class="{ 'bg-white shadow-sm': activeTab === 'received' }"
                class="w-full rounded-lg py-2.5 text-sm font-medium leading-5 text-gray-700
                           ring-white ring-opacity-60 ring-offset-2 ring-offset-blue-400
                           focus:outline-none focus:ring-2 hover:bg-white/[0.5] transition">
            Received Requests
            <span class="ml-2 bg-indigo-100 text-indigo-600 py-0.5 px-2 rounded-full text-xs">12</span>
        </button>
        <button @click="activeTab = 'sent'"
                :class="{ 'bg-white shadow-sm': activeTab === 'sent' }"
                class="w-full rounded-lg py-2.5 text-sm font-medium leading-5 text-gray-700
                           ring-white ring-opacity-60 ring-offset-2 ring-offset-blue-400
                           focus:outline-none focus:ring-2 hover:bg-white/[0.5] transition">
            Sent Requests
            <span class="ml-2 bg-indigo-100 text-indigo-600 py-0.5 px-2 rounded-full text-xs">3</span>
        </button>
    </div>

    <!-- Received Requests Section -->
    @if(count($requests) > 0)
        <div x-show="activeTab === 'received'" class="space-y-4">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Received Friend Requests</h2>

        <!-- Request Cards -->
        <div class="bg-white rounded-xl shadow-md hover-scale">
            <div class="p-6">
                <div class="flex items-center space-x-4">
                    <img class="h-16 w-16 rounded-full object-cover ring-2 ring-indigo-100"
                         src="https://i.pravatar.cc/150?img=1" alt="User">
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-gray-900">Emily Brown</h3>
                        <p class="text-indigo-600 text-sm">@emilyb</p>
                        <p class="text-gray-500 text-sm mt-1">3 mutual friends</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700
                                         transition text-sm">Accept</button>
                        <button class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50
                                         transition text-sm">Decline</button>
                    </div>
                </div>
            </div>
            <div class="px-6 py-3 bg-gray-50 rounded-b-xl text-sm text-gray-500">
                Requested 2 days ago
            </div>
        </div>

        <!-- More Received Request Cards... -->
        <div class="bg-white rounded-xl shadow-md hover-scale">
            <div class="p-6">
                <div class="flex items-center space-x-4">
                    <img class="h-16 w-16 rounded-full object-cover ring-2 ring-indigo-100"
                         src="https://i.pravatar.cc/150?img=2" alt="User">
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-gray-900">David Kim</h3>
                        <p class="text-indigo-600 text-sm">@davidk</p>
                        <p class="text-gray-500 text-sm mt-1">1 mutual friend</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700
                                         transition text-sm">Accept</button>
                        <button class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50
                                         transition text-sm">Decline</button>
                    </div>
                </div>
            </div>
            <div class="px-6 py-3 bg-gray-50 rounded-b-xl text-sm text-gray-500">
                Requested 5 days ago
            </div>
        </div>
    </div>
    @else
        <!-- Sent Requests Section -->
        {{--    <div x-show="activeTab === 'sent'" class="space-y-4">--}}
{{--        <h2 class="text-2xl font-bold text-gray-900 mb-6">Sent Friend Requests</h2>--}}

{{--        <!-- Sent Request Cards -->--}}
{{--        <div class="bg-white rounded-xl shadow-md hover-scale">--}}
{{--            <div class="p-6">--}}
{{--                <div class="flex items-center space-x-4">--}}
{{--                    <img class="h-16 w-16 rounded-full object-cover ring-2 ring-indigo-100"--}}
{{--                         src="https://i.pravatar.cc/150?img=3" alt="User">--}}
{{--                    <div class="flex-1">--}}
{{--                        <h3 class="text-lg font-semibold text-gray-900">Michael Chen</h3>--}}
{{--                        <p class="text-indigo-600 text-sm">@michaelc</p>--}}
{{--                        <p class="text-gray-500 text-sm mt-1">5 mutual friends</p>--}}
{{--                    </div>--}}
{{--                    <button class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50--}}
{{--                                     transition text-sm">Cancel Request</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="px-6 py-3 bg-gray-50 rounded-b-xl text-sm text-gray-500">--}}
{{--                Sent 1 day ago--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <!-- More Sent Request Cards... -->--}}
{{--        <div class="bg-white rounded-xl shadow-md hover-scale">--}}
{{--            <div class="p-6">--}}
{{--                <div class="flex items-center space-x-4">--}}
{{--                    <img class="h-16 w-16 rounded-full object-cover ring-2 ring-indigo-100"--}}
{{--                         src="https://i.pravatar.cc/150?img=4" alt="User">--}}
{{--                    <div class="flex-1">--}}
{{--                        <h3 class="text-lg font-semibold text-gray-900">Sophie Taylor</h3>--}}
{{--                        <p class="text-indigo-600 text-sm">@sophiet</p>--}}
{{--                        <p class="text-gray-500 text-sm mt-1">2 mutual friends</p>--}}
{{--                    </div>--}}
{{--                    <button class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50--}}
{{--                                     transition text-sm">Cancel Request</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="px-6 py-3 bg-gray-50 rounded-b-xl text-sm text-gray-500">--}}
{{--                Sent 3 days ago--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <!-- Empty State -->
        <div x-show="false" class="text-center py-12">
        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
            </svg>
        </div>
        <h3 class="text-lg font-medium text-gray-900">No friend requests</h3>
        <p class="text-gray-500 mt-2">You don't have any pending friend requests at the moment.</p>
        <a href="/users" class="mt-4 inline-flex items-center text-indigo-600 hover:text-indigo-500">
            Find people to connect with
            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
    </div>
    @endif
</main>
</body>
</html>
