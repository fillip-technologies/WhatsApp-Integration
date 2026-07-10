{{-- Mobile Sidebar Overlay --}}
<div id="sidebarOverlay"
    class="fixed inset-0 bg-black/60 backdrop-blur-sm z-20 hidden overlay transition-opacity duration-300"></div>


<div id="mobileSidebar"
    class="fixed inset-y-0 left-0 transform -translate-x-full transition-transform duration-300 ease-in-out z-30 w-72 sidebar-transition md:hidden">
    <div class="flex flex-col h-full bg-gradient-to-r from-green-600 to-green-700 shadow-2xl">
        {{-- Header --}}
        <div class="flex items-center justify-between px-6 py-5 bg-white/5 backdrop-blur-sm border-b border-white/10">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-white/10 rounded-xl">
                    <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                </div>
                <div>
                    <span
                        class="text-white font-bold text-lg block">{{ UserLogin() ? 'UserPanel' : 'AdminPanel' }}</span>
                    <span class="text-purple-300 text-xs">v2.0.0</span>
                </div>
            </div>
            <button id="closeMobileSidebar"
                class="text-white/60 hover:text-white transition-colors p-2 hover:bg-white/10 rounded-lg">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
            <div class="mb-4 px-3 py-2 bg-white/5 rounded-xl">
                <p class="text-purple-300 text-xs font-semibold uppercase tracking-wider">Main Menu</p>
            </div>

            <a href="{{ url('/dashboard') }}"
                class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200
                      bg-gradient-to-r from-green-600 to-green-700 text-white shadow-lg shadow-purple-500/30">
                <div class="p-1.5 bg-white/20 rounded-lg mr-3">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                </div>
                Dashboard
                <span class="ml-auto bg-white/20 text-white text-xs px-2 py-0.5 rounded-full">Home</span>
            </a>

            <a href="{{ route('chat.app') }}"
                class="text-purple-100 hover:bg-white/10 group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200">
                <div class="p-1.5 bg-purple-500/20 rounded-lg mr-3 group-hover:bg-purple-500/30 transition-colors">
                    <svg class="h-5 w-5 text-purple-300" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2H6l-4 3V5z" />
                    </svg>
                </div>
                SMS Panel
                <span class="ml-auto bg-green-500/20 text-green-300 text-xs px-2 py-0.5 rounded-full">Active</span>
            </a>

            <a href="#"
                class="text-purple-100 hover:bg-white/10 group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200">
                <div class="p-1.5 bg-purple-500/20 rounded-lg mr-3 group-hover:bg-purple-500/30 transition-colors">
                    <svg class="h-5 w-5 text-purple-300" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2V8a1 1 0 00-1-1H8a1 1 0 00-1 1v4H5V5zm3 7h4v-2H8v2z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                Reports
            </a>

            <a href="#"
                class="text-purple-100 hover:bg-white/10 group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200">
                <div class="p-1.5 bg-purple-500/20 rounded-lg mr-3 group-hover:bg-purple-500/30 transition-colors">
                    <svg class="h-5 w-5 text-purple-300" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                Settings
            </a>

            <div class="pt-4 mt-4 border-t border-white/10">
                <div class="px-3 py-2 bg-white/5 rounded-xl">
                    <p class="text-purple-300 text-xs font-semibold uppercase tracking-wider">Account</p>
                </div>

                <a href="#"
                    class="text-purple-100 hover:bg-white/10 group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200">
                    <div class="p-1.5 bg-purple-500/20 rounded-lg mr-3 group-hover:bg-purple-500/30 transition-colors">
                        <svg class="h-5 w-5 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    Profile
                </a>

                <form method="POST" action="{{ UserLogin() ? route('user.logout') : route('admin.logout') }}"
                    class="w-full">
                    @csrf
                    <button type="submit"
                        class="w-full text-purple-100 hover:bg-red-500/20 group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200">
                        <div class="p-1.5 bg-red-500/20 rounded-lg mr-3 group-hover:bg-red-500/30 transition-colors">
                            <svg class="h-5 w-5 text-red-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        Logout
                    </button>
                </form>
            </div>
        </nav>
    </div>
</div>


