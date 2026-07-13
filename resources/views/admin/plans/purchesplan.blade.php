@extends('admin.include.app')

@section('content')
    <div class="p-6">

        <div class="mb-6 flex flex-wrap items-center justify-between gap-4">

        </div>

        {{-- Filters --}}
         <form action="{{ route('subscriptionList') }}" method="GET">
        <div class="mb-6 flex flex-wrap items-center gap-3 rounded-lg bg-gray-50 p-4 dark:bg-gray-800">

                <div class="flex items-center gap-2">
                    <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Status:</label>
                    <select name="status" onchange="form.submit()"
                        class="rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                        <option value="">All</option>
                        <option value="active">Active</option>
                        <option value="pending">Pending</option>
                        <option value="expired">Expired</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                <div class="flex items-center gap-2">
                    <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Plan:</label>
                    <select name="plans" onchange="form.submit()"
                        class="rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                        <option value="">All Plans</option>
                        <option value="premium">Premium</option>
                        <option value="business">Business</option>
                        <option value="enterprise">Enterprise</option>
                        <option value="basic">Basic</option>
                    </select>
                </div>



        </div>
</form>
        {{-- Card Grid --}}
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($plans as $item)
                <div
                    class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm transition hover:shadow-md dark:border-gray-700 dark:bg-gray-800">
                    {{-- Plan Header --}}
                    <div class="bg-gradient-to-r from-indigo-500 to-purple-600 px-5 py-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-white/80">{{ $item->plan->name ?? 'Plan Name' }}</span>
                            <span class="rounded-full bg-white/20 px-3 py-0.5 text-xs font-semibold text-white">
                                {{ ucfirst($item->status) ?? 'Active' }}
                            </span>
                        </div>
                        <p class="mt-1 text-2xl font-bold text-white">
                            ${{ number_format($item->plan->price ?? 0, 2) }}
                            <span class="text-sm font-normal text-white/70">
                                {{ $item->plan->validity_day ?? 0 }} / {{ $item->plan->plan_type ?? 'Month' }}
                            </span>
                        </p>
                    </div>

                    {{-- User Details --}}
                    <div class="p-5">
                        <div class="flex items-center gap-4 border-b border-gray-100 pb-4 dark:border-gray-700">
                            <div
                                class="flex h-12 w-12 items-center justify-center rounded-full bg-indigo-100 text-indigo-600 dark:bg-indigo-900/30 dark:text-indigo-300">
                                <span class="text-sm font-bold">
                                    {{ $item->user->first_name ? substr($item->user->first_name, 0, 2) : 'U' }}
                                </span>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-gray-800 dark:text-white">
                                    {{ $item->user->first_name ?? 'User' }} {{ $items->user->last_name ?? 'name' }}
                                </h4>
                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                    {{ $item->user->email ?? 'user@example.com' }}
                                </p>
                                <div class="mt-1 flex items-center gap-2">
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-0.5 text-xs text-green-700 dark:bg-green-900/30 dark:text-green-300">
                                        <span class="inline-block h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                        Verified
                                    </span>
                                    <span class="text-xs text-gray-400 dark:text-gray-500">
                                        ID: #{{ $item->user->id ?? 'N/A' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- Plan Details --}}
                        <div class="mt-4 space-y-2">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500 dark:text-gray-400">Billing cycle</span>
                                <span class="font-medium text-gray-800 dark:text-white">
                                    {{ ucfirst($item->plan->plan_type ?? 'Monthly') }}
                                </span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500 dark:text-gray-400">Purchased Date</span>
                                <span class="font-medium text-gray-800 dark:text-white">
                                    {{ $item->created_at ? $item->created_at->format('M d, Y') : 'N/A' }}
                                </span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500 dark:text-gray-400">Expiry Date</span>
                                <span class="font-medium text-gray-800 dark:text-white">
                                    {{ $item->end_date ? \Carbon\Carbon::parse($item->end_date)->format('M d, Y') : 'N/A' }}
                                </span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500 dark:text-gray-400">Features</span>
                                <span class="font-medium text-gray-800 dark:text-white">
                                    {{ $item->plan->features ?? 'Standard' }}
                                </span>
                            </div>
                        </div>

                        {{-- Delete & Invoice Buttons Only --}}
                        <div class="mt-5 flex gap-2">
                            <button
                                class="flex-1 rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 inline h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 17V7m0 10a2 2 0 01-2-2V9a2 2 0 012-2m6 10V7m0 10a2 2 0 01-2-2V9a2 2 0 012-2" />
                                </svg>
                                Invoice
                            </button>
                            <form action="" method="POST" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-full rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                                    onclick="return confirm('Are you sure you want to delete this purchase?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 inline h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                {{-- Empty State --}}
                <div class="col-span-full">
                    <div
                        class="flex flex-col items-center justify-center rounded-xl border-2 border-dashed border-gray-300 bg-gray-50 p-12 dark:border-gray-600 dark:bg-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 dark:text-gray-500"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <h3 class="mt-4 text-lg font-medium text-gray-700 dark:text-gray-300">No purchases found</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Try adjusting your filters or add a new
                            purchase.</p>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-6 flex items-center justify-between border-t border-gray-200 pt-6 dark:border-gray-700">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Showing <span class="font-medium">{{ $plans->firstItem() ?? 0 }}</span> to <span
                    class="font-medium">{{ $plans->lastItem() ?? 0 }}</span> of <span
                    class="font-medium">{{ $plans->total() ?? 0 }}</span> results
            </p>
            <div class="flex gap-1">
                @if ($plans->onFirstPage())
                    <span
                        class="rounded-lg border border-gray-300 px-3 py-1 text-sm text-gray-400 dark:border-gray-600 dark:text-gray-500 cursor-not-allowed">Previous</span>
                @else
                    <a href="{{ $plans->previousPageUrl() }}"
                        class="rounded-lg border border-gray-300 px-3 py-1 text-sm text-gray-600 transition hover:bg-gray-50 dark:border-gray-600 dark:text-gray-400 dark:hover:bg-gray-700">Previous</a>
                @endif

                @foreach ($plans->getUrlRange(1, $plans->lastPage()) as $page => $url)
                    @if ($page == $plans->currentPage())
                        <span class="rounded-lg bg-indigo-600 px-3 py-1 text-sm text-white">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}"
                            class="rounded-lg border border-gray-300 px-3 py-1 text-sm text-gray-600 transition hover:bg-gray-50 dark:border-gray-600 dark:text-gray-400 dark:hover:bg-gray-700">{{ $page }}</a>
                    @endif
                @endforeach

                @if ($plans->hasMorePages())
                    <a href="{{ $plans->nextPageUrl() }}"
                        class="rounded-lg border border-gray-300 px-3 py-1 text-sm text-gray-600 transition hover:bg-gray-50 dark:border-gray-600 dark:text-gray-400 dark:hover:bg-gray-700">Next</a>
                @else
                    <span
                        class="rounded-lg border border-gray-300 px-3 py-1 text-sm text-gray-400 dark:border-gray-600 dark:text-gray-500 cursor-not-allowed">Next</span>
                @endif
            </div>
        </div>
    </div>
@endsection
