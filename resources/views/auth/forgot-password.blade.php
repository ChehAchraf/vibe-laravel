<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Vibe</title>
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
                    <h1 class="text-3xl font-bold text-gray-900">Forgot Password?</h1>
                    <p class="text-gray-600 mt-2">Enter your email to receive a password reset link</p>
                </div>

                @if (session('status'))
                    <div class="mb-4 p-4 rounded-lg bg-green-50 text-green-700">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                    @csrf
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

                    <button type="submit" 
                            class="w-full py-2.5 px-4 border border-transparent rounded-lg text-white 
                                   gradient-bg hover:opacity-90 focus:outline-none focus:ring-2 
                                   focus:ring-offset-2 focus:ring-indigo-500 transition-all">
                        Send Reset Link
                    </button>

                    <div class="text-center">
                        <a href="{{ route('login') }}" 
                           class="text-sm text-indigo-600 hover:text-indigo-500">
                            Back to Login
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html> 