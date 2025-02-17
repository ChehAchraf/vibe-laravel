@extends('layouts.background')
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
            <h2 class="mt-6 text-2xl font-bold text-gray-900">Welcome back</h2>
            <p class="mt-2 text-gray-600">Please sign in to your account</p>
        </div>

        <form class="mt-8 space-y-6" method="POST" action="{{route('login')}}">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input name="email" type="email" required value="{{ old('email') }}"
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-400 
                                  focus:border-transparent">
                </div>
                @error('email')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input name="password" type="password" required 
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-400 
                                  focus:border-transparent">
                </div>
                @error('password')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-400 border-gray-300 rounded">
                    <label class="ml-2 block text-sm text-gray-700">Remember me</label>
                </div>
                <a href="#" class="text-sm text-indigo-600 hover:text-indigo-500">Forgot password?</a>
            </div>

            <button type="submit" 
                    class="w-full py-3 px-4 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 
                           transform transition hover:-translate-y-0.5 focus:ring-2 focus:ring-indigo-500 
                           focus:ring-offset-2">
                Sign in
            </button>

            <p class="text-center text-sm text-gray-600">
                Don't have an account? 
                <a href="{{route('register.form')}}" class="font-medium text-indigo-600 hover:text-indigo-500">Sign up</a>
            </p>
        </form>
</div>
