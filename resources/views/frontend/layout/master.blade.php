<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>WhatsApp API · Multi‑Plan Landing</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        /* subtle smooth scroll & card hover effect */
        html { scroll-behavior: smooth; }
        .plan-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .plan-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 30px -10px rgba(0, 0, 0, 0.15);
        }
        /* gradient hero */
        .hero-gradient {
            background: linear-gradient(145deg, #0b1a2e 0%, #1a3a4f 100%);
        }
        .btn-wa {
            background-color: #25D366;
            transition: background-color 0.2s;
        }
        .btn-wa:hover {
            background-color: #1da55a;
        }
        .btn-outline-wa {
            border: 2px solid #25D366;
            color: #25D366;
            transition: 0.2s;
        }
        .btn-outline-wa:hover {
            background-color: #25D366;
            color: white;
        }
        .badge-popular {
            background: #fbbf24;
            color: #0b1a2e;
            font-weight: 600;
            letter-spacing: 0.3px;
        }
    </style>
</head>
<body class="bg-slate-50 font-sans antialiased">
    @include('frontend.layout.header')
    @yield('content')
  <footer class="bg-slate-800 text-slate-300 py-10 px-6 border-t border-slate-700">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-2 text-xl font-bold text-white">
                <i class="fab fa-whatsapp text-[#25D366]"></i> WA<span class="text-[#25D366]">·</span>API
                <span class="text-xs font-light text-slate-400 ml-2">multi‑plan</span>
            </div>
            <div class="flex flex-wrap gap-6 text-sm">
                <a href="#" class="hover:text-white transition">Privacy</a>
                <a href="#" class="hover:text-white transition">Terms</a>
                <a href="#" class="hover:text-white transition">Support</a>
                <a href="#" class="hover:text-white transition"><i class="fab fa-github"></i></a>
                <a href="#" class="hover:text-white transition"><i class="fab fa-twitter"></i></a>
            </div>
            <p class="text-sm text-slate-400">&copy; 2026 — built with <i class="fas fa-heart text-red-400 text-xs"></i> &amp; Tailwind</p>
        </div>
    </footer>

    <script>
        (function() {

            console.log('🚀 WhatsApp API landing — multiple subscription plans ready.');

            const signupBtns = document.querySelectorAll('a[href="#signup"]');
            signupBtns.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();

                    document.getElementById('signup').scrollIntoView({ behavior: 'smooth' });

                    const toast = document.createElement('div');
                    toast.innerText = '✨ Sign up form (demo) — ready to onboard!';
                    toast.style.position = 'fixed';
                    toast.style.bottom = '20px';
                    toast.style.right = '20px';
                    toast.style.background = '#0b1a2e';
                    toast.style.color = '#fff';
                    toast.style.padding = '12px 24px';
                    toast.style.borderRadius = '40px';
                    toast.style.boxShadow = '0 8px 20px rgba(0,0,0,0.3)';
                    toast.style.fontWeight = '500';
                    toast.style.zIndex = '999';
                    toast.style.borderLeft = '4px solid #25D366';
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                });
            });
        })();
    </script>

</body>
</html>
