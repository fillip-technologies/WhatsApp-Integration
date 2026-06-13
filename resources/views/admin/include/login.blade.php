<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-slate-700 via-slate-800 to-slate-900 min-h-screen">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div
            class="max-w-md w-full space-y-8 bg-white rounded-2xl shadow-2xl p-8 transform transition-all duration-500 hover:scale-105">
            <div>
                <div class="flex justify-center">
                    <div
                        class="h-20 w-20 bg-gradient-to-br from-slate-700 via-slate-800 to-slate-900 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="h-12 w-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                </div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    User Portal
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Sign in to access your dashboard
                </p>
            </div>

            @if (session('success'))
                <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded-md">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded-md">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            @foreach ($errors->all() as $error)
                                <p class="text-sm text-red-700">{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <form class="mt-8 space-y-6" method="POST" action="">
                @csrf

                <div class="space-y-5">

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-2">
                            Email Address
                        </label>

                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                            </div>

                            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                autofocus placeholder="Enter your email"
                                class="w-full pl-10 pr-4 py-3 border border-slate-300 rounded-xl
                    focus:outline-none focus:ring-2 focus:ring-blue-700
                    focus:border-blue-700 transition-all duration-300">
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-700 mb-2">
                            Password
                        </label>

                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2V7a3 3 0 00-6 0v2h6z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>

                            <input type="password" id="password" name="password" required placeholder="••••••••"
                                class="w-full pl-10 pr-4 py-3 border border-slate-300 rounded-xl
                    focus:outline-none focus:ring-2 focus:ring-blue-700
                    focus:border-blue-700 transition-all duration-300">
                        </div>
                    </div>

                </div>

                <!-- Remember & Forgot -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember"
                            class="h-4 w-4 text-blue-700 border-slate-300 rounded focus:ring-blue-600">

                        <label for="remember" class="ml-2 text-sm text-slate-600">
                            Remember me
                        </label>
                    </div>

                    <a href="#" class="text-sm font-medium text-slate-900 hover:text-slate-700 transition">
                        Forgot Password?
                    </a>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="group relative flex w-full justify-center items-center py-3 px-4
        rounded-xl text-white font-semibold tracking-wide
        bg-gradient-to-r from-slate-800 to-blue-900
        hover:from-slate-900 hover:to-blue-950
        shadow-lg hover:shadow-xl
        transition-all duration-300">

                    <svg class="h-5 w-5 mr-2 text-blue-300 group-hover:text-blue-200" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2V7a3 3 0 00-6 0v2h6z"
                            clip-rule="evenodd" />
                    </svg>

                    Sign In
                </button>
            </form>
<div class="text-center pt-4 border-t border-slate-200">
    <p class="text-sm text-slate-600">
        Don't have an account?
        <a href="{{ route('register') }}"
            class="font-semibold text-slate-800 hover:text-slate-900 transition duration-300">
            Create Account
        </a>
    </p>
</div>
            <div class="mt-6 text-center">
                <p class="text-xs text-gray-500">
                    Secure admin access only
                </p>
            </div>
        </div>
    </div>
</body>

</html>
