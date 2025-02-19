<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Vibe</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
<!-- Navigation Bar (same as index.html) -->
<!-- ... -->

<main class="max-w-4xl mx-auto px-4 py-8">
    <div class="bg-white rounded-xl shadow-lg p-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit Profile</h1>

        <form class="space-y-6" method="POST" action="{{route('profile.edit')}}" enctype="multipart/form-data">
            @csrf
            <!-- Profile Photo -->
            <div class="flex items-center space-x-6">
                <div class="relative group">
                    <img class="h-24 w-24 rounded-full object-cover ring-4 ring-indigo-100"
                         src="https://i.pravatar.cc/150?img=4" alt="Profile">
                    <label class="absolute inset-0 rounded-full bg-black/40 opacity-0 group-hover:opacity-100
                                    transition-opacity duration-200 flex items-center justify-center cursor-pointer">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <input type="file" class="hidden" accept="image/*">
                    </label>
                </div>
                <p class="text-sm text-gray-500">Click the image to change your profile photo</p>
            </div>

            <!-- Basic Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">name</label>
                    <input name="name" value="{{$user->name}}" type="text" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2
                                                focus:ring-indigo-400 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">nickname</label>
                    <input name="nickname" value="{{$user->nickname}}" type="text" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2
                                                focus:ring-indigo-400 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input name="email" value="{{$user->email}}" type="email" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2
                                                 focus:ring-indigo-400 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">profile pictures</label>
                    <input name="profile_photo"  type="file" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2
                                                 focus:ring-indigo-400 focus:border-transparent">
                </div>
            </div>

            <!-- Bio -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Bio</label>
                <textarea name="bio" value="{{$user->bio}}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-400
                                   focus:border-transparent h-32"></textarea>
            </div>

            <!-- Password Change -->
            <div class="border-t pt-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Change Password</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                        <input name="current_password" type="password" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2
                                                        focus:ring-indigo-400 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                        <input name="new_password" type="password" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2
                                                        focus:ring-indigo-400 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                        <input name="new_password" type="password" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2
                                                        focus:ring-indigo-400 focus:border-transparent">
                    </div>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex justify-end space-x-4">
                <button type="button" class="px-6 py-2.5 rounded-lg border border-gray-300 text-gray-700
                                                hover:bg-gray-50">Cancel</button>
                <button type="submit" class="px-6 py-2.5 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700
                                                transform transition hover:-translate-y-0.5 focus:ring-2
                                                focus:ring-indigo-500 focus:ring-offset-2">Save Changes</button>
            </div>
        </form>
    </div>
</main>
</body>
</html>
