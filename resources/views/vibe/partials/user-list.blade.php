<ul>
    @forelse($users as $user)
    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-6 hover-scale">
        <div class="flex items-start space-x-4">
            <img src="https://i.pravatar.cc/150?img=11" 
                 alt="User" 
                 class="h-16 w-16 rounded-full object-cover ring-2 ring-indigo-50">
            <div class="flex-1 min-w-0">
                <div class="flex items-center justify-between">
                    <a  href="{{route('profile.show', ['id'=>$user->id])}}" class="text-lg font-semibold text-gray-900 truncate">{{$user->name}}</a>
                    <span class="text-xs text-green-600 bg-green-50 px-2 py-1 rounded-full">Online</span>
                </div>
                <p class="text-indigo-600 text-sm">@johnanderson</p>
                <p class="text-gray-500 text-sm mt-1">Web Developer at Tech Corp</p>
                <div class="mt-3 flex items-center text-sm text-gray-500">
                    <svg class="w-4 h-4 text-gray-400 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    5 mutual friends
                </div>
                <div class="mt-4 flex items-center space-x-2">
                    <button class="flex-1 px-4 py-2 bg-indigo-600 text-white text-sm rounded-lg 
                                 hover:bg-indigo-700 transition">
                        Add Friend
                    </button>
                    <button class="px-4 py-2 border border-gray-300 text-gray-700 text-sm rounded-lg 
                                 hover:bg-gray-50 transition">
                        View Profile
                    </button>
                </div>
            </div>
        </div>
    </div>
    @empty
        <li class="p-2 text-gray-500">Ther is no resutle</li>
    @endforelse
</ul>
