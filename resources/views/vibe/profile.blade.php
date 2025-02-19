<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Vibe</title>
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
<nav class="gradient-bg shadow-lg">
    <!-- ... Navigation content ... -->
</nav>

<div class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto">
        <div class="h-64 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-b-lg relative">
            <div class="absolute -bottom-16 left-8 flex items-end space-x-6">
                <div class="relative">
                    <img src="{{ asset('storage/profile_photos'.$user->profile_photo) ? Storage::url($user->profile_photo) : 'https://i.pravatar.cc/150?img=4' }}"
                         alt="Profile"
                         class="w-32 h-32 rounded-full border-4 border-white object-cover">
                    <button class="absolute bottom-0 right-0 bg-indigo-600 text-white p-2 rounded-full hover:bg-indigo-700
                                     transition shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </button>
                </div>
                <div class="mb-4">
                    <h1 class="text-2xl font-bold text-gray-900">{{$user->name}}</h1>
                    <p class="text-indigo-600"><span>@</span>{{$user->nickname}}</p>
                </div>
            </div>
            <div class="absolute bottom-4 right-8">
                <a href="{{route('profile.edit')}}" class="bg-white text-indigo-600 px-6 py-2.5 rounded-lg hover:bg-indigo-50 transition shadow-md
                              font-medium flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                    </svg>
                    <span>Edit Profile</span>
                </a>
            </div>
        </div>
    </div>
</div>

<main class="max-w-7xl mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="space-y-6">
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">About</h2>
                <div class="space-y-4">
                    <p class="text-gray-600">
                        @if($user->bio)
                            {{$user->bio}}
                        @else
                            this user had no bio yet ! 😒
                        @endif
                    </p>
                    <div class="border-t pt-4">
                        <div class="flex items-center space-x-2 text-gray-600 mb-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                            </svg>
                            <span>{{$user->email}}</span>
                        </div>
                        <div class="flex items-center space-x-2 text-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span>Joined {{$user->created_at}}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Stats</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-indigo-600">245</div>
                        <div class="text-sm text-gray-600">Friends</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-indigo-600">12</div>
                        <div class="text-sm text-gray-600">Pending Requests</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="md:col-span-2">
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold text-gray-900">Friends</h2>
                    <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium">View All</a>
                </div>
                @if($friend_list)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-center space-x-4 p-4 rounded-lg hover:bg-gray-50 transition">
                            <img src="https://i.pravatar.cc/150?img=1"
                                 alt="Friend"
                                 class="w-12 h-12 rounded-full object-cover">
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-900">Sarah Johnson</h3>
                                <p class="text-gray-600 text-sm">@sarahj</p>
                            </div>
                            <button class="text-gray-400 hover:text-red-500 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                @else
                    <p>sorry 😢 but you don't have any friend's yet, try to add them please 😍</p>
                @endif

            </div>

            <div class="bg-white rounded-xl shadow-md p-6 mt-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Pending Friend Requests</h2>
                <div class="space-y-4">
                    <div class="flex items-center space-x-4 p-4 rounded-lg bg-gray-50">
                        <img src="https://i.pravatar.cc/150?img=5"
                             alt="User"
                             class="w-12 h-12 rounded-full object-cover">
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-900">Mike Wilson</h3>
                            <p class="text-gray-600 text-sm">@mikew</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700
                                             transition text-sm">Accept</button>
                            <button class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50
                                             transition text-sm">Decline</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
