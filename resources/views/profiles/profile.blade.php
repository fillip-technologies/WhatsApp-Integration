@extends('admin.include.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Breadcrumb -->
        <nav class="flex items-center space-x-2 text-sm text-gray-500 mb-6">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600 transition">Dashboard</a>
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd" />
            </svg>
            <span class="text-gray-700 font-medium">User Profile</span>
        </nav>

        <!-- Profile Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            <!-- Cover Image & Header -->
            <div class="relative h-48 bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600">
                <div class="absolute inset-0 bg-black opacity-10"></div>
                <div class="absolute bottom-0 left-0 right-0 px-6 py-4 bg-gradient-to-t from-black/60 to-transparent">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="relative">
                                <!-- Avatar with Initials -->
                                <div
                                    class="w-20 h-20 rounded-full border-4 border-white shadow-lg overflow-hidden bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                                    <span
                                        class="text-3xl font-bold text-white">{{ strtoupper(substr($user->first_name ?? 'U', 0, 1)) }}{{ strtoupper(substr($user->last_name ?? 'ser', 0, 1)) }}</span>
                                </div>
                                @if ($user->is_active == 'active')
                                    <span
                                        class="absolute bottom-0 right-0 block w-4 h-4 rounded-full bg-green-400 ring-2 ring-white"></span>
                                @else
                                    <span
                                        class="absolute bottom-0 right-0 block w-4 h-4 rounded-full bg-red-400 ring-2 ring-white"></span>
                                @endif
                            </div>
                            <div class="text-white">
                                <h1 class="text-2xl font-bold">{{ $user->first_name }} {{ $user->last_name }}</h1>
                                <p class="text-blue-100 text-sm flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ ucfirst($user->role) }}
                                </p>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <button onclick="window.print()"
                                class="px-4 py-2 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white text-sm font-medium rounded-lg transition duration-150 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                </svg>
                                Print
                            </button>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Content -->
            <div class="p-6 md:p-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Sidebar -->
                    <div class="lg:col-span-1 space-y-6">
                        <!-- Quick Stats -->
                        <div class="bg-gray-50 rounded-xl p-4 space-y-3">
                            <h4 class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Quick Stats</h4>
                            <div class="flex items-center justify-between border-b border-gray-200 pb-2">
                                <span class="text-sm text-gray-600">Member Since</span>
                                <span
                                    class="text-sm font-medium text-gray-900">{{ $user->created_at ? $user->created_at->format('M d, Y') : 'N/A' }}</span>
                            </div>
                            <div class="flex items-center justify-between border-b border-gray-200 pb-2">
                                <span class="text-sm text-gray-600">Last Updated</span>
                                <span
                                    class="text-sm font-medium text-gray-900">{{ $user->updated_at ? $user->updated_at->format('M d, Y h:i A') : 'N/A' }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Status</span>
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $user->is_active == 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    <span
                                        class="w-1.5 h-1.5 rounded-full {{ $user->is_active == 'active' ? 'bg-green-400' : 'bg-red-400' }} mr-1.5"></span>
                                    {{ ucfirst($user->is_active ?? 'Unknown') }}
                                </span>
                            </div>
                        </div>

                        <!-- Contact Info -->
                        <div class="bg-gray-50 rounded-xl p-4 space-y-3">
                            <h4 class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Contact Information
                            </h4>
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-gray-400 mt-0.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <div>
                                    <p class="text-xs text-gray-500">Email</p>
                                    <p class="text-sm text-gray-900">{{ $user->email ?? 'N/A' }}</p>
                                    @if ($user->email_verified_at)
                                        <span class="text-xs text-green-600">✓ Verified</span>
                                    @else
                                        <span class="text-xs text-yellow-600">⚠ Unverified</span>
                                    @endif
                                </div>
                            </div>
                            @if ($user->phone)
                                <div class="flex items-start space-x-3">
                                    <svg class="w-5 h-5 text-gray-400 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    <div>
                                        <p class="text-xs text-gray-500">Phone</p>
                                        <p class="text-sm text-gray-900">{{ $user->phone }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Role & Plan Info -->
                        <div
                            class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-4 border border-blue-100 space-y-3">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-lg bg-blue-600 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500">Role</p>
                                    <p class="text-sm font-semibold text-gray-900">{{ ucfirst($user->role ?? 'User') }}</p>
                                </div>
                            </div>
                            @if ($user->plan_type)
                                <div class="flex items-center space-x-3 border-t border-blue-100 pt-3">
                                    <div class="w-10 h-10 rounded-lg bg-purple-600 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v1m0 1v1m0 1V10m0 1v1m0 1v1m0 1v1M6 5a2 2 0 01-2-2V1m0 2v2m0-2h2m10 4h2a2 2 0 012 2v14a2 2 0 01-2 2h-2m-2-2V7" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Plan Type</p>
                                        <p class="text-sm font-semibold text-gray-900">{{ ucfirst($user->plan_type) }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Main Content -->
                    <div class="lg:col-span-2 space-y-8">
                        <!-- Company & Business Info -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Company Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @if ($user->company_name)
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <p class="text-xs text-gray-500 uppercase tracking-wider">Company Name</p>
                                        <p class="text-gray-900 font-medium">{{ $user->company_name }}</p>
                                    </div>
                                @endif
                                @if ($user->business_type)
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <p class="text-xs text-gray-500 uppercase tracking-wider">Business Type</p>
                                        <p class="text-gray-900 font-medium">{{ $user->business_type }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Personal Information -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Personal Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <p class="text-xs text-gray-500 uppercase tracking-wider">First Name</p>
                                    <p class="text-gray-900 font-medium">{{ $user->first_name }}</p>
                                </div>
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <p class="text-xs text-gray-500 uppercase tracking-wider">Last Name</p>
                                    <p class="text-gray-900 font-medium">{{ $user->last_name }}</p>
                                </div>
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <p class="text-xs text-gray-500 uppercase tracking-wider">Email</p>
                                    <p class="text-gray-900 font-medium">{{ $user->email }}</p>
                                </div>
                                @if ($user->phone)
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <p class="text-xs text-gray-500 uppercase tracking-wider">Phone</p>
                                        <p class="text-gray-900 font-medium">{{ $user->phone }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- System Information -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">System Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <p class="text-xs text-gray-500 uppercase tracking-wider">User ID</p>
                                    <p class="text-gray-900 font-medium">#{{ $user->id }}</p>
                                </div>
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <p class="text-xs text-gray-500 uppercase tracking-wider">Role</p>
                                    <p class="text-gray-900 font-medium">{{ ucfirst($user->role ?? 'User') }}</p>
                                </div>
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <p class="text-xs text-gray-500 uppercase tracking-wider">Status</p>
                                    <p class="text-gray-900 font-medium">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $user->is_active == 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ ucfirst($user->is_active ?? 'Unknown') }}
                                        </span>
                                    </p>
                                </div>
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <p class="text-xs text-gray-500 uppercase tracking-wider">Email Verified</p>
                                    <p class="text-gray-900 font-medium">
                                        @if ($user->email_verified_at)
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                ✓ Verified
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                ⚠ Pending
                                            </span>
                                        @endif
                                    </p>
                                </div>
                                @if ($user->deleted_at)
                                    <div class="bg-red-50 rounded-lg p-4 col-span-2">
                                        <p class="text-xs text-red-500 uppercase tracking-wider">Account Status</p>
                                        <p class="text-red-700 font-medium">This account has been deleted on
                                            {{ $user->deleted_at->format('M d, Y h:i A') }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @php
                            $editRoute = null;
                            if (AdminLogin()) {
                                $editRoute = route('admin.edit', $user->id);
                            } elseif (UserLogin()) {
                                $editRoute = route('user.edit', $user->id);
                            }
                        @endphp
                        <!-- Action Buttons -->
                        <div class="pt-6 border-t border-gray-200 flex flex-wrap gap-3 float-end">
                            <a href="{{ $editRoute }}"
                                class="inline-flex items-center px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition duration-150 shadow-sm hover:shadow-md">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit Profile
                            </a>

                            <button onclick="showResetModal()"
                                class="inline-flex items-center px-4 py-2.5 bg-yellow-600 hover:bg-yellow-700 text-white text-sm font-medium rounded-lg transition duration-150 shadow-sm hover:shadow-md">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                                </svg>
                                Reset Password
                            </button>

                            {{-- <button onclick="showDeactivateModal()"
                                class="inline-flex items-center px-4 py-2.5 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition duration-150 shadow-sm hover:shadow-md">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                </svg>
                                {{ $user->status == 'active' ? 'Deactivate User' : 'Activate User' }}
                            </button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reset Password Modal -->
    <div id="resetModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 p-6">
            <div class="text-center">
                <div class="w-16 h-16 rounded-full bg-yellow-100 mx-auto flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Reset Password</h3>
                <p class="text-gray-600 text-sm mb-6">Are you sure you want to reset <strong>{{ $user->first_name }}
                        {{ $user->last_name }}</strong>'s password? A new temporary password will be generated.</p>
                <div class="flex space-x-3">
                    <button onclick="closeModal('resetModal')"
                        class="flex-1 px-4 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition">Cancel</button>
                    <form action="" method="POST" class="flex-1">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                            class="w-full px-4 py-2.5 bg-yellow-600 hover:bg-yellow-700 text-white text-sm font-medium rounded-lg transition">Confirm
                            Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Deactivate/Activate Modal -->
    <div id="deactivateModal"
        class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 p-6">
            <div class="text-center">
                <div
                    class="w-16 h-16 rounded-full {{ $user->is_active == 'active' ? 'bg-red-100' : 'bg-green-100' }} mx-auto flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 {{ $user->is_active == 'active' ? 'text-red-600' : 'text-green-600' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        @if ($user->is_active == 'active')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                        @else
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        @endif
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">
                    {{ $user->is_active == 'active' ? 'Deactivate' : 'Activate' }} User</h3>
                <p class="text-gray-600 text-sm mb-6">
                    Are you sure you want to {{ $user->is_active == 'active' ? 'deactivate' : 'activate' }}
                    <strong>{{ $user->first_name }} {{ $user->last_name }}</strong>'s account?
                    {{ $user->is_active == 'active' ? 'This action can be reversed later.' : 'This will restore their access.' }}
                </p>
                <div class="flex space-x-3">
                    <button onclick="closeModal('deactivateModal')"
                        class="flex-1 px-4 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition">Cancel</button>
                    <form action="" method="POST" class="flex-1">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                            class="w-full px-4 py-2.5 {{ $user->is_active == 'active' ? 'bg-red-600 hover:bg-red-700' : 'bg-green-600 hover:bg-green-700' }} text-white text-sm font-medium rounded-lg transition">
                            Confirm {{ $user->is_active == 'active' ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showResetModal() {
            document.getElementById('resetModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function showDeactivateModal() {
            document.getElementById('deactivateModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modals on background click
        document.querySelectorAll('.fixed.inset-0').forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    this.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                }
            });
        });

        // Close modals with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.fixed.inset-0').forEach(modal => {
                    modal.classList.add('hidden');
                });
                document.body.style.overflow = 'auto';
            }
        });
    </script>
@endsection
