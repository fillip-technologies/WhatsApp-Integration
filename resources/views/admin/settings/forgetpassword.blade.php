<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Forget Password</title>
  <!-- Tailwind + Inter -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet" />
  <style>
    * { font-family: 'Inter', system-ui, -apple-system, sans-serif; }
    /* smooth glassmorphism nuance */
    .login-card {
      backdrop-filter: blur(2px);
      background: rgba(255, 255, 255, 0.9);
      transition: transform 0.25s ease, box-shadow 0.3s ease;
    }
    .login-card:hover {
      transform: scale(1.02);
      box-shadow: 0 25px 40px -12px rgba(0, 0, 0, 0.5);
    }
    .input-icon {
      transition: color 0.2s;
    }
    .input-group:focus-within .input-icon {
      color: #1e293b;
    }
    .gradient-btn {
      background: linear-gradient(135deg, #1e293b 0%, #1e3a8a 100%);
      transition: all 0.25s ease;
    }
    .gradient-btn:hover {
      background: linear-gradient(135deg, #0f172a 0%, #172554 100%);
      box-shadow: 0 12px 24px -8px rgba(30, 58, 138, 0.4);
      transform: translateY(-2px);
    }
    .gradient-btn:active {
      transform: scale(0.97);
    }
    .link-underline {
      position: relative;
    }
    .link-underline::after {
      content: '';
      position: absolute;
      left: 0;
      bottom: -2px;
      width: 0%;
      height: 2px;
      background: #1e293b;
      transition: width 0.25s ease;
    }
    .link-underline:hover::after {
      width: 100%;
    }
    .error-banner {
      animation: fadeSlide 0.3s ease;
    }
    @keyframes fadeSlide {
      0% { opacity: 0; transform: translateY(-6px); }
      100% { opacity: 1; transform: translateY(0); }
    }
    /* custom checkbox */
    .custom-check:checked {
      background-color: #1e3a8a;
      border-color: #1e3a8a;
    }
    .custom-check:focus {
      ring: 2px solid #1e3a8a;
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-700 via-slate-800 to-slate-900 p-4">
  <div class="w-full max-w-md">
    <!-- card -->
    <div class="login-card rounded-3xl shadow-2xl p-8 sm:p-10 bg-white/95 backdrop-blur-sm border border-white/20">

      <!-- header -->
      <div class="text-center">
        <div class="flex justify-center">
          <div class="h-20 w-20 rounded-2xl bg-gradient-to-br from-slate-700 to-slate-900 flex items-center justify-center shadow-lg shadow-slate-800/30">
            <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
        </div>
        <h2 class="mt-5 text-3xl font-bold tracking-tight text-slate-800">Welcome back</h2>
        <p class="mt-1 text-sm text-slate-500">Sign in to your dashboard</p>
      </div>


      @if (session('error'))
        <div class="mt-5 bg-emerald-50 border-l-4 border-emerald-400 p-4 rounded-xl flex items-start gap-3 error-banner">
          <svg class="h-5 w-5 text-emerald-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
          </svg>
          <p class="text-sm text-emerald-700">{{ session('error') }}</p>
        </div>
      @endif



      <!-- form -->
      <form class="mt-7 space-y-6" method="POST" action="">
        @csrf

        <div class="space-y-5">
          <!-- email -->
          <div>
            <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">Email Address</label>
            <div class="relative input-group">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-slate-400 input-icon" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                  <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                </svg>
              </div>
              <input type="email" id="email" name="email" value="{{ old('email') }}" autofocus
                placeholder="you@example.com"
                class="w-full pl-10 pr-4 py-3.5 border border-slate-200 rounded-2xl bg-white/70 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-800 focus:border-transparent transition-all duration-200 @error('email') border-rose-400 ring-2 ring-rose-200 @enderror" />
            </div>
            @error('email')
              <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- password -->
          <div>
            <div class="flex justify-between items-center mb-1.5">
              <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
              <a href="#" class="text-xs font-medium text-slate-500 hover:text-slate-800 transition">Forgot?</a>
            </div>
            <div class="relative input-group">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-slate-400 input-icon" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2V7a3 3 0 00-6 0v2h6z" clip-rule="evenodd" />
                </svg>
              </div>
              <input type="password" id="password" name="password" placeholder="••••••••"
                class="w-full pl-10 pr-4 py-3.5 border border-slate-200 rounded-2xl bg-white/70 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-800 focus:border-transparent transition-all duration-200 @error('password') border-rose-400 ring-2 ring-rose-200 @enderror" />
            </div>
            @error('password')
              <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <div class="flex justify-between items-center mb-1.5">
              <label for="password" class="block text-sm font-medium text-slate-700">Confirm Password</label>
              <a href="#" class="text-xs font-medium text-slate-500 hover:text-slate-800 transition">Forgot?</a>
            </div>
            <div class="relative input-group">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-slate-400 input-icon" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2V7a3 3 0 00-6 0v2h6z" clip-rule="evenodd" />
                </svg>
              </div>
              <input type="password" id="password" name="password_confirmation" placeholder="••••••••"
                class="w-full pl-10 pr-4 py-3.5 border border-slate-200 rounded-2xl bg-white/70 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-800 focus:border-transparent transition-all duration-200 @error('password') border-rose-400 ring-2 ring-rose-200 @enderror" />
            </div>
            @error('password')
              <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
            @enderror
          </div>
        </div>



        <!-- submit -->
        <button type="submit"
          class="gradient-btn group relative flex w-full items-center justify-center gap-2 py-3.5 px-4 rounded-2xl text-white font-semibold tracking-wide shadow-lg shadow-blue-900/20">
          <svg class="h-5 w-5 text-blue-200 group-hover:text-blue-100 transition" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2V7a3 3 0 00-6 0v2h6z" clip-rule="evenodd" />
          </svg>
         Reset Password
        </button>
      </form>
    </div>
  </div>
</body>
</html>
