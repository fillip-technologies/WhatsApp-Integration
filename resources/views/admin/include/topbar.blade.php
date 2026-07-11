  <header class="bg-gradient-to-r from-slate-900 via-purple-900 to-indigo-900 shadow-sm">
            <div class="px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
                <div class="flex items-center">
                    <!-- Mobile menu button -->
                    <button id="openMobileSidebar" class="md:hidden rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                    <h1 class="ml-2 text-2xl font-semibold text-gray-900 text-white">Dashboard</h1>
                </div>
                <div class="flex items-center space-x-4">

                    <button class="relative p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                        <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-400 ring-2 ring-white"></span>
                    </button>

                    <!-- User Menu -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-3 focus:outline-none">
                            <div class="hidden md:block">
                                <p class="text-sm font-medium text-white">{{ AdminLogin() ? 'Admin' : "User" }}</p>

                            </div>
                            
                        </button>

                        <!-- Dropdown menu -->

                    </div>
                </div>
            </div>
        </header>

<script>

    const mobileSidebar = document.getElementById('mobileSidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const openSidebarBtn = document.getElementById('openMobileSidebar');
    const closeSidebarBtn = document.getElementById('closeMobileSidebar');

    // Function to open sidebar
    function openMobileSidebar() {
        mobileSidebar.classList.remove('-translate-x-full');
        sidebarOverlay.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    // Function to close sidebar
    function closeMobileSidebar() {
        mobileSidebar.classList.add('-translate-x-full');
        sidebarOverlay.classList.add('hidden');
        document.body.style.overflow = '';
    }

    // Event listeners
    if (openSidebarBtn) {
        openSidebarBtn.addEventListener('click', openMobileSidebar);
    }

    if (closeSidebarBtn) {
        closeSidebarBtn.addEventListener('click', closeMobileSidebar);
    }

    // Close sidebar when clicking overlay
    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', closeMobileSidebar);
    }

    // Close sidebar on window resize (if open and screen becomes desktop)
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768) { // md breakpoint
            closeMobileSidebar();
        }
    });

    // Prevent body scroll when sidebar is open on mobile
    function handleBodyScroll() {
        if (!mobileSidebar.classList.contains('-translate-x-full')) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = '';
        }
    }

    // Close sidebar on escape key press
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && !mobileSidebar.classList.contains('-translate-x-full')) {
            closeMobileSidebar();
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
