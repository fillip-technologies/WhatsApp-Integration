@extends('admin.include.app')
@section('content')

@if(session('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif

    @if(session('error'))
        <script>
            toastr.error("{{ session('error') }}");
        </script>
    @endif
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-blue-50/30 to-indigo-50/30 py-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header Section --}}
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <div>
                <div class="flex items-center gap-3">
                    <div class="p-2.5 bg-gradient-to-r from-green-600 to-green-700 rounded-xl shadow-lg shadow-blue-500/20">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                            Subscription Plans
                        </h1>
                        <p class="text-gray-500 text-sm mt-0.5">
                            Manage your subscription plans and pricing
                        </p>
                    </div>
                </div>
            </div>

            <a href="{{ route('create.plan') }}"
                class="inline-flex items-center gap-2 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-700 text-white px-6 py-3 rounded-xl font-medium transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-[1.02] group">
                <svg class="w-5 h-5 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                </svg>
                Add New Plan
            </a>
        </div>



        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse($plans as $plan)
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-blue-200 overflow-hidden transform hover:-translate-y-1">

                    {{-- Plan Header with Color Accent --}}
                    <div class="relative h-2 bg-gradient-to-r
                        @if($plan->plans == 'Basic') from-blue-400 to-blue-600
                        @elseif($plan->plans == 'Premium') from-purple-400 to-purple-600
                        @elseif($plan->plans == 'Enterprise') from-orange-400 to-orange-600
                        @else from-gray-400 to-gray-600 @endif">
                    </div>

                    <div class="p-6">

                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h2 class="text-xl font-bold text-gray-800 group-hover:text-blue-600 transition-colors">
                                    {{ $plan->name }}
                                </h2>
                                <span class="inline-flex items-center gap-1.5 mt-1 text-xs font-medium px-2.5 py-1 rounded-full
                                    @if($plan->plans == 'Basic') bg-blue-50 text-blue-700
                                    @elseif($plan->plans == 'Premium') bg-purple-50 text-purple-700
                                    @elseif($plan->plans == 'Enterprise') bg-orange-50 text-orange-700
                                    @else bg-gray-50 text-gray-700 @endif">
                                    @if($plan->plans == 'Basic') ⭐
                                    @elseif($plan->plans == 'Premium') 💎
                                    @elseif($plan->plans == 'Enterprise') 🏢
                                    @endif
                                    {{ $plan->plans }}
                                </span>
                            </div>

                            <div class="text-right">
                                <span class="text-2xl font-bold text-gray-800">₹{{ number_format($plan->price, 0) }}</span>
                                <span class="text-xs text-gray-400 block">/ month</span>
                            </div>
                        </div>

                        @if($plan->description)
                            <p class="text-gray-600 text-sm leading-relaxed mb-4 line-clamp-2">
                                {{ $plan->description }}
                            </p>
                        @endif

                        {{-- Plan Details --}}
                        <div class="bg-gray-50 rounded-xl p-4 space-y-2.5 mb-4">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600 text-sm flex items-center gap-2">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                    </svg>
                                    Message Limit
                                </span>
                                <span class="font-semibold text-gray-800">{{ number_format($plan->message_limit) }}</span>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-gray-600 text-sm flex items-center gap-2">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    Validity
                                </span>
                                <span class="font-semibold text-gray-800">{{ $plan->validity_day }} Days</span>
                            </div>
                        </div>


                        @if($plan->feature && count($plan->feature) > 0)
                            <div class="mb-5">
                                <h4 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2.5">
                                    Features
                                </h4>
                                <div class="space-y-1.5">
                                    @foreach($plan->feature as $feature)
                                        <div class="flex items-center gap-2 text-sm text-gray-700">
                                            <div class="flex-shrink-0 w-5 h-5 rounded-full bg-green-100 flex items-center justify-center">
                                                <svg class="w-3 h-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                                </svg>
                                            </div>
                                            <span class="truncate">{{ $feature }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- Actions --}}
                        <div class="flex gap-2 pt-3 border-t border-gray-100">
                            <a href="{{ route('edit.plan',$plan->id) }}"
                                class="flex-1 inline-flex items-center justify-center gap-2 bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2.5 rounded-xl font-medium transition-all duration-200 shadow-sm hover:shadow-md text-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Edit
                            </a>

                            <form action="{{ route('delete.plan',$plan->id) }}" method="POST" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('⚠️ Are you sure you want to delete this plan? This action cannot be undone.')"
                                    class="w-full inline-flex items-center justify-center gap-2 bg-red-500 hover:bg-red-600 text-white px-4 py-2.5 rounded-xl font-medium transition-all duration-200 shadow-sm hover:shadow-md text-sm group">
                                    <svg class="w-4 h-4 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
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
                    <div class="bg-white rounded-3xl shadow-lg p-16 text-center border-2 border-dashed border-gray-200">
                        <div class="w-24 h-24 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-700 mb-2">
                            No Plans Found
                        </h3>
                        <p class="text-gray-500 max-w-md mx-auto mb-6">
                            Get started by creating your first subscription plan. It's quick and easy to set up.
                        </p>
                        <a href="{{ route('create.plan') }}"
                            class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-8 py-3 rounded-xl font-medium transition-all duration-200 shadow-md hover:shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                            </svg>
                            Create Your First Plan
                        </a>
                    </div>
                </div>
            @endforelse

        </div>

        {{-- Pagination (if needed) --}}
        @if(method_exists($plans, 'links'))
            <div class="mt-8">
                {{ $plans->links() }}
            </div>
        @endif

    </div>
</div>

<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection
