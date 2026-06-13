<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
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
            class=" w-500 space-y-8 bg-white rounded-2xl shadow-2xl p-8 transform transition-all duration-500 hover:scale-105">
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
                   Create Account
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

            <form method="POST" action="" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                    <!-- First Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            First Name
                        </label>
                        <input type="text" name="first_name"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                            placeholder="John">
                    </div>

                    <!-- Last Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Last Name
                        </label>
                        <input type="text" name="last_name"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                            placeholder="Doe">
                    </div>

                    <!-- Company Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Company Name
                        </label>
                        <input type="text" name="company_name"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                            placeholder="ABC Technologies">
                    </div>
                </div>

                <div class="grid md:grid-cols-3 lg:grid-cols-3 grid-cols-1 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Mobile Number
                        </label>
                        <input type="text" name="phone"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                            placeholder="+91 9876543210">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Email Address
                        </label>
                        <input type="email" name="email"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                            placeholder="john@example.com">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Business Type
                        </label>
                        <select name="business_type"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none">
                            <option value="">Select Business Type</option>
                            <option>E-commerce</option>
                            <option>Education</option>
                            <option>Healthcare</option>
                            <option>Real Estate</option>
                            <option>Marketing Agency</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div>

                <!-- Email -->


                <!-- Business Type -->


                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <!-- Password -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Password
                        </label>
                        <input type="password" name="password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                            placeholder="********">
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Confirm Password
                        </label>
                        <input type="password" name="password_confirmation"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                            placeholder="********">
                    </div>

                </div>

                <!-- Terms -->
                <div class="flex items-center">
                    <input type="checkbox" name="terms" class="h-4 w-4 text-primary rounded">
                    <label class="ml-2 text-sm text-gray-600">
                        I agree to the Terms & Conditions
                    </label>
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full py-3 rounded-lg bg-gradient-to-r from-primary to-indigo-600 text-white font-semibold hover:opacity-90 transition">
                    Create Account
                </button>

            </form>

            <div class="mt-6 text-center">
                <p class="text-xs text-gray-500">
                    Secure admin access only
                </p>
            </div>
        </div>
    </div>
</body>

</html>
