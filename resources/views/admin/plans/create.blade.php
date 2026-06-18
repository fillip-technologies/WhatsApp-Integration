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
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-gray-50 to-purple-50 py-10">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">



            <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">

                {{-- Header --}}
                <div class="bg-gradient-to-r from-green-600 to-green-700 px-8 py-6">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-white/20 rounded-xl backdrop-blur-sm">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white">
                                Create Subscription Plan
                            </h2>
                            <p class="text-blue-100 text-sm mt-0.5">
                                Define a new pricing plan for your customers
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Form --}}
                <form action="{{ route('store.plan') }}" method="POST" class="p-8">
                    @csrf

                    {{-- Form Grid --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        {{-- Plan Name --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Plan Name <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <input type="text" name="name" placeholder="e.g. Pro Plan, Business Plan" value="{{ old('name') }}"
                                    class="w-full border-2 @error('name') border-red-600 @enderror border-gray-200 rounded-xl px-4 py-3.5 pl-11 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-blue-300">
                            </div>
                            <p class="text-xs text-red-600 mt-1.5">@error('name')
                          {{ $message }}
                            @enderror</p>
                        </div>

                        {{-- Price --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Price <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-400 font-bold text-lg">$</span>
                                </div>
                                <input type="number" name="price" placeholder="0.00" step="0.01" min="0"
                                    class="w-full border-2 border-gray-200 rounded-xl px-4 py-3.5 pl-9 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-blue-300">
                            </div>
                        </div>

                        {{-- Plan Type --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Plan Type <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                    </svg>
                                </div>
                                <select name="plans"
                                    class="w-full border-2 border-gray-200 rounded-xl px-4 py-3.5 pl-11 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent appearance-none transition-all duration-200 hover:border-blue-300">
                                    <option value="">Select Plan Type</option>
                                    <option value="Basic">⭐ Basic</option>
                                    <option value="Premium">💎 Premium</option>
                                    <option value="Enterprise">🏢 Enterprise</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        {{-- Message Limit --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Message Limit <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                    </svg>
                                </div>
                                <input type="number" name="message_limit" placeholder="e.g. 1000"
                                    class="w-full border-2 border-gray-200 rounded-xl px-4 py-3.5 pl-11 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-blue-300">
                            </div>
                            <p class="text-xs text-gray-400 mt-1.5">Maximum messages allowed per billing cycle</p>
                        </div>

                        {{-- Validity --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Validity (Days) <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <input type="number" name="validity_day" placeholder="e.g. 30"
                                    class="w-full border-2 border-gray-200 rounded-xl px-4 py-3.5 pl-11 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-blue-300">
                            </div>
                            <p class="text-xs text-gray-400 mt-1.5">Duration of the subscription plan in days</p>
                        </div>

                    </div>

                    {{-- Description --}}
                    <div class="mt-8">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Description
                        </label>
                        <div class="relative">
                            <div class="absolute top-3 left-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                                </svg>
                            </div>
                            <textarea name="description" rows="4" placeholder="Describe what this plan includes..."
                                class="w-full border-2 border-gray-200 rounded-xl px-4 py-3.5 pl-11 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-blue-300 resize-y"></textarea>
                        </div>
                    </div>

                    {{-- Features --}}
                    <div class="mt-8">
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700">
                                    Features
                                </label>
                                <p class="text-xs text-gray-400 mt-0.5">List the key features of this plan</p>
                            </div>
                            <button type="button" id="addFeature"
                                class="inline-flex items-center gap-2 bg-gradient-to-r from-green-500 to-emerald-500 hover:from-green-600 hover:to-emerald-600 text-white px-5 py-2.5 rounded-xl transition-all duration-200 shadow-sm hover:shadow-md transform hover:scale-[1.02]">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                                </svg>
                                Add Feature
                            </button>
                        </div>

                        <div id="featureContainer" class="space-y-3">
                            <div class="feature-row flex items-center gap-3 bg-gray-50 rounded-xl p-3 border-2 border-gray-200 hover:border-blue-300 transition-all duration-200">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <input type="text" name="feature[]" placeholder="Enter a feature"
                                    class="flex-1 border-0 bg-transparent px-2 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg text-gray-700 placeholder-gray-400">
                                <button type="button"
                                    class="removeFeature text-gray-400 hover:text-red-500 transition-colors duration-200 p-1 hover:bg-red-50 rounded-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">
                        <label for="" class="block text-sm font-semibold text-gray-700">Button</label>
                          <input type="text" name="button" placeholder="e.g. 30"
                                    class="w-full border-2 border-gray-200 rounded-xl px-4 py-3.5 pl-11 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-blue-300">
                    </div>

                    {{-- Divider --}}
                    <hr class="my-8 border-gray-200">

                    {{-- Submit --}}
                    <div class="flex items-center gap-4">
                        <button type="submit"
                            class="inline-flex items-center gap-2 bg-gradient-to-r from-green-600 to-green-700 hover:from-blue-700 hover:to-green-600 text-white px-10 py-3.5 rounded-xl font-semibold transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-[1.02]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Create Plan
                        </button>
                        <a href="#" class="text-gray-500 hover:text-gray-700 font-medium transition-colors duration-200 px-4 py-2 hover:bg-gray-100 rounded-lg">
                            Cancel
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script>
        document.getElementById('addFeature').addEventListener('click', function() {
            let html = `
            <div class="feature-row flex items-center gap-3 bg-gray-50 rounded-xl p-3 border-2 border-gray-200 hover:border-blue-300 transition-all duration-200 animate-fadeIn">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <input type="text" name="feature[]" placeholder="Enter a feature"
                    class="flex-1 border-0 bg-transparent px-2 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg text-gray-700 placeholder-gray-400">
                <button type="button"
                    class="removeFeature text-gray-400 hover:text-red-500 transition-colors duration-200 p-1 hover:bg-red-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        `;

            document.getElementById('featureContainer')
                .insertAdjacentHTML('beforeend', html);

            // Add animation class
            const lastRow = document.getElementById('featureContainer').lastElementChild;
            setTimeout(() => {
                lastRow.style.opacity = '1';
            }, 10);
        });

        document.addEventListener('click', function(e) {
            if (e.target.closest('.removeFeature')) {
                const row = e.target.closest('.feature-row');
                row.style.opacity = '0';
                row.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    row.remove();
                }, 200);
            }
        });
    </script>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        .animate-fadeIn {
            animation: fadeIn 0.2s ease-out forwards;
        }
        input:focus, select:focus, textarea:focus {
            outline: none;
        }
    </style>
@endsection
