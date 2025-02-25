<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Vibe</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full mx-4">
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="mb-8 text-center">
                    <h1 class="text-3xl font-bold text-gray-900">Reset Password</h1>
                    <p class="text-gray-600 mt-2">Create your new password</p>
                </div>

                <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <input type="email" name="email" required 
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 
                                      focus:ring-indigo-400 focus:border-transparent"
                               placeholder="Enter your email">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                        <input type="password" name="password" required 
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 
                                      focus:ring-indigo-400 focus:border-transparent"
                               placeholder="Enter new password">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                        <input type="password" name="password_confirmation" required 
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 
                                      focus:ring-indigo-400 focus:border-transparent"
                               placeholder="Confirm new password">
                    </div>

                    <button type="submit" 
                            class="w-full py-2.5 px-4 border border-transparent rounded-lg text-white 
                                   gradient-bg hover:opacity-90 focus:outline-none focus:ring-2 
                                   focus:ring-offset-2 focus:ring-indigo-500 transition-all">
                        Reset Password
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html> 