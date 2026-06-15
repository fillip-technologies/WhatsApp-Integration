<div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-20 hidden overlay"></div>
<div id="mobileSidebar"
    class="fixed inset-y-0 left-0 transform -translate-x-full transition-transform duration-300 ease-in-out z-30 w-64 sidebar-transition md:hidden">
    <div class="flex flex-col h-full bg-gradient-to-b from-purple-800 to-indigo-900">
        <div class="flex items-center justify-between h-16 px-4 bg-purple-900 bg-opacity-50">
            <div class="flex items-center space-x-2">
                <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
                <span class="text-white font-bold text-xl">{{ UserLogin() ? "UserPanel" : "AdminPanel" }}</span>
            </div>
            <button id="closeMobileSidebar" class="text-white hover:text-purple-200">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
        <nav class="flex-1 px-2 py-4 space-y-1 overflow-y-auto">
            <a href="#"
                class="bg-purple-700 bg-opacity-50 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <svg class="mr-3 h-5 w-5 text-purple-200" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
                Dashboard
            </a>
            <a href="#"
                class="text-purple-100 hover:bg-purple-700 hover:bg-opacity-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md transition">
                <svg class="mr-3 h-5 w-5 text-purple-200" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                </svg>
                Users
            </a>
            <a href="#"
                class="text-purple-100 hover:bg-purple-700 hover:bg-opacity-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md transition">
                <svg class="mr-3 h-5 w-5 text-purple-200" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2V8a1 1 0 00-1-1H8a1 1 0 00-1 1v4H5V5zm3 7h4v-2H8v2z"
                        clip-rule="evenodd" />
                </svg>
                Reports
            </a>
            <a href="#"
                class="text-purple-100 hover:bg-purple-700 hover:bg-opacity-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md transition">
                <svg class="mr-3 h-5 w-5 text-purple-200" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z"
                        clip-rule="evenodd" />
                </svg>
                Settings
            </a>
        </nav>
        <div class="flex-shrink-0 flex border-t border-purple-700 p-4">
            <form method="POST" action="" class="w-full">
                @csrf
                <button type="submit" class="flex items-center text-purple-100 hover:text-white w-full group">
                    <svg class="h-5 w-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                            clip-rule="evenodd" />
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </div>
</div>

<div class="hidden md:flex md:flex-shrink-0">
    <div class="flex flex-col w-64 bg-gradient-to-br from-slate-700 via-slate-800 to-slate-900">
        <div class="flex items-center justify-center h-16 px-4 bg-purple-900 bg-opacity-50">
            <div class="flex items-center space-x-2">
                <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
                <span class="text-white font-bold text-xl">{{ UserLogin() ? "UserPanel" : "AdminPanel" }}</span>
            </div>
        </div>
        <nav class="flex-1 px-2 py-4 space-y-1">
            <a href="{{ url('/dashboard') }}"
                class="bg-purple-700 bg-opacity-50 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <svg class="mr-3 h-5 w-5 text-purple-200" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
                Dashboard
            </a>
            <a href="{{ route('chat.app') }}"
                class="text-purple-100 hover:bg-purple-700 hover:bg-opacity-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md transition">

                <svg class="mr-3 h-5 w-5 text-purple-200" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2H6l-4 3V5z" />
                </svg>

                SMS Panel
            </a>
            <a href="#"
                class="text-purple-100 hover:bg-purple-700 hover:bg-opacity-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md transition">
                <svg class="mr-3 h-5 w-5 text-purple-200" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2V8a1 1 0 00-1-1H8a1 1 0 00-1 1v4H5V5zm3 7h4v-2H8v2z"
                        clip-rule="evenodd" />
                </svg>
                Reports
            </a>
            <a href="#"
                class="text-purple-100 hover:bg-purple-700 hover:bg-opacity-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md transition">
                <svg class="mr-3 h-5 w-5 text-purple-200" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z"
                        clip-rule="evenodd" />
                </svg>
                Settings
            </a>
        </nav>
        <div class="flex-shrink-0 flex border-t border-purple-700 p-4">
            <form method="POST" action="{{ UserLogin() ? route('user.logout') : route('admin.logout') }}" class="w-full">
                @csrf
                <button type="submit" class="flex items-center text-purple-100 hover:text-white w-full group">
                    <svg class="h-5 w-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                            clip-rule="evenodd" />
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </div>
</div>
