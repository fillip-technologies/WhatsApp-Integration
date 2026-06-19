@extends('admin.include.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Page Header -->
        <div class="grid md:grid-cols-2 lg:grid-cols-2 grid-cols-1 mb-6 items-center">

            <div>
                <h1 class="text-3xl font-bold text-gray-900">User Details</h1>
                <p class="text-sm text-gray-500 mt-1">
                    View complete information about the user
                </p>
            </div>

            <div class="flex justify-end gap-3 mt-4 md:mt-0">

                <a href=""
                    class="inline-flex items-center px-4 py-2.5 bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium rounded-lg transition duration-150 shadow-sm hover:shadow-md">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Users
                </a>
                @if (isset($viewdata))
                    <a href="{{ route('invoicedata', $viewdata->user->id ?? 'NA') }}"
                        class="inline-flex items-center px-4 py-2.5 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition duration-150 shadow-sm hover:shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 16V4m0 12l-4-4m4 4l4-4M4 20h16" />
                        </svg>
                        Generate Invoice
                    </a>
                @endif


            </div>

        </div>

        @if (isset($viewdata) && $viewdata)
            <!-- User Information Section -->
            <div class="bg-white rounded-xl shadow-lg mb-8 overflow-hidden border border-gray-100">
                <div class="px-6 py-4 bg-gradient-to-r from-indigo-600 to-indigo-700 border-b border-indigo-700">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-indigo-500 flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h6 class="text-lg font-semibold text-white">User Information</h6>
                    </div>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h5 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Personal Details
                            </h5>
                            <div class="space-y-3">
                                <div class="flex items-start border-b border-gray-100 pb-3">
                                    <span class="text-sm font-medium text-gray-500 w-32">First Name</span>
                                    <span
                                        class="text-sm text-gray-900 font-medium">{{ $viewdata->user->first_name ?? 'N/A' }}</span>
                                </div>
                                <div class="flex items-start border-b border-gray-100 pb-3">
                                    <span class="text-sm font-medium text-gray-500 w-32">Last Name</span>
                                    <span
                                        class="text-sm text-gray-900 font-medium">{{ $viewdata->user->last_name ?? 'N/A' }}</span>
                                </div>
                                <div class="flex items-start border-b border-gray-100 pb-3">
                                    <span class="text-sm font-medium text-gray-500 w-32">Company Name</span>
                                    <span
                                        class="text-sm text-gray-900 font-medium">{{ $viewdata->user->company_name ?? 'N/A' }}</span>
                                </div>
                                <div class="flex items-start border-b border-gray-100 pb-3">
                                    <span class="text-sm font-medium text-gray-500 w-32">Email</span>
                                    <span
                                        class="text-sm text-gray-900 font-medium">{{ $viewdata->user->email ?? 'N/A' }}</span>
                                </div>
                                <div class="flex items-start">
                                    <span class="text-sm font-medium text-gray-500 w-32">Phone</span>
                                    <span
                                        class="text-sm text-gray-900 font-medium">{{ $viewdata->user->phone ?? 'N/A' }}</span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h5 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Account Details
                            </h5>
                            <div class="space-y-3">
                                <div class="flex items-start border-b border-gray-100 pb-3">
                                    <span class="text-sm font-medium text-gray-500 w-32">Role</span>
                                    <span
                                        class="text-sm text-gray-900 font-medium">{{ $viewdata->user->role ?? 'N/A' }}</span>
                                </div>
                                <div class="flex items-start border-b border-gray-100 pb-3">
                                    <span class="text-sm font-medium text-gray-500 w-32">Plan Type</span>
                                    <span
                                        class="text-sm text-gray-900 font-medium">{{ $viewdata->user->plan_type ?? 'N/A' }}</span>
                                </div>
                                <div class="flex items-start border-b border-gray-100 pb-3">
                                    <span class="text-sm font-medium text-gray-500 w-32">Business Type</span>
                                    <span
                                        class="text-sm text-gray-900 font-medium">{{ $viewdata->user->business_type ?? 'N/A' }}</span>
                                </div>
                                <div class="flex items-start border-b border-gray-100 pb-3">
                                    <span class="text-sm font-medium text-gray-500 w-32">Status</span>
                                    <span>
                                        @if (isset($viewdata->user->is_active))
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $viewdata->user->is_active == 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                <span
                                                    class="w-1.5 h-1.5 rounded-full {{ $viewdata->user->is_active == 'active' ? 'bg-green-500' : 'bg-red-500' }} mr-1.5"></span>
                                                {{ $viewdata->user->is_active == 'active' ? 'Active' : 'Inactive' }}
                                            </span>
                                        @else
                                            N/A
                                        @endif
                                    </span>
                                </div>
                                <div class="flex items-start">
                                    <span class="text-sm font-medium text-gray-500 w-32">Deleted At</span>
                                    <span
                                        class="text-sm text-gray-900 font-medium">{{ $viewdata->user->deleted_at ?? 'Not Deleted' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 pt-4 border-t border-gray-200">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex items-center bg-gray-50 rounded-lg px-4 py-2.5">
                                <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span class="text-xs text-gray-500">Created</span>
                                <span class="text-sm text-gray-900 ml-2">{{ $viewdata->user->created_at ?? 'N/A' }}</span>
                            </div>
                            <div class="flex items-center bg-gray-50 rounded-lg px-4 py-2.5">
                                <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                    </path>
                                </svg>
                                <span class="text-xs text-gray-500">Updated</span>
                                <span class="text-sm text-gray-900 ml-2">{{ $viewdata->user->updated_at ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Plan Details Section -->
            <div class="bg-white rounded-xl shadow-lg mb-8 overflow-hidden border border-gray-100">
                <div class="px-6 py-4 bg-gradient-to-r from-purple-600 to-purple-700 border-b border-purple-700">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-purple-500 flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                </path>
                            </svg>
                        </div>
                        <h6 class="text-lg font-semibold text-white">Plan Details</h6>
                    </div>
                </div>
                <div class="p-6 overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 border-b-2 border-gray-200">
                                <th
                                    class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Name</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Price</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Description</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Plans</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Message Limit</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Validity Day</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Feature</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Button</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition duration-150">
                                <td class="px-4 py-3 text-sm text-gray-900 font-medium">
                                    {{ $viewdata->plan->name ?? 'N/A' }}</td>
                                <td class="px-4 py-3 text-sm text-gray-900">
                                    @if (isset($viewdata->plan->price))
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full bg-green-100 text-green-800 text-xs font-medium">
                                            ${{ $viewdata->plan->price }}
                                        </span>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ $viewdata->plan->description ?? 'N/A' }}
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-900">{{ $viewdata->plan->plans ?? 'N/A' }}</td>
                                <td class="px-4 py-3 text-sm text-gray-900">{{ $viewdata->plan->message_limit ?? 'N/A' }}
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-900">{{ $viewdata->plan->validity_day ?? 'N/A' }}
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-900">
                                    @if (isset($viewdata->plan->feature) && is_array($viewdata->plan->feature))
                                        <div class="flex flex-wrap gap-1">
                                            @foreach ($viewdata->plan->feature as $item)
                                                <span
                                                    class="inline-flex items-center px-2 py-0.5 rounded text-xs bg-blue-100 text-blue-800">
                                                    {{ $item }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-900">
                                    @if (isset($viewdata->plan->button))
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full bg-indigo-100 text-indigo-800 text-xs font-medium">
                                            {{ $viewdata->plan->button }}
                                        </span>
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Payment Details Section -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                <div class="px-6 py-4 bg-gradient-to-r from-emerald-600 to-emerald-700 border-b border-emerald-700">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-emerald-500 flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                </path>
                            </svg>
                        </div>
                        <h6 class="text-lg font-semibold text-white">Payment Details</h6>
                    </div>
                </div>
                <div class="p-6 overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 border-b-2 border-gray-200">
                                <th
                                    class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    User ID</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Plan ID</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Razorpay Order ID</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Razorpay Payment ID</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Razorpay Signature</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Amount</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Currency</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Status</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Remarks</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Paid At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition duration-150">
                                <td class="px-4 py-3 text-sm text-gray-900">{{ $viewdata->user_id ?? 'N/A' }}</td>
                                <td class="px-4 py-3 text-sm text-gray-900">{{ $viewdata->plan_id ?? 'N/A' }}</td>
                                <td class="px-4 py-3 text-sm text-gray-900 font-mono text-xs">
                                    {{ $viewdata->razorpay_order_id ?? 'N/A' }}</td>
                                <td class="px-4 py-3 text-sm text-gray-900 font-mono text-xs">
                                    {{ $viewdata->razorpay_payment_id ?? 'N/A' }}</td>
                                <td class="px-4 py-3 text-sm text-gray-900 font-mono text-xs">
                                    {{ $viewdata->razorpay_signature ?? 'N/A' }}</td>
                                <td class="px-4 py-3 text-sm text-gray-900 font-bold">
                                    @if (isset($viewdata->amount))
                                        <span class="text-emerald-600">${{ number_format($viewdata->amount, 2) }}</span>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-900">{{ $viewdata->currency ?? 'N/A' }}</td>
                                <td class="px-4 py-3">
                                    @if (isset($viewdata->status))
                                        @php
                                            $statusColors = [
                                                'success' => 'bg-green-100 text-green-800',
                                                'pending' => 'bg-yellow-100 text-yellow-800',
                                                'failed' => 'bg-red-100 text-red-800',
                                                'cancelled' => 'bg-gray-100 text-gray-800',
                                            ];
                                            $color = $statusColors[$viewdata->status] ?? 'bg-gray-100 text-gray-800';
                                        @endphp
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $color }}">
                                            <span
                                                class="w-1.5 h-1.5 rounded-full mr-1.5 {{ $viewdata->status == 'success' ? 'bg-green-500' : ($viewdata->status == 'pending' ? 'bg-yellow-500' : 'bg-red-500') }}"></span>
                                            {{ ucfirst($viewdata->status) }}
                                        </span>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ $viewdata->remarks ?? 'N/A' }}</td>
                                <td class="px-4 py-3 text-sm text-gray-900">{{ $viewdata->paid_at ?? 'N/A' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="bg-yellow-50 border-l-4 border-yellow-400 rounded-lg p-4">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-yellow-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                        </path>
                    </svg>
                    <p class="text-sm text-yellow-700">No details found for this user.</p>
                </div>
            </div>
        @endif
    </div>
@endsection
