@extends('frontend.layout.master')
@section('content')
    <section id="pricing" class="py-20 px-6 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <span
                    class="inline-block bg-emerald-100 text-emerald-800 text-xs font-bold uppercase tracking-wider px-4 py-1.5 rounded-full">subscriptions</span>
                <h2 class="text-3xl md:text-5xl font-bold text-slate-800 mt-4">Choose your <span
                        class="text-[#25D366]">plan</span></h2>
                <p class="text-slate-500 max-w-xl mx-auto mt-3">Flexible monthly subscriptions with volume discounts and
                    premium features.</p>
            </div>


            <div class="grid md:grid-cols-3 gap-8 lg:gap-10">
                @forelse ($plans as $items)
                    @php
                        $icon = '';
                        $color = '';
                        if ($items->plans == 'Premium') {
                            $icon = '<i class="fas fa-crown text-2xl text-yellow-500"></i>';
                            $color = 'border-[#25D366] text-[#25D366] hover:bg-[#25D366]';
                        } elseif ($items->plans == 'Basic') {
                            $icon = '<i class="fas fa-seedling text-2xl text-emerald-500"></i>';
                            $color = 'border-orange  hover:bg-orange-800';
                        } elseif ($items->plans == 'Enterprise') {
                            $icon = '<i class="fas fa-building text-2xl text-blue-500"></i>';
                            $color = 'border-blue-500 text-blue-500 hover:bg-blue-600';
                        }
                    @endphp

                    <div
                        class="plan-card bg-slate-50 rounded-3xl p-8 border border-slate-200 shadow-sm hover:shadow-xl flex flex-col">
                        <div class="flex items-center justify-between">
                            <span
                                class="text-sm font-semibold uppercase tracking-wider text-slate-400">{{ $items->plans ?? 'N\A' }}</span>
                            {!! $icon !!}
                        </div>
                        <div class="mt-4">
                            <span class="text-4xl font-extrabold text-slate-800">₹{{ $items->price ?? '00' }}</span>
                            <span class="text-slate-400 ml-1">{{ $items->validity_day }}/Days</span>
                        </div>
                        <ul class="mt-6 space-y-3 text-slate-600 flex-grow">
                            @foreach ($items->feature as $feature)
                                <li class="flex items-start gap-2">
                                    <i class="fas fa-check text-[#25D366] mt-1 w-5"></i>
                                    {{ $feature }}
                                </li>
                            @endforeach
                        </ul>
                        <div class="mt-8">
                            <button type="button"
                                class="signup-btn block w-full text-center border {{ $color }} hover:text-white font-semibold py-3 rounded-full transition"
                                data-plan="{{ $items->plans }}">
                                {{ $items->button ?? 'Get Subscription' }}
                            </button>
                        </div>
                    </div>
                @empty
                @endforelse

            </div>
            <p class="text-center text-sm text-slate-400 mt-12 flex items-center justify-center gap-2">
                <i class="fas fa-arrows-left-right text-[#25D366]"></i> All plans include WhatsApp API, sandbox &amp;
                migration support.
            </p>
        </div>
    </section>
    <div id="signupModal" class="fixed inset-0 z-50 hidden bg-black/60 backdrop-blur-sm overflow-y-auto">

        <div class="min-h-screen flex justify-center items-center p-4">

            <div
                class="relative w-full max-w-5xl bg-white rounded-3xl shadow-[0_25px_80px_rgba(0,0,0,0.25)] overflow-hidden border border-gray-100">

                <!-- Header -->
                <div
                    class="bg-gradient-to-r from-[#25D366] via-[#1fb95c] to-[#128C7E] px-8 py-7 flex justify-between items-center">

                    <div>
                        <h2 class="text-3xl font-bold text-white">
                            Create Your Account 🚀
                        </h2>
                        <p class="text-green-100 mt-1">
                            Start sending WhatsApp messages in minutes
                        </p>
                    </div>

                    <button id="closeModal"
                        class="w-10 h-10 rounded-full bg-white/20 hover:bg-white/30 text-white text-2xl transition">
                        ×
                    </button>

                </div>

                <!-- Body -->
                <div class="p-8 md:p-10 space-y-8">

                    <!-- Notice -->
                    <div class="bg-green-50 border border-green-100 rounded-xl p-4">
                        <p class="text-sm text-green-700">
                            ✅ Your account will be created instantly and you can start
                            using WhatsApp API after subscription activation.
                        </p>
                    </div>

                    <form id="signupForm" class="space-y-8">

                        <input type="hidden" name="plan_type" id="planType">
                        @csrf

                        <!-- Personal Info -->
                        <div>

                            <h3 class="text-lg font-bold text-gray-800 mb-5 flex items-center gap-2 border-b pb-3">
                                👤 Personal Information
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        First Name
                                    </label>

                                    <input type="text" name="first_name"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-green-100 focus:border-green-500 focus:bg-white transition-all duration-300"
                                        placeholder="John">
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Last Name
                                    </label>

                                    <input type="text" name="last_name"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-green-100 focus:border-green-500 focus:bg-white transition-all duration-300"
                                        placeholder="Doe">
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Company Name
                                    </label>

                                    <input type="text" name="company_name"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-green-100 focus:border-green-500 focus:bg-white transition-all duration-300"
                                        placeholder="ABC Technologies">
                                </div>

                            </div>

                        </div>

                        <!-- Contact -->
                        <div>

                            <h3 class="text-lg font-bold text-gray-800 mb-5 flex items-center gap-2 border-b pb-3">
                                📞 Contact Details
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Mobile Number
                                    </label>

                                    <input type="text" name="phone"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-green-100 focus:border-green-500 focus:bg-white transition-all duration-300"
                                        placeholder="+91 9876543210">
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Email Address
                                    </label>

                                    <input type="email" name="email"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-green-100 focus:border-green-500 focus:bg-white transition-all duration-300"
                                        placeholder="john@example.com">
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Business Type
                                    </label>

                                    <select name="business_type"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-green-100 focus:border-green-500 focus:bg-white transition-all duration-300">

                                        <option value="">Select Business Type</option>
                                        <option>E-commerce</option>
                                        <option>Education</option>
                                        <option>Healthcare</option>
                                        <option>Real Estate</option>
                                        <option>Marketing Agency</option>
                                        <option>Other</option>

                                    </select>

                                </div>

                            </div>

                        </div>

                        <!-- Security -->
                        <div>

                            <h3 class="text-lg font-bold text-gray-800 mb-5 flex items-center gap-2 border-b pb-3">
                                🔐 Security
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Password
                                    </label>

                                    <input type="password" name="password"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-green-100 focus:border-green-500 focus:bg-white transition-all duration-300"
                                        placeholder="********">
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Confirm Password
                                    </label>

                                    <input type="password" name="password_confirmation"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-green-100 focus:border-green-500 focus:bg-white transition-all duration-300"
                                        placeholder="********">
                                </div>

                            </div>

                        </div>

                        <!-- Terms -->
                        <div class="flex items-start gap-3 p-4 bg-green-50 rounded-xl border border-green-100">

                            <input type="checkbox" name="terms" class="mt-1 h-4 w-4 text-green-600 rounded">

                            <label class="text-sm text-gray-700">
                                I agree to the
                                <span class="font-semibold text-green-700">
                                    Terms & Conditions
                                </span>
                                and
                                <span class="font-semibold text-green-700">
                                    Privacy Policy
                                </span>.
                            </label>

                        </div>

                        <!-- Buttons -->
                        <div class="flex flex-col md:flex-row gap-4">

                            <button type="button"
                                class="flex-1 border border-gray-300 text-gray-700 py-3 rounded-xl font-semibold hover:bg-gray-100 transition duration-300">
                                Cancel
                            </button>

                            <button type="submit"
                                class="flex-1 bg-gradient-to-r from-[#25D366] to-[#128C7E] text-white py-3 rounded-xl font-semibold shadow-lg shadow-green-500/20 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300">

                                Create Account →
                            </button>

                        </div>
                        <div id="loading" class="hidden">
                            <div class="fixed inset-0 bg-black/50 flex items-center justify-center">
                                <div
                                    class="w-12 h-12 border-4 border-white border-t-transparent rounded-full animate-spin">
                                </div>
                            </div>
                        </div>
                        <!-- Footer -->
                        <div class="text-center">

                            <p class="text-xs text-gray-500">
                                🔒 Your information is encrypted and secure.
                            </p>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
    <style>
        .hover-shadow-lg:hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }

        .transition {
            transition: all 0.3s ease;
        }

        .card {
            border-radius: 10px;
            overflow: hidden;
        }

        .card-footer {
            padding: 0.75rem 1.25rem;
        }
    </style>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
    const modal = document.getElementById('signupModal');
    const closeModal = document.getElementById('closeModal');
    const planType = document.getElementById('planType');

    // Open Modal for all plan buttons
    document.querySelectorAll('.signup-btn').forEach(button => {
        button.addEventListener('click', function() {

            let plan = this.getAttribute('data-plan');
            planType.value = plan;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        });
    });

    // Close Modal Button
    closeModal.addEventListener('click', function() {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    });

    // Close Modal Outside Click
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    });

    // Signup Form Submit
    document.getElementById('signupForm').addEventListener('submit', function(e) {

        e.preventDefault();

        document.getElementById('loading').classList.remove('hidden');

        let formData = new FormData(this);

        fetch("{{ route('user.create') }}", {
                method: "POST",
                headers: {
                    "Accept": "application/json"
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {

                document.getElementById('loading').classList.add('hidden');

                if (!data.success) {
                    alert(data.message);
                    return;
                }

                var options = {
                    key: data.razorpay_key,
                    amount: data.amount,
                    currency: data.currency,
                    order_id: data.order_id,
                    name: "WhatsApp Subscription",
                    description: data.plan_name,

                    handler: function(response) {

                        fetch("{{ route('payment.verify') }}", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "Accept": "application/json",
                                    "X-CSRF-TOKEN": document.querySelector(
                                        'meta[name="csrf-token"]').content
                                },
                                body: JSON.stringify({
                                    user_id: data.user_id,
                                    amount: data.amount,
                                    currency: data.currency,
                                    plan_id: data.plan_id,
                                    razorpay_payment_id: response
                                        .razorpay_payment_id,
                                    razorpay_order_id: response
                                        .razorpay_order_id,
                                    razorpay_signature: response
                                        .razorpay_signature
                                })
                            })
                            .then(res => res.json())
                            .then(result => {

                                if (result.success) {
                                    window.location.href = result
                                        .redirect_url;
                                } else {
                                    alert(result.message);
                                }
                            })
                            .catch(error => {
                                console.error(error);
                                alert('Payment verification failed');
                            });
                    }
                };

                var rzp = new Razorpay(options);
                rzp.open();

            })
            .catch(error => {
                document.getElementById('loading').classList.add('hidden');
                console.error(error);
            });
    });
</script>

@endsection

<!-- Add this to your layout head section for Font Awesome icons -->
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endpush
