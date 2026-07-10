@extends('admin.include.app')
@section('content')
@if(session('error'))
<script>
    toaster.error(@json(session('error')));
</script>
@endif

@if(session('success'))
<script>
    toaster.error(@json(session('success')));
</script>
@endif

    <div class="container mx-auto px-4 py-6">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Header -->
                <div class="px-6 py-4 bg-gradient-to-r from-[#25D366] to-[#128C7E] border-b border-gray-200">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <svg class="w-8 h-8 text-white mr-3" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                            </svg>
                            <h2 class="text-xl font-semibold text-white">WhatsApp Configuration Settings</h2>
                        </div>
                        <a href="{{ route('admin.dashboard') }}"
                            class="bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-lg transition duration-200 flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Back
                        </a>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6 p-6">
                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-700">Phone ID Status</span>
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ config('app.WHATSAPP_PHONE_NUMBER_ID') ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ !empty(getUserConfig()->phone_number) ? '✓ Configured' : 'Not Set' }} 
                            </span>
                        </div>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-700">Business ID Status</span>
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ config('app.WHATSAPP_BUSINESS_ACCOUNT_ID') ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{!empty(getUserConfig()->business_id) ? '✓ Configured' : 'Not Set' }}
                            </span>
                        </div>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-700">Token Status</span>
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ config('app.WHATSAPP_TOKEN') ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ !empty(getUserConfig()->access_token) ? '✓ Configured' : 'Not Set' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                {{-- <div class="flex flex-wrap gap-4 mt-8 p-6 border-t border-gray-200">
                    <button type="submit"
                        class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                            </path>
                        </svg>
                        Save Configuration
                    </button>

                </div> --}}
                </form>


            </div>
        </div>
    </div>
    </div>

    <script>
        // Toggle password visibility for token field
        document.getElementById('toggleTokenVisibility').addEventListener('click', function() {
            const tokenInput = document.getElementById('whatsapp_token');
            const tokenIcon = document.getElementById('tokenIcon');

            if (tokenInput.type === 'password') {
                tokenInput.type = 'text';
                tokenIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
            `;
            } else {
                tokenInput.type = 'password';
                tokenIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
            `;
            }
        });

        // Test WhatsApp Connection
        function testWhatsAppConnection() {
            const phoneId = document.getElementById('phonenumber_id').value;
            const businessId = document.getElementById('whatsapp_business_account_id').value;
            const token = document.getElementById('whatsapp_token').value;

            if (!phoneId || !businessId || !token) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Incomplete Configuration',
                    text: 'Please fill all the required fields before testing the connection.',
                    confirmButtonColor: '#059669'
                });
                return;
            }

            // Show loading state
            Swal.fire({
                title: 'Testing Connection...',
                text: 'Please wait while we verify your WhatsApp API credentials.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Make AJAX request to test connection
            fetch('', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        phone_number_id: phoneId,
                        business_account_id: businessId,
                        token: token
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Connection Successful!',
                            text: 'Your WhatsApp API credentials are valid and working properly.',
                            confirmButtonColor: '#059669'
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Connection Failed',
                            text: data.message ||
                                'Invalid credentials. Please check your WhatsApp API settings.',
                            confirmButtonColor: '#059669'
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Connection Error',
                        text: 'Unable to connect to WhatsApp API. Please try again later.',
                        confirmButtonColor: '#059669'
                    });
                });
        }

        document.getElementById('whatsappConfigForm').addEventListener('submit', function(e) {
            const phoneId = document.getElementById('whatsapp_phone_number_id').value.trim();
            const businessId = document.getElementById('whatsapp_business_account_id').value.trim();
            const token = document.getElementById('whatsapp_token').value.trim();

            if (!phoneId || !businessId || !token) {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'All fields are required. Please fill in all the WhatsApp configuration settings.',
                    confirmButtonColor: '#059669'
                });
                return false;
            }


            if (!/^\d+$/.test(phoneId)) {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Phone Number ID',
                    text: 'Phone Number ID should contain only numbers.',
                    confirmButtonColor: '#059669'
                });
                return false;
            }

            if (!/^\d+$/.test(businessId)) {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Business Account ID',
                    text: 'Business Account ID should contain only numbers.',
                    confirmButtonColor: '#059669'
                });
                return false;
            }
        });
    </script>
@endsection
