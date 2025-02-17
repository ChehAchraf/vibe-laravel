<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email - Vibe</title>
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
<body class="gradient-bg min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white rounded-xl shadow-lg p-8">
        <!-- Logo -->
        <div class="text-center">
            <h1 class="text-3xl font-bold text-indigo-600 flex items-center justify-center">
                <svg class="w-8 h-8 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                </svg>
                Vibe
            </h1>
            
            <!-- Email Verification Icon -->
            <div class="mt-6 flex justify-center">
                <div class="rounded-full bg-indigo-100 p-4">
                    <svg class="w-12 h-12 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>

            <h2 class="mt-6 text-2xl font-bold text-gray-900">Verify your email</h2>
            <p class="mt-2 text-gray-600">We've sent a verification link to</p>
            <p class="text-indigo-600 font-medium">john.doe@example.com</p>
        </div>

        <!-- Verification Status -->
        <div class="bg-indigo-50 rounded-lg p-4 mt-6">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-indigo-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p class="text-sm text-indigo-700">
                    Please check your email and click on the verification link to continue.
                </p>
            </div>
        </div>

        <!-- Actions -->
        <div class="space-y-4">
            <button type="button" 
                    class="w-full py-3 px-4 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 
                           transform transition hover:-translate-y-0.5 focus:ring-2 focus:ring-indigo-500 
                           focus:ring-offset-2 flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                Resend verification email
            </button>

            <div class="text-center">
                <button type="button" class="text-sm text-gray-600 hover:text-indigo-600">
                    Change email address
                </button>
            </div>
        </div>

        <!-- Help Text -->
        <div class="mt-6 text-center text-sm text-gray-600">
            <p>Didn't receive the email? Check your spam folder or</p>
            <button class="text-indigo-600 hover:text-indigo-500 font-medium">contact support</button>
        </div>

        <!-- Back to Login -->
        <div class="border-t pt-6 text-center">
            <a href="{{route('login.form')}}" class="text-sm text-indigo-600 hover:text-indigo-500 font-medium flex items-center justify-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to login
            </a>
        </div>
    </div>
</body>
</html> 