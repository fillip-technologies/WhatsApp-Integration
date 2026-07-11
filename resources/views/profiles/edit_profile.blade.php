@extends('admin.include.app')

@section('content')
@php
    $updateRoute = null;
    if(AdminLogin()){
    $updateRoute = route('admin.profile.update',$user->id);
    }elseif (UserLogin()) {
      $updateRoute = route('user.update',$user->id);
    }
@endphp
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Breadcrumb -->
        <nav class="flex items-center space-x-2 text-sm text-gray-500 mb-6">
            <a href="" class="hover:text-blue-600 transition">Dashboard</a>
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd" />
            </svg>
            <a href="" class="hover:text-blue-600 transition">User Profile</a>
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd" />
            </svg>
            <span class="text-gray-700 font-medium">Edit User</span>
        </nav>

        <!-- Edit Form -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-lg bg-blue-600 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Edit User: {{ $user->first_name }}
                        {{ $user->last_name }}</h3>
                </div>
                <a href=""
                    class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium rounded-lg transition duration-150">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Cancel
                </a>
            </div>

            <form action="{{ $updateRoute }}" method="POST" class="p-6 md:p-8">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Left Column - Personal Information -->
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Personal Information -->
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h4 class="text-sm font-semibold text-gray-700 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Personal Information
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">
                                        First Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="first_name" id="first_name"
                                        value="{{ old('first_name', $user->first_name) }}"
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('first_name') border-red-500 @enderror"
                                        required>
                                    @error('first_name')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">
                                        Last Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="last_name" id="last_name"
                                        value="{{ old('last_name', $user->last_name) }}"
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('last_name') border-red-500 @enderror"
                                        required>
                                    @error('last_name')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                                        Email Address <span class="text-red-500">*</span>
                                    </label>
                                    <input type="email" name="email" id="email"
                                        value="{{ old('email', $user->email) }}"
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror"
                                        required>
                                    @error('email')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone
                                        Number</label>
                                    <input type="text" name="phone" id="phone"
                                        value="{{ old('phone', $user->phone) }}" placeholder="+1 (555) 123-4567"
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('phone') border-red-500 @enderror">
                                    @error('phone')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Company Information -->
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h4 class="text-sm font-semibold text-gray-700 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                Company Information
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="company_name" class="block text-sm font-medium text-gray-700 mb-1">Company
                                        Name</label>
                                    <input type="text" name="company_name" id="company_name"
                                        value="{{ old('company_name', $user->company_name) }}"
                                        placeholder="Enter company name"
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('company_name') border-red-500 @enderror">
                                    @error('company_name')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="business_type"
                                        class="block text-sm font-medium text-gray-700 mb-1">Business Type</label>
                                    <select name="business_type" id="business_type"
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('business_type') border-red-500 @enderror">
                                        <option value="">Select Business Type</option>
                                        @foreach (BusinessType() as $item)
                                            <option value="{{ $item }}" @selected($user->business_type == $item)>{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    @error('business_type')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - System Settings -->
                    <div class="lg:col-span-1 space-y-6">
                        <!-- Role & Plan -->
                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-100">
                            <h4 class="text-sm font-semibold text-gray-700 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                Account Settings
                            </h4>

                            <div class="space-y-4">
                                <div>
                                    <label for="role"
                                        class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                                    <select name="role" id="role" disabled
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('role') border-red-500 @enderror">
                                        <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>
                                            User</option>
                                        <option value="admin"
                                            {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Administrator
                                        </option>
                                    </select>
                                    @error('role')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>


                            </div>
                        </div>

                        <!-- Account Status -->
                        <div class="bg-white border border-gray-200 rounded-xl p-6">
                            <h4 class="text-sm font-semibold text-gray-700 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Account Status
                            </h4>

                            <div class="space-y-4">
                                <div>
                                    <label for="is_active"
                                        class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                    <select name="is_active" id="is_active"
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('is_active') border-red-500 @enderror">
                                        <option value="active"
                                            {{ old('is_active', $user->is_active) == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive"
                                            {{ old('is_active', $user->is_active) == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                    @error('is_active')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="pt-3 border-t border-gray-200">
                                    <div class="flex items-center justify-between text-sm">
                                        <span class="text-gray-500">Email Verified</span>
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $user->email_verified_at ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ $user->email_verified_at ? '✓ Verified' : '⚠ Pending' }}
                                        </span>
                                    </div>
                                    <div class="flex items-center justify-between text-sm mt-2">
                                        <span class="text-gray-500">Member Since</span>
                                        <span
                                            class="text-gray-900 font-medium">{{ $user->created_at ? $user->created_at->format('M d, Y') : 'N/A' }}</span>
                                    </div>
                                    <div class="flex items-center justify-between text-sm mt-2">
                                        <span class="text-gray-500">Last Updated</span>
                                        <span
                                            class="text-gray-900 font-medium">{{ $user->updated_at ? $user->updated_at->format('M d, Y h:i A') : 'N/A' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="mt-8 pt-6 border-t border-gray-200 flex items-center justify-between">
                    <div class="text-sm text-gray-500">
                        <span class="text-red-500">*</span> Required fields
                    </div>
                    <div class="flex space-x-3">
                        <a href=""
                            class="inline-flex items-center px-6 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition duration-150">
                            Cancel
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition duration-150 shadow-sm hover:shadow-md">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Update User
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Success/Error Messages -->
    @if (session('success'))
        <div class="fixed top-4 right-4 z-50 animate-slide-in">
            <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-lg shadow-lg max-w-md">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-green-700">{{ session('success') }}</p>
                    </div>
                    <button onclick="this.parentElement.parentElement.parentElement.remove()" class="ml-auto pl-3">
                        <svg class="h-5 w-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="fixed top-4 right-4 z-50 animate-slide-in">
            <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-lg shadow-lg max-w-md">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-red-700">Please fix the errors below.</p>
                    </div>
                    <button onclick="this.parentElement.parentElement.parentElement.remove()" class="ml-auto pl-3">
                        <svg class="h-5 w-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    @endif

    <style>
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .animate-slide-in {
            animation: slideIn 0.3s ease-out forwards;
        }
    </style>
@endsection