{{-- Desktop Sidebar --}}
<div class="hidden md:flex md:flex-shrink-0">
    <div
        class="flex flex-col w-64 h-screen sticky top-0 bg-gradient-to-r from-slate-900 via-purple-900 to-indigo-900 shadow-2xl">
        {{-- Header --}}
        <div class="flex items-center justify-center px-6 py-6 bg-white/5 backdrop-blur-sm border-b border-white/10">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-white/10 rounded-xl">
                    <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                </div>
                <div>
                    <span
                        class="text-white font-bold text-xl block">{{ UserLogin() ? 'UserPanel' : 'AdminPanel' }}</span>
                    <span class="text-purple-300 text-xs">v2.0.0</span>
                </div>
            </div>
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
            <div class="mb-4 px-3 py-2 bg-white/5 rounded-xl">
                <p class="text-purple-300 text-xs font-semibold uppercase tracking-wider">Main Menu</p>
            </div>

            <a href="{{ AdminLogin() ? route('admin.dashboard') : route('user.dashboard') }}"
                class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200
                       bg-gradient-to-r from-slate-900 via-purple-900 to-indigo-900 text-white shadow-lg shadow-purple-500/30">
                <div class="p-1.5 bg-white/20 rounded-lg mr-3">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                </div>
                Dashboard
                <span class="ml-auto bg-white/20 text-white text-xs px-2 py-0.5 rounded-full">Home</span>
            </a>
            @if (AdminLogin())
                <a href="{{ route('plan.list') }}"
                    class="text-purple-100 hover:bg-white/10 group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200">
                    <div class="p-1.5 bg-purple-500/20 rounded-lg mr-3 group-hover:bg-purple-500/30 transition-colors">
                        <svg class="h-5 w-5 text-purple-300" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2H6l-4 3V5z" />
                        </svg>
                    </div>
                    Subscription Plans
                    {{-- <span class="ml-auto bg-green-500/20 text-green-300 text-xs px-2 py-0.5 rounded-full">Active</span> --}}
                </a>

                <a href="{{ route('user.list') }}"
                    class="text-purple-100 hover:bg-white/10 group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200">
                    <div class="p-1.5 bg-purple-500/20 rounded-lg mr-3 group-hover:bg-purple-500/30 transition-colors">
                        <svg class="h-5 w-5 text-purple-300" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2a4 4 0 100 8 4 4 0 000-8zm-7 14a7 7 0 1114 0H3z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    Users
                </a>

                <a href="{{ route('index.template') }}"
                    class="text-purple-100 hover:bg-white/10 group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200">
                    <div class="p-1.5 bg-purple-500/20 rounded-lg mr-3 group-hover:bg-purple-500/30 transition-colors">
                        <svg class="h-5 w-5 text-purple-300" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4 3a2 2 0 012-2h5.586a2 2 0 011.414.586l2.414 2.414A2 2 0 0116 5.414V17a2 2 0 01-2 2H6a2 2 0 01-2-2V3zm4 5a1 1 0 000 2h4a1 1 0 100-2H8zm0 4a1 1 0 100 2h4a1 1 0 100-2H8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    All Templates
                </a>

                <a href="{{ route('whatsappsetupView') }}"
                    class="{{ request()->routeIs('whatsappsetupView') ? 'bg-white/20 text-white' : 'text-purple-100 hover:bg-white/10' }}
                    group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200">

                    <div class="p-1.5 bg-purple-500/20 rounded-lg mr-3 group-hover:bg-purple-500/30 transition-colors">
                        <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M16.75 13.96c-.25-.13-1.47-.72-1.7-.8-.23-.08-.39-.12-.56.13-.16.25-.64.8-.78.96-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.25-.74-.66-1.24-1.47-1.39-1.72-.15-.25-.02-.38.11-.5.11-.11.25-.29.37-.43.12-.15.16-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.35-.77-1.85-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.09 0 1.22.9 2.41 1.02 2.58.13.17 1.77 2.7 4.29 3.79.6.26 1.07.42 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.17.21-.58.21-1.08.15-1.18-.06-.1-.22-.16-.47-.29z" />
                            <path
                                d="M12.04 2C6.5 2 2 6.49 2 12c0 1.75.46 3.46 1.33 4.97L2 22l5.16-1.35A9.93 9.93 0 0012.04 22C17.56 22 22 17.51 22 12S17.56 2 12.04 2zm0 18.18c-1.58 0-3.12-.42-4.47-1.22l-.32-.19-3.06.8.82-2.98-.2-.31A8.14 8.14 0 013.86 12c0-4.51 3.67-8.18 8.18-8.18S20.22 7.49 20.22 12s-3.67 8.18-8.18 8.18z" />
                        </svg>
                    </div>

                    Whatsapp SetUp
                </a>

                <a href="{{ route('paymentStatus') }}"
                    class="{{ request()->routeIs('paymentStatus') ? 'bg-white/20 text-white' : 'text-purple-100 hover:bg-white/10' }}
                    group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200">

                    <div class="p-1.5 bg-purple-500/20 rounded-lg mr-3 group-hover:bg-purple-500/30 transition-colors">
                        <svg class="h-5 w-5 text-green-300" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                            <path fill-rule="evenodd"
                                d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h2a1 1 0 110 2H5a1 1 0 01-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>

                    Payment Status
                </a>
                <div class="pt-4 mt-4 border-t border-white/10">
                    <div class="px-3 py-2 bg-white/5 rounded-xl">
                        <p class="text-purple-300 text-xs font-semibold uppercase tracking-wider">Account</p>
                    </div>

                    <a href="#"
                        class="text-purple-100 hover:bg-white/10 group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200">
                        <div
                            class="p-1.5 bg-purple-500/20 rounded-lg mr-3 group-hover:bg-purple-500/30 transition-colors">
                            <svg class="h-5 w-5 text-purple-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        Profile
                    </a>

                    <a href="{{ route('config.index') }}"
                        class="text-purple-100 hover:bg-white/10 group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200">
                        <div
                            class="p-1.5 bg-purple-500/20 rounded-lg mr-3 group-hover:bg-purple-500/30 transition-colors">
                            <svg class="h-5 w-5 text-purple-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        Settings
                    </a>

                    <form method="POST" action="{{ UserLogin() ? route('user.logout') : route('admin.logout') }}"
                        class="w-full">
                        @csrf
                        <button type="submit"
                            class="w-full text-purple-100 hover:bg-red-500/20 group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200">
                            <div
                                class="p-1.5 bg-red-500/20 rounded-lg mr-3 group-hover:bg-red-500/30 transition-colors">
                                <svg class="h-5 w-5 text-red-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            Logout
                        </button>
                    </form>
                </div>
            @else
                <a href="{{ route('listTemplate') }}"
                    class="text-purple-100 hover:bg-white/10 group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200">
                    <div class="p-1.5 bg-purple-500/20 rounded-lg mr-3 group-hover:bg-purple-500/30 transition-colors">
                        <svg class="h-5 w-5 text-purple-300" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    My Template
                </a>

                <a href="{{ route('settingUser') }}"
                    class="text-purple-100 hover:bg-white/10 group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200">
                    <div class="p-1.5 bg-purple-500/20 rounded-lg mr-3 group-hover:bg-purple-500/30 transition-colors">
                        <svg class="h-5 w-5 text-purple-300" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    Settings
                </a>


                <div class="pt-4 mt-4 border-t border-white/10">
                    <div class="px-3 py-2 bg-white/5 rounded-xl">
                        <p class="text-purple-300 text-xs font-semibold uppercase tracking-wider">Account</p>
                    </div>

                    <a href="#"
                        class="text-purple-100 hover:bg-white/10 group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200">
                        <div
                            class="p-1.5 bg-purple-500/20 rounded-lg mr-3 group-hover:bg-purple-500/30 transition-colors">
                            <svg class="h-5 w-5 text-purple-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        Profile
                    </a>

                    <form method="POST" action="{{ UserLogin() ? route('user.logout') : route('admin.logout') }}"
                        class="w-full">
                        @csrf
                        <button type="submit"
                            class="w-full text-purple-100 hover:bg-red-500/20 group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200">
                            <div
                                class="p-1.5 bg-red-500/20 rounded-lg mr-3 group-hover:bg-red-500/30 transition-colors">
                                <svg class="h-5 w-5 text-red-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            Logout
                        </button>
                    </form>
                </div>
            @endif
        </nav>
    </div>
</div>
