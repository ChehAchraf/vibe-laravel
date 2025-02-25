<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$user->name}} - Vibe</title>
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

<!-- Profile Header -->
<div class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto">
        <!-- Cover Photo -->
        <div class="h-64 bg-gradient-to-r from-pink-500 to-rose-500 rounded-b-lg relative">
            <div class="absolute -bottom-16 left-8 flex items-end space-x-6">
                <!-- Profile Photo -->
                <div class="relative">
                    <img src="https://i.pravatar.cc/150?img=5"
                         alt="Profile"
                         class="w-32 h-32 rounded-full border-4 border-white object-cover">
                </div>
                <!-- Profile Info -->
                <div class="mb-4">
                    <h1 class="text-2xl font-bold text-gray-900">{{$user->name}}</h1>
                    <p class="text-indigo-600"><span>@</span>{{$user->nickname}}</p>
                </div>
            </div>
            <!-- Friend Request Button -->
            <div class="absolute bottom-4 right-8 flex space-x-3">
                <!-- Friend Status Button - Can be one of these states -->
                @if (!$CheckIfRequestSent)
                <form method="post" action="{{ route('send.request', ['receiver_id' => $user->id]) }}">
                    @csrf
                    <button type="submit" class="px-6 py-2.5 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700
                             transition shadow-md font-medium flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span>Add Friend</span>
                    </button>
                </form>
            @else
                @if (optional($CheckIfRequestaccepted)->status == 'accepted')
                    <button class="px-6 py-2.5 rounded-lg bg-green-600 text-white cursor-default shadow-md font-medium flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Friends</span>
                    </button>
                @else
                    <button class="px-6 py-2.5 rounded-lg bg-gray-200 text-gray-700 cursor-default shadow-md font-medium">
                        Request Sent
                    </button>
                @endif
            @endif
                
                
                <!-- Message Button -->
                <button class="px-6 py-2.5 rounded-lg bg-white text-indigo-600 hover:bg-indigo-50
                                 transition shadow-md font-medium flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    <span>Message</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<main class="max-w-7xl mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Left Column - About -->
        <div class="space-y-6">
            <!-- About Card -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">About</h2>
                <div class="space-y-4">
                    <p class="text-gray-600">
                        @if($user->bio)

                        @else
                            This user has no bio yet 😒
                        @endif
                    </p>
                    <div class="border-t pt-4">
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

            <!-- Stats Card -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Stats</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-indigo-600">186</div>
                        <div class="text-sm text-gray-600">Friends</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-indigo-600">24</div>
                        <div class="text-sm text-gray-600">Mutual Friends</div>
                    </div>
                </div>
            </div>

            <!-- Mutual Friends Preview -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-900">Mutual Friends</h2>
                    <a href="#" class="text-indigo-600 hover:text-indigo-700 text-sm font-medium">View All</a>
                </div>
                <div class="flex -space-x-2 overflow-hidden">
                    <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white"
                         src="https://i.pravatar.cc/150?img=1" alt="">
                    <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white"
                         src="https://i.pravatar.cc/150?img=2" alt="">
                    <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white"
                         src="https://i.pravatar.cc/150?img=3" alt="">
                    <div class="inline-flex h-8 w-8 items-center justify-center rounded-full ring-2 ring-white
                                  bg-gray-100 text-xs font-medium">
                        +21
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Posts/Activity -->
        <div class="md:col-span-2 space-y-6">
            <!-- Recent Activity -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Recent Activity</h2>
                <div class="space-y-6">
                    <!-- Activity Item -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="text-gray-900">Became friends with <a href="#"
                                                                            class="font-semibold text-indigo-600">Alex Johnson</a></p>
                            <p class="text-sm text-gray-500 mt-1">2 days ago</p>
                        </div>
                    </div>

                    <!-- Activity Item -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="text-gray-900">Updated their profile information</p>
                            <p class="text-sm text-gray-500 mt-1">1 week ago</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Friends Preview -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold text-gray-900">Friends</h2>
                    <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium">View All</a>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <!-- Friend Item -->
                    <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50 transition">
                        <img src="https://i.pravatar.cc/150?img=7"
                             class="w-10 h-10 rounded-full object-cover" alt="">
                        <div>
                            <h3 class="font-medium text-gray-900">Mike Wilson</h3>
                            <p class="text-sm text-gray-500">@mikew</p>
                        </div>
                    </div>
                    <!-- More friend items... -->
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
