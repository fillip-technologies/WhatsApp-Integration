@extends('admin.include.app')
@section('content')
    <div class="p-4 md:p-6 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">

        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center gap-3 mb-2">
                <a href="{{ url()->previous() }}" class="p-2 hover:bg-white rounded-xl transition shadow-sm">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Create New Template</h1>
                    <p class="text-sm text-gray-500 mt-0.5">Create a new WhatsApp message template for your campaigns</p>
                </div>
            </div>
        </div>

        <!-- Form Card -->
        <div class="max-w-4xl mx-auto">
            <form method="POST" action="" class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                @csrf

                <!-- Form Progress Steps -->
                <div class="px-6 py-4 bg-gradient-to-r from-[#25D366]/5 to-[#128C7E]/5 border-b border-gray-100">
                    <div class="flex items-center justify-between max-w-md mx-auto">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-[#25D366] text-white flex items-center justify-center text-sm font-bold">1</div>
                            <span class="text-sm font-medium text-gray-700">Details</span>
                        </div>
                        <div class="flex-1 h-0.5 bg-gray-200 mx-2">
                            <div class="h-0.5 bg-[#25D366] w-1/2"></div>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center text-sm font-bold">2</div>
                            <span class="text-sm text-gray-400">Preview</span>
                        </div>
                    </div>
                </div>

                <div class="p-6 md:p-8 space-y-8">
                    <!-- Template Name -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700">
                            Template Name <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <input type="text"
                                name="name"
                                id="name"
                                value="{{ old('name') }}"
                                placeholder="e.g., Welcome Message, Order Confirmation..."
                                class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#25D366] focus:border-transparent transition @error('name') border-red-500 @enderror"
                                required>
                        </div>
                        <p class="text-xs text-gray-500">Choose a unique name for your template (max 60 characters)</p>
                        @error('name')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category & Language Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Category -->
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700">
                                Category <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                </div>
                                <select name="category"
                                    class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#25D366] focus:border-transparent transition appearance-none @error('category') border-red-500 @enderror"
                                    required>
                                    <option value="">Select Category</option>
                                    <option value="marketing" {{ old('category') == 'marketing' ? 'selected' : '' }}>Marketing</option>
                                    <option value="transactional" {{ old('category') == 'transactional' ? 'selected' : '' }}>Transactional</option>
                                    <option value="otp" {{ old('category') == 'otp' ? 'selected' : '' }}>OTP / Verification</option>
                                    <option value="support" {{ old('category') == 'support' ? 'selected' : '' }}>Customer Support</option>
                                    <option value="reminder" {{ old('category') == 'reminder' ? 'selected' : '' }}>Reminder</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('category')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Language -->
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700">
                                Language <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path>
                                    </svg>
                                </div>
                                <select name="language"
                                    class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#25D366] focus:border-transparent transition appearance-none @error('language') border-red-500 @enderror"
                                    required>
                                    <option value="">Select Language</option>
                                    <option value="en" {{ old('language') == 'en' ? 'selected' : '' }}>English (en)</option>
                                    <option value="hi" {{ old('language') == 'hi' ? 'selected' : '' }}>Hindi (hi)</option>
                                    <option value="es" {{ old('language') == 'es' ? 'selected' : '' }}>Spanish (es)</option>
                                    <option value="fr" {{ old('language') == 'fr' ? 'selected' : '' }}>French (fr)</option>
                                    <option value="ar" {{ old('language') == 'ar' ? 'selected' : '' }}>Arabic (ar)</option>
                                    <option value="pt" {{ old('language') == 'pt' ? 'selected' : '' }}>Portuguese (pt)</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('language')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Template Body -->
                    <div class="space-y-2">
                        <div class="flex items-center justify-between">
                            <label class="block text-sm font-semibold text-gray-700">
                                Message Body <span class="text-red-500">*</span>
                            </label>
                            <span class="text-xs text-gray-400" id="charCount">0 characters</span>
                        </div>
                        <div class="relative">
                            <textarea name="body"
                                id="body"
                                rows="6"
                                placeholder="Write your template message here... Use for dynamic content"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#25D366] focus:border-transparent transition resize-y @error('body') border-red-500 @enderror"
                                required>{{ old('body') }}</textarea>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="text-xs text-gray-500">Available variables:</span>
                            <button type="button" onclick="insertVariable('name')" class="text-xs px-2 py-1 bg-gray-100 hover:bg-gray-200 rounded transition">First Name</button>
                            <button type="button" onclick="insertVariable('last_name')" class="text-xs px-2 py-1 bg-gray-100 hover:bg-gray-200 rounded transition">Last Name</button>
                            <button type="button" onclick="insertVariable('order_id')" class="text-xs px-2 py-1 bg-gray-100 hover:bg-gray-200 rounded transition">Order ID</button>
                            <button type="button" onclick="insertVariable('amount')" class="text-xs px-2 py-1 bg-gray-100 hover:bg-gray-200 rounded transition">Amount</button>
                            <button type="button" onclick="insertVariable('date')" class="text-xs px-2 py-1 bg-gray-100 hover:bg-gray-200 rounded transition">Date</button>
                            <button type="button" onclick="insertVariable('time')" class="text-xs px-2 py-1 bg-gray-100 hover:bg-gray-200 rounded transition">Time</button>
                        </div>
                        @error('body')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Header (Optional) -->
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <label class="block text-sm font-semibold text-gray-700">
                                Header (Optional)
                            </label>
                            <span class="text-xs text-gray-400">Recommended for better engagement</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <select name="header_type"
                                class="px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#25D366] focus:border-transparent transition">
                                <option value="">No Header</option>
                                <option value="text">Text Header</option>
                                <option value="image">Image Header</option>
                                <option value="video">Video Header</option>
                            </select>
                            <input type="text"
                                name="header_text"
                                placeholder="Header text or media URL..."
                                class="px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#25D366] focus:border-transparent transition">
                        </div>
                    </div>

                    <!-- Footer (Optional) -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700">
                            Footer (Optional)
                        </label>
                        <input type="text"
                            name="footer"
                            placeholder="Add a footer to your message..."
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#25D366] focus:border-transparent transition">
                        <p class="text-xs text-gray-500">Footer appears at the bottom of your message</p>
                    </div>

                    <!-- Buttons (Optional) -->
                    <div class="space-y-3">
                        <label class="block text-sm font-semibold text-gray-700">
                            Call-to-Action Buttons (Optional)
                        </label>
                        <div id="buttons-container" class="space-y-3">
                            <div class="flex items-center gap-3">
                                <select name="button_type[]" class="flex-1 px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#25D366] focus:border-transparent transition">
                                    <option value="">Select Button Type</option>
                                    <option value="url">Visit Website</option>
                                    <option value="phone">Call Now</option>
                                    <option value="copy">Copy Code</option>
                                </select>
                                <input type="text"
                                    name="button_text[]"
                                    placeholder="Button label..."
                                    class="flex-1 px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#25D366] focus:border-transparent transition">
                                <button type="button" onclick="removeButton(this)" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <button type="button" onclick="addButton()" class="text-sm text-[#25D366] font-medium hover:text-[#128C7E] transition flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Add Button
                        </button>
                    </div>

                    <!-- Sample Preview -->
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <h3 class="text-sm font-semibold text-gray-700 mb-3">📱 Message Preview</h3>
                        <div class="bg-white rounded-xl p-4 shadow-sm max-w-sm mx-auto border border-gray-100">
                            <div class="flex items-center gap-2 mb-3">
                                <div class="w-8 h-8 rounded-full bg-[#25D366] flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-800">WhatsApp</p>
                                    <p class="text-xs text-gray-400">Today at 12:00 PM</p>
                                </div>
                            </div>
                            <div id="preview-body" class="text-sm text-gray-700 leading-relaxed min-h-[60px]">
                                Your message preview will appear here...
                            </div>
                            <div id="preview-footer" class="text-xs text-gray-400 mt-2 border-t border-gray-100 pt-2">
                                Footer text will appear here
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="px-6 md:px-8 py-4 bg-gray-50 border-t border-gray-100 flex flex-col sm:flex-row justify-end gap-3">
                    <a href=""
                        class="px-6 py-2.5 border border-gray-200 text-gray-600 rounded-xl hover:bg-gray-50 transition text-center">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-6 py-2.5 bg-gradient-to-r from-[#25D366] to-[#128C7E] text-white rounded-xl font-semibold shadow-md hover:shadow-lg transform hover:scale-[1.02] transition-all duration-200 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Create Template
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        // Character counter for body text
        document.getElementById('body').addEventListener('input', function() {
            const count = this.value.length;
            document.getElementById('charCount').textContent = count + ' characters';
        });

        // Live preview update
        document.getElementById('body').addEventListener('input', function() {
            document.getElementById('preview-body').textContent = this.value || 'Your message preview will appear here...';
        });

        // Footer preview
        document.querySelector('input[name="footer"]').addEventListener('input', function() {
            const footerEl = document.getElementById('preview-footer');
            if (this.value) {
                footerEl.textContent = this.value;
                footerEl.style.display = 'block';
            } else {
                footerEl.textContent = 'Footer text will appear here';
                footerEl.style.display = 'block';
            }
        });

        // Insert variables - FIXED VERSION
        function insertVariable(variable) {
            const textarea = document.getElementById('body');
            const start = textarea.selectionStart;
            const end = textarea.selectionEnd;
            const text = textarea.value;
            const before = text.substring(0, start);
            const after = text.substring(end, text.length);
            textarea.value = before + '{{ ' + variable + ' }}' + after;
            textarea.focus();
            textarea.selectionStart = textarea.selectionEnd = start + variable.length + 4;

            // Trigger input event for preview
            const event = new Event('input');
            textarea.dispatchEvent(event);
        }

        // Add button row
        function addButton() {
            const container = document.getElementById('buttons-container');
            const row = document.createElement('div');
            row.className = 'flex items-center gap-3';
            row.innerHTML = `
                <select name="button_type[]" class="flex-1 px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#25D366] focus:border-transparent transition">
                    <option value="">Select Button Type</option>
                    <option value="url">Visit Website</option>
                    <option value="phone">Call Now</option>
                    <option value="copy">Copy Code</option>
                </select>
                <input type="text"
                    name="button_text[]"
                    placeholder="Button label..."
                    class="flex-1 px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#25D366] focus:border-transparent transition">
                <button type="button" onclick="removeButton(this)" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            `;
            container.appendChild(row);
        }

        // Remove button row
        function removeButton(btn) {
            const row = btn.closest('.flex');
            if (document.getElementById('buttons-container').children.length > 1) {
                row.remove();
            } else {
                alert('At least one button is required if you add buttons.');
            }
        }

        // Auto-generate template name from body (optional)
        document.getElementById('body').addEventListener('blur', function() {
            const nameField = document.getElementById('name');
            if (!nameField.value.trim()) {
                const firstWords = this.value.trim().split(' ').slice(0, 4).join(' ');
                if (firstWords) {
                    nameField.value = firstWords.charAt(0).toUpperCase() + firstWords.slice(1);
                }
            }
        });

        // Category color indicators
        document.querySelector('select[name="category"]').addEventListener('change', function() {
            const colors = {
                'marketing': 'text-purple-600',
                'transactional': 'text-blue-600',
                'otp': 'text-red-600',
                'support': 'text-green-600',
                'reminder': 'text-orange-600'
            };
            // Could add visual feedback here
        });
    </script>
    @endpush
@endsection
