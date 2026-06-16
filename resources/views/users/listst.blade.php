@extends('admin.include.app')
@section('content')
    <div class="p-4 md:p-6 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">

        <!-- Header with Stats -->
        <div class="mb-8">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-gradient-to-r from-[#25D366] to-[#128C7E] rounded-xl shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Message Templates</h1>
                            <p class="text-sm text-gray-500 mt-0.5">Create and manage your WhatsApp message templates</p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-3">
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input type="text" placeholder="Search templates..."
                            class="pl-10 pr-4 py-2.5 border border-gray-200 rounded-xl bg-white focus:ring-2 focus:ring-[#25D366] focus:border-transparent w-full md:w-64 transition shadow-sm hover:shadow">
                    </div>

                    <a href="{{ route('createTemplate') }}"
                        class="px-5 py-2.5 bg-gradient-to-r from-[#25D366] to-[#128C7E] text-white rounded-xl font-semibold shadow-md hover:shadow-lg transform hover:scale-[1.02] transition-all duration-200 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Create Template
                    </a>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6">
                <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-500 uppercase font-semibold">Total</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $templates->count() }}</p>
                        </div>
                        <div class="p-2 bg-blue-50 rounded-lg">
                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-500 uppercase font-semibold">Approved</p>
                            <p class="text-2xl font-bold text-green-600">{{ $templates->where('status', 'approved')->count() }}</p>
                        </div>
                        <div class="p-2 bg-green-50 rounded-lg">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-500 uppercase font-semibold">Pending</p>
                            <p class="text-2xl font-bold text-yellow-600">{{ $templates->where('status', 'pending')->count() }}</p>
                        </div>
                        <div class="p-2 bg-yellow-50 rounded-lg">
                            <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-500 uppercase font-semibold">Rejected</p>
                            <p class="text-2xl font-bold text-red-600">{{ $templates->where('status', 'rejected')->count() }}</p>
                        </div>
                        <div class="p-2 bg-red-50 rounded-lg">
                            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <!-- Table Toolbar -->
            <div class="px-4 md:px-6 py-3 border-b border-gray-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 bg-gray-50/50">
                <div class="flex items-center gap-2">
                    <span class="text-sm text-gray-600">Showing</span>
                    <select class="text-sm border border-gray-200 rounded-lg px-2 py-1 bg-white">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                        <option>100</option>
                    </select>
                    <span class="text-sm text-gray-600">entries</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-sm text-gray-500">{{ $templates->count() }} templates found</span>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 text-gray-600 uppercase text-xs font-semibold tracking-wider">
                        <tr>
                            <th class="px-4 md:px-6 py-4 text-left">
                                <div class="flex items-center gap-1">
                                    Name
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                </div>
                            </th>
                            <th class="px-4 md:px-6 py-4 text-left">Category</th>
                            <th class="px-4 md:px-6 py-4 text-left">Language</th>
                            <th class="px-4 md:px-6 py-4 text-left hidden md:table-cell">Body</th>
                            <th class="px-4 md:px-6 py-4 text-left">Status</th>
                            <th class="px-4 md:px-6 py-4 text-left hidden lg:table-cell">Meta ID</th>
                            <th class="px-4 md:px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">
                        @forelse($templates as $template)
                            <tr class="hover:bg-gray-50/80 transition duration-150 group">
                                <td class="px-4 md:px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-[#25D366] to-[#128C7E]/20 flex items-center justify-center text-[#128C7E] font-bold text-xs">
                                            {{ substr($template->name, 0, 2) }}
                                        </div>
                                        <span class="font-medium text-gray-800">{{ $template->name }}</span>
                                    </div>
                                </td>
                                <td class="px-4 md:px-6 py-4">
                                    <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded-lg text-xs font-medium">
                                        {{ $template->category }}
                                    </span>
                                </td>
                                <td class="px-4 md:px-6 py-4">
                                    <div class="flex items-center gap-1.5">
                                        <span class="text-sm">{{ $template->language }}</span>
                                    </div>
                                </td>
                                <td class="px-4 md:px-6 py-4 hidden md:table-cell">
                                    <div class="max-w-xs">
                                        <p class="text-gray-600 truncate">{{ Str::limit($template->body, 40) }}</p>
                                    </div>
                                </td>
                                <td class="px-4 md:px-6 py-4">
                                    @php
                                        $statusConfig = [
                                            'approved' => ['bg' => 'bg-green-100', 'text' => 'text-green-700', 'dot' => 'bg-green-500'],
                                            'pending' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-700', 'dot' => 'bg-yellow-500'],
                                            'rejected' => ['bg' => 'bg-red-100', 'text' => 'text-red-700', 'dot' => 'bg-red-500'],
                                        ];
                                        $config = $statusConfig[$template->status] ?? $statusConfig['pending'];
                                    @endphp
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold {{ $config['bg'] }} {{ $config['text'] }}">
                                        <span class="w-1.5 h-1.5 rounded-full {{ $config['dot'] }}"></span>
                                        {{ ucfirst($template->status) }}
                                    </span>
                                </td>
                                <td class="px-4 md:px-6 py-4 hidden lg:table-cell">
                                    <code class="text-xs bg-gray-100 px-2 py-1 rounded text-gray-600 font-mono">
                                        {{ $template->meta_template_id }}
                                    </code>
                                </td>
                                <td class="px-4 md:px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-1.5">
                                        <button onclick="window.location.href=''"
                                            class="p-2 rounded-lg hover:bg-blue-50 text-blue-600 transition group-hover:opacity-100 opacity-70 hover:opacity-100">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </button>
                                        <form method="POST" action="" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 rounded-lg hover:bg-red-50 text-red-600 transition group-hover:opacity-100 opacity-70 hover:opacity-100"
                                                onclick="return confirm('Are you sure you want to delete this template?')">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center gap-3">
                                        <div class="p-3 bg-gray-100 rounded-full">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-gray-600 font-medium">No templates found</p>
                                            <p class="text-sm text-gray-400 mt-0.5">Create your first WhatsApp template</p>
                                        </div>
                                        <a href="#" class="mt-2 px-4 py-2 bg-[#25D366] text-white rounded-lg text-sm font-medium hover:bg-[#128C7E] transition">
                                            Create Template
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Table Footer -->
            <div class="px-4 md:px-6 py-3 border-t border-gray-100 bg-gray-50/50 flex flex-col sm:flex-row justify-between items-center gap-3">
                <div class="text-sm text-gray-500">
                    {{-- Showing {{ $templates->firstItem() ?? 0 }} to {{ $templates->lastItem() ?? 0 }} of {{ $templates->total() ?? $templates->count() }} entries --}}
                </div>
                <div class="flex items-center gap-2">
                    <button class="px-3 py-1.5 border border-gray-200 rounded-lg text-sm text-gray-600 hover:bg-white transition disabled:opacity-50" disabled>
                        Previous
                    </button>
                    <button class="px-3 py-1.5 bg-[#25D366] text-white rounded-lg text-sm font-medium hover:bg-[#128C7E] transition">
                        1
                    </button>
                    <button class="px-3 py-1.5 border border-gray-200 rounded-lg text-sm text-gray-600 hover:bg-white transition">
                        Next
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
