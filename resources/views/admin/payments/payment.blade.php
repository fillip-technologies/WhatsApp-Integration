@extends('admin.include.app')
@section('content')
<div class="container mx-auto px-4 py-8">
    {{-- Page Header with Filters --}}
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Payment Management</h1>
                <p class="text-gray-600">View and manage all user payments and subscriptions</p>
            </div>
            <div class="mt-4 md:mt-0 flex flex-wrap gap-3">
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Add Payment
                </button>
                <button class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition duration-200 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                    </svg>
                    Export
                </button>
            </div>
        </div>

        {{-- Search and Filters --}}
        <div class="mt-6 flex flex-col md:flex-row gap-4">
            <div class="flex-1 relative">
                <input type="text" placeholder="Search by name, email, or transaction ID..." 
                       class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
            <div class="flex flex-wrap gap-3">
                <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">All Status</option>
                    <option value="paid">Paid</option>
                    <option value="pending">Pending</option>
                    <option value="failed">Failed</option>
                    <option value="refunded">Refunded</option>
                </select>
                <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">All Plans</option>
                    <option value="basic">Basic</option>
                    <option value="pro">Pro</option>
                    <option value="premium">Premium</option>
                    <option value="enterprise">Enterprise</option>
                </select>
                <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition duration-200">
                    Apply Filters
                </button>
            </div>
        </div>
    </div>

    {{-- Summary Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-lg shadow p-4 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Total Revenue</p>
                    <p class="text-2xl font-bold text-gray-800">$12,847</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm2 4a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4z"/>
                        <path d="M8 8h8v2H8V8z"/>
                    </svg>
                </div>
            </div>
            <p class="text-xs text-green-600 mt-2">↑ 12.5% from last month</p>
        </div>
        
        <div class="bg-white rounded-lg shadow p-4 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Active Subscriptions</p>
                    <p class="text-2xl font-bold text-gray-800">342</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zm8 0a3 3 0 11-6 0 3 3 0 016 0zm-4 7a4 4 0 00-8 0v3h8v-3z"/>
                    </svg>
                </div>
            </div>
            <p class="text-xs text-blue-600 mt-2">↑ 8.3% from last month</p>
        </div>
        
        <div class="bg-white rounded-lg shadow p-4 border-l-4 border-yellow-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Pending Payments</p>
                    <p class="text-2xl font-bold text-gray-800">23</p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
            <p class="text-xs text-yellow-600 mt-2">↓ 2.1% from last month</p>
        </div>
        
        <div class="bg-white rounded-lg shadow p-4 border-l-4 border-red-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Failed Payments</p>
                    <p class="text-2xl font-bold text-gray-800">8</p>
                </div>
                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
            <p class="text-xs text-red-600 mt-2">↑ 3.5% from last month</p>
        </div>
    </div>

    {{-- Payments Table --}}
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <input type="checkbox" class="rounded border-gray-300">
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            User & Plan
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Transaction
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Amount
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    {{-- Payment Row 1 - Paid --}}
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4">
                            <input type="checkbox" class="rounded border-gray-300">
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                    <span class="text-sm font-bold text-blue-600">JD</span>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">John Doe</p>
                                    <p class="text-xs text-gray-500">john.doe@email.com</p>
                                    <span class="inline-block mt-1 px-2 py-0.5 text-xs font-semibold bg-purple-100 text-purple-800 rounded">
                                        Premium Pro
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm text-gray-900">#TXN-78901234</p>
                            <p class="text-xs text-gray-500">Visa **** 4242</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm font-medium text-gray-900">$29.99</p>
                            <p class="text-xs text-gray-500">Monthly</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1.5"></span>
                                Paid
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm text-gray-900">Jul 15, 2026</p>
                            <p class="text-xs text-gray-500">2 days ago</p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <button class="text-blue-600 hover:text-blue-900">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                                <button class="text-gray-600 hover:text-gray-900">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- Payment Row 2 - Pending --}}
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4">
                            <input type="checkbox" class="rounded border-gray-300">
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center">
                                    <span class="text-sm font-bold text-purple-600">SM</span>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">Sarah Miller</p>
                                    <p class="text-xs text-gray-500">sarah.m@email.com</p>
                                    <span class="inline-block mt-1 px-2 py-0.5 text-xs font-semibold bg-indigo-100 text-indigo-800 rounded">
                                        Pro Plus
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm text-gray-900">#TXN-78901235</p>
                            <p class="text-xs text-gray-500">PayPal</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm font-medium text-gray-900">$49.99</p>
                            <p class="text-xs text-gray-500">Monthly</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">
                                <span class="w-1.5 h-1.5 bg-yellow-500 rounded-full mr-1.5 animate-pulse"></span>
                                Pending
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm text-gray-900">Jul 14, 2026</p>
                            <p class="text-xs text-gray-500">1 day ago</p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <button class="text-blue-600 hover:text-blue-900">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                                <button class="text-gray-600 hover:text-gray-900">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- Payment Row 3 - Failed --}}
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4">
                            <input type="checkbox" class="rounded border-gray-300">
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-red-100 flex items-center justify-center">
                                    <span class="text-sm font-bold text-red-600">RW</span>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">Robert Wilson</p>
                                    <p class="text-xs text-gray-500">robert.w@email.com</p>
                                    <span class="inline-block mt-1 px-2 py-0.5 text-xs font-semibold bg-blue-100 text-blue-800 rounded">
                                        Basic
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm text-gray-900">#TXN-78901236</p>
                            <p class="text-xs text-gray-500">Visa **** 1234</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm font-medium text-gray-900">$9.99</p>
                            <p class="text-xs text-gray-500">Monthly</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                                <span class="w-1.5 h-1.5 bg-red-500 rounded-full mr-1.5"></span>
                                Failed
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm text-gray-900">Jul 12, 2026</p>
                            <p class="text-xs text-gray-500">3 days ago</p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <button class="text-blue-600 hover:text-blue-900">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                                <button class="text-gray-600 hover:text-gray-900">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                    </svg>
                                </button>
                                <button class="text-green-600 hover:text-green-900">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- Payment Row 4 - Refunded --}}
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4">
                            <input type="checkbox" class="rounded border-gray-300">
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-green-100 flex items-center justify-center">
                                    <span class="text-sm font-bold text-green-600">EJ</span>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">Emily Johnson</p>
                                    <p class="text-xs text-gray-500">emily.j@email.com</p>
                                    <span class="inline-block mt-1 px-2 py-0.5 text-xs font-semibold bg-yellow-100 text-yellow-800 rounded">
                                        Enterprise
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm text-gray-900">#TXN-78901237</p>
                            <p class="text-xs text-gray-500">Amex **** 5678</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm font-medium text-gray-900">$99.99</p>
                            <p class="text-xs text-gray-500">Annually</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-800">
                                <span class="w-1.5 h-1.5 bg-gray-500 rounded-full mr-1.5"></span>
                                Refunded
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm text-gray-900">Jul 10, 2026</p>
                            <p class="text-xs text-gray-500">5 days ago</p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <button class="text-blue-600 hover:text-blue-900">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                                <button class="text-gray-600 hover:text-gray-900">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- Payment Row 5 - Paid with avatar initials --}}
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4">
                            <input type="checkbox" class="rounded border-gray-300">
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-pink-100 flex items-center justify-center">
                                    <span class="text-sm font-bold text-pink-600">AK</span>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">Amanda King</p>
                                    <p class="text-xs text-gray-500">amanda.k@email.com</p>
                                    <span class="inline-block mt-1 px-2 py-0.5 text-xs font-semibold bg-purple-100 text-purple-800 rounded">
                                        Premium Pro
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm text-gray-900">#TXN-78901238</p>
                            <p class="text-xs text-gray-500">Stripe</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm font-medium text-gray-900">$29.99</p>
                            <p class="text-xs text-gray-500">Monthly</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1.5"></span>
                                Paid
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm text-gray-900">Jul 8, 2026</p>
                            <p class="text-xs text-gray-500">1 week ago</p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <button class="text-blue-600 hover:text-blue-900">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                                <button class="text-gray-600 hover:text-gray-900">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="px-6 py-4 border-t border-gray-200 flex flex-col sm:flex-row items-center justify-between">
            <p class="text-sm text-gray-700">
                Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of <span class="font-medium">342</span> results
            </p>
            <div class="flex space-x-2 mt-4 sm:mt-0">
                <button class="px-3 py-1 border border-gray-300 rounded hover:bg-gray-50 text-sm text-gray-700">Previous</button>
                <button class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm">1</button>
                <button class="px-3 py-1 border border-gray-300 rounded hover:bg-gray-50 text-sm text-gray-700">2</button>
                <button class="px-3 py-1 border border-gray-300 rounded hover:bg-gray-50 text-sm text-gray-700">3</button>
                <span class="px-3 py-1 text-sm text-gray-700">...</span>
                <button class="px-3 py-1 border border-gray-300 rounded hover:bg-gray-50 text-sm text-gray-700">68</button>
                <button class="px-3 py-1 border border-gray-300 rounded hover:bg-gray-50 text-sm text-gray-700">Next</button>
            </div>
        </div>
    </div>

    {{-- Bulk Actions --}}
    <div class="mt-4 flex flex-wrap items-center gap-3 bg-gray-50 rounded-lg p-4">
        <p class="text-sm text-gray-700 font-medium">Bulk Actions:</p>
        <button class="px-4 py-1.5 text-sm bg-green-600 text-white rounded hover:bg-green-700 transition duration-200">
            Mark as Paid
        </button>
        <button class="px-4 py-1.5 text-sm bg-yellow-600 text-white rounded hover:bg-yellow-700 transition duration-200">
            Send Reminder
        </button>
        <button class="px-4 py-1.5 text-sm bg-red-600 text-white rounded hover:bg-red-700 transition duration-200">
            Cancel Selected
        </button>
        <button class="px-4 py-1.5 text-sm bg-gray-600 text-white rounded hover:bg-gray-700 transition duration-200">
            Export Selected
        </button>
    </div>
</div>
@endsection