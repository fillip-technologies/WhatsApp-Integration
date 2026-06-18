@extends('admin.include.app')
@section('content')
    @if (session('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif

    @if (session('error'))
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
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
                <form action="{{ route('update.plan', $plan->id) }}" method="POST"
                    class="bg-white rounded-2xl shadow-lg p-8"> @csrf <div
                        class="grid grid-cols-1 md:grid-cols-2 gap-6"> {{-- Plan Name --}} <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2"> Plan Name </label> <input
                                type="text" name="name" value="{{ old('name', $plan->name) }}"
                                class="w-full rounded-xl border @error('name') border-red-500 @else border-gray-300 @enderror px-4 py-3 focus:ring-2 focus:ring-blue-500">
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div> {{-- Price --}} <div> <label class="block text-sm font-medium text-gray-700 mb-2">
                                Price </label> <input type="number" name="price" value="{{ old('price', $plan->price) }}"
                                class="w-full rounded-xl border @error('price') border-red-500 @else border-gray-300 @enderror px-4 py-3">
                            @error('price')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div> {{-- Plan Type --}} <div> <label class="block text-sm font-medium text-gray-700 mb-2"> Plan
                                Type </label> <select name="plans"
                                class="w-full rounded-xl border @error('plans') border-red-500 @else border-gray-300 @enderror px-4 py-3">
                                <option value="">Select Plan</option>
                                <option value="Basic" {{ old('plans', $plan->plans) == 'Basic' ? 'selected' : '' }}> Basic
                                </option>
                                <option value="Premium" {{ old('plans', $plan->plans) == 'Premium' ? 'selected' : '' }}>
                                    Premium </option>
                                <option value="Enterprise"
                                    {{ old('plans', $plan->plans) == 'Enterprise' ? 'selected' : '' }}> Enterprise </option>
                            </select> @error('plans')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div> {{-- Message Limit --}} <div> <label class="block text-sm font-medium text-gray-700 mb-2">
                                Message Limit </label> <input type="number" name="message_limit"
                                value="{{ old('message_limit', $plan->message_limit) }}"
                                class="w-full rounded-xl border @error('message_limit') border-red-500 @else border-gray-300 @enderror px-4 py-3">
                            @error('message_limit')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div> {{-- Validity --}} <div> <label class="block text-sm font-medium text-gray-700 mb-2">
                                Validity Days </label> <input type="number" name="validity_day"
                                value="{{ old('validity_day', $plan->validity_day) }}"
                                class="w-full rounded-xl border @error('validity_day') border-red-500 @else border-gray-300 @enderror px-4 py-3">
                            @error('validity_day')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div> {{-- Description --}} <div class="mt-6"> <label
                            class="block text-sm font-medium text-gray-700 mb-2"> Description </label>
                        <textarea name="description" rows="5"
                            class="w-full rounded-xl border @error('description') border-red-500 @else border-gray-300 @enderror px-4 py-3">{{ old('description', $plan->description) }}</textarea> @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div> {{-- Features --}} <div class="mt-6">
                        <div class="flex justify-between items-center mb-3"> <label
                                class="text-sm font-medium text-gray-700"> Features </label> <button type="button"
                                id="addFeature" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg"> Add
                                Feature </button> </div>
                        <div id="featureContainer">
                            @foreach (old('feature', $plan->feature ?? []) as $feature)
                                <div class="flex gap-2 mb-2 feature-row"> <input type="text" name="feature[]"
                                        value="{{ $feature }}"
                                        class="flex-1 border border-gray-300 rounded-lg px-3 py-2"> <button type="button"
                                        class="removeFeature bg-red-500 text-white px-3 rounded-lg"> X </button> </div>
                            @endforeach
                        </div>
                    </div> {{-- Submit --}} <div class="mt-8"> <button type="submit"
                            class="bg-gradient-to-r from-green-600 to-green-700 text-white px-8 py-3 rounded-xl"> Update Plan </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        document.getElementById('addFeature').addEventListener('click', function() {

            let html = `
        <div class="flex gap-2 mb-2">
            <input type="text"
                name="feature[]"
                class="flex-1 border rounded-lg px-3 py-2"
                placeholder="Enter Feature">

            <button type="button"
                class="removeFeature bg-red-500 text-white px-3 rounded">
                X
            </button>
        </div>
    `;

            document.getElementById('featureContainer')
                .insertAdjacentHTML('beforeend', html);
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('removeFeature')) {
                e.target.parentElement.remove();
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

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
        }
    </style>
@endsection
