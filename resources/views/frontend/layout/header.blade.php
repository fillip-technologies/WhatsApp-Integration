<h1>hello from</h1>


 <header class="bg-white/90 backdrop-blur-sm shadow-sm sticky top-0 z-50 border-b border-slate-200/60">
     <div class="max-w-7xl mx-auto px-6 sm:px-8 py-4 flex flex-wrap items-center justify-between">
         <!-- Logo + brand -->
         <div class="flex items-center gap-2 text-xl font-bold tracking-tight">
             <i class="fab fa-whatsapp text-3xl text-[#25D366]"></i>
             <a href="{{ url('/') }}">
                 <span class="text-slate-800">WA<span class="text-[#25D366]">·</span>API</span>
                 <span
                     class="hidden sm:inline text-xs font-mono bg-slate-100 px-2 py-0.5 rounded-full text-slate-500 ml-2">v2.1</span>
             </a>

         </div>

         <!-- nav + signup / signin -->
         <div class="flex items-center gap-3 mt-2 sm:mt-0">
             <a href="{{ route('plansView') }}"
                 class="hidden md:inline text-sm font-medium text-slate-600 hover:text-[#1a3a4f] transition px-2">Plans</a>
             <a href="#features"
                 class="hidden md:inline text-sm font-medium text-slate-600 hover:text-[#1a3a4f] transition px-2">Features</a>
             <!-- Sign Up button (primary) -->
             <a href="#signup"
                 class="inline-flex items-center gap-1.5 bg-[#25D366] hover:bg-[#1da55a] text-white text-sm font-semibold px-5 py-2.5 rounded-full shadow-md shadow-emerald-200 transition">
                 <i class="fas fa-user-plus"></i> Sign Up
             </a>
             <!-- Sign In (outline) -->
             <a href="{{ route('login') }}"
                 class="hidden sm:inline-flex items-center gap-1.5 border border-slate-300 hover:border-[#25D366] hover:text-[#25D366] text-slate-600 text-sm font-medium px-5 py-2.5 rounded-full transition">
                 <i class="fas fa-sign-in-alt"></i> Sign In
             </a>
         </div>
     </div>
 </header>
