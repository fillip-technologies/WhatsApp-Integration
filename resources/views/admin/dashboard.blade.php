 @extends('admin.include.app')
 @section('content')
     <main class="px-4 sm:px-6 lg:px-8 py-8">
         <div class="bg-gradient-to-br from-slate-700 via-slate-800 to-slate-900 rounded-2xl shadow-lg p-6 mb-8 text-white">
             <div class="flex items-center justify-between">
                 <div>
                     <h2 class="text-2xl font-bold mb-2">Welcome back, !</h2>
                     <p class="text-purple-100">Here's what's happening with your admin panel today.</p>
                 </div>
                 <div class="hidden md:block">
                     <svg class="h-20 w-20 text-purple-300 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                         <path fill-rule="evenodd"
                             d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                             clip-rule="evenodd" />
                     </svg>
                 </div>
             </div>
         </div>

         {{-- <!-- Stats Grid -->
         <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4 mb-8">
             <div class="bg-white overflow-hidden shadow rounded-lg transition-transform hover:scale-105">
                 <div class="p-5">
                     <div class="flex items-center">
                         <div class="flex-shrink-0">
                             <svg class="h-6 w-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                 <path
                                     d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                             </svg>
                         </div>
                         <div class="ml-5 w-0 flex-1">
                             <dl>
                                 <dt class="text-sm font-medium text-gray-500 truncate">Total Users</dt>
                                 <dd class="text-2xl font-semibold text-gray-900">1,234</dd>
                             </dl>
                         </div>
                     </div>
                 </div>
                 <div class="bg-gray-50 px-5 py-3">
                     <div class="text-sm">
                         <a href="#" class="font-medium text-purple-600 hover:text-purple-500">View all</a>
                     </div>
                 </div>
             </div>

             <div class="bg-white overflow-hidden shadow rounded-lg transition-transform hover:scale-105">
                 <div class="p-5">
                     <div class="flex items-center">
                         <div class="flex-shrink-0">
                             <svg class="h-6 w-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                 <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                 <path fill-rule="evenodd"
                                     d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                     clip-rule="evenodd" />
                             </svg>
                         </div>
                         <div class="ml-5 w-0 flex-1">
                             <dl>
                                 <dt class="text-sm font-medium text-gray-500 truncate">Total Orders</dt>
                                 <dd class="text-2xl font-semibold text-gray-900">567</dd>
                             </dl>
                         </div>
                     </div>
                 </div>
                 <div class="bg-gray-50 px-5 py-3">
                     <div class="text-sm">
                         <a href="#" class="font-medium text-purple-600 hover:text-purple-500">View orders</a>
                     </div>
                 </div>
             </div>

             <div class="bg-white overflow-hidden shadow rounded-lg transition-transform hover:scale-105">
                 <div class="p-5">
                     <div class="flex items-center">
                         <div class="flex-shrink-0">
                             <svg class="h-6 w-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                 <path fill-rule="evenodd"
                                     d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                     clip-rule="evenodd" />
                             </svg>
                         </div>
                         <div class="ml-5 w-0 flex-1">
                             <dl>
                                 <dt class="text-sm font-medium text-gray-500 truncate">Revenue</dt>
                                 <dd class="text-2xl font-semibold text-gray-900">$12,345</dd>
                             </dl>
                         </div>
                     </div>
                 </div>
                 <div class="bg-gray-50 px-5 py-3">
                     <div class="text-sm">
                         <a href="#" class="font-medium text-purple-600 hover:text-purple-500">View reports</a>
                     </div>
                 </div>
             </div>

             <div class="bg-white overflow-hidden shadow rounded-lg transition-transform hover:scale-105">
                 <div class="p-5">
                     <div class="flex items-center">
                         <div class="flex-shrink-0">
                             <svg class="h-6 w-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                 <path fill-rule="evenodd"
                                     d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2V8a1 1 0 00-1-1H8a1 1 0 00-1 1v4H5V5zm3 7h4v-2H8v2z"
                                     clip-rule="evenodd" />
                             </svg>
                         </div>
                         <div class="ml-5 w-0 flex-1">
                             <dl>
                                 <dt class="text-sm font-medium text-gray-500 truncate">Products</dt>
                                 <dd class="text-2xl font-semibold text-gray-900">89</dd>
                             </dl>
                         </div>
                     </div>
                 </div>
                 <div class="bg-gray-50 px-5 py-3">
                     <div class="text-sm">
                         <a href="#" class="font-medium text-purple-600 hover:text-purple-500">Manage products</a>
                     </div>
                 </div>
             </div>
         </div>

         <!-- Recent Activity Section -->
         <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
             <div class="bg-white shadow rounded-lg">
                 <div class="px-6 py-4 border-b border-gray-200">
                     <h3 class="text-lg font-medium text-gray-900">Recent Activity</h3>
                 </div>
                 <div class="p-6">
                     <div class="flow-root">
                         <ul class="-my-5 divide-y divide-gray-200">
                             <li class="py-4">
                                 <div class="flex items-center space-x-4">
                                     <div class="flex-shrink-0">
                                         <div class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center">
                                             <svg class="h-4 w-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                                 <path fill-rule="evenodd"
                                                     d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                     clip-rule="evenodd" />
                                             </svg>
                                         </div>
                                     </div>
                                     <div class="flex-1 min-w-0">
                                         <p class="text-sm font-medium text-gray-900 truncate">New user registered</p>
                                         <p class="text-sm text-gray-500">John Doe signed up</p>
                                     </div>
                                     <div class="text-sm text-gray-500">5 min ago</div>
                                 </div>
                             </li>
                             <li class="py-4">
                                 <div class="flex items-center space-x-4">
                                     <div class="flex-shrink-0">
                                         <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center">
                                             <svg class="h-4 w-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                                 <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                                                 <path fill-rule="evenodd"
                                                     d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                                     clip-rule="evenodd" />
                                             </svg>
                                         </div>
                                     </div>
                                     <div class="flex-1 min-w-0">
                                         <p class="text-sm font-medium text-gray-900 truncate">New order placed</p>
                                         <p class="text-sm text-gray-500">Order #12345 - $234.50</p>
                                     </div>
                                     <div class="text-sm text-gray-500">1 hour ago</div>
                                 </div>
                             </li>
                             <li class="py-4">
                                 <div class="flex items-center space-x-4">
                                     <div class="flex-shrink-0">
                                         <div class="h-8 w-8 rounded-full bg-yellow-100 flex items-center justify-center">
                                             <svg class="h-4 w-4 text-yellow-600" fill="currentColor"
                                                 viewBox="0 0 20 20">
                                                 <path fill-rule="evenodd"
                                                     d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"
                                                     clip-rule="evenodd" />
                                             </svg>
                                         </div>
                                     </div>
                                     <div class="flex-1 min-w-0">
                                         <p class="text-sm font-medium text-gray-900 truncate">Product restocked</p>
                                         <p class="text-sm text-gray-500">Added 50 units of Product X</p>
                                     </div>
                                     <div class="text-sm text-gray-500">3 hours ago</div>
                                 </div>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>

             <div class="bg-white shadow rounded-lg">
                 <div class="px-6 py-4 border-b border-gray-200">
                     <h3 class="text-lg font-medium text-gray-900">Quick Actions</h3>
                 </div>
                 <div class="p-6">
                     <div class="space-y-4">
                         <button
                             class="w-full bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition flex items-center justify-center space-x-2">
                             <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M12 4v16m8-8H4" />
                             </svg>
                             <span>Add New User</span>
                         </button>
                         <button
                             class="w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition flex items-center justify-center space-x-2">
                             <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                             </svg>
                             <span>Create Report</span>
                         </button>
                         <button
                             class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition flex items-center justify-center space-x-2">
                             <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                             </svg>
                             <span>Manage Users</span>
                         </button>
                     </div>
                 </div>
             </div>
         </div> --}}
     </main>
 @endsection
