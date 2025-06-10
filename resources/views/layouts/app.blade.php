<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Inventory Management') }}</title>

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Heroicons -->
    <script src="https://unpkg.com/@heroicons/24@latest/outline/esm/index.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        @if (!request()->routeIs('login'))
            <div class="w-64 bg-[#2A2D3E] text-white">
                <div class="h-16 flex items-center justify-center border-b border-gray-700">
                    <img src="/images/icons/logo.svg" alt="Logo" class="h-12 w-12 mr-3" />
                    <span class="text-xl font-bold">Inventory Management</span>
                </div>
                <nav class="mt-5">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-white {{ request()->routeIs('dashboard') ? 'bg-gray-700 bg-opacity-25 text-white' : '' }}">
                        <svg class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span>Dashboard</span>
                    </a>

                    <a href="{{ route('assets.index') }}"
                        class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-white {{ request()->routeIs('assets.*') ? 'bg-gray-700 bg-opacity-25 text-white' : '' }}">
                        <svg class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>Assets</span>
                    </a>

                    <a href="{{ route('software.index') }}"
                        class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-white {{ request()->routeIs('software.*') ? 'bg-gray-700 bg-opacity-25 text-white' : '' }}">
                        <svg class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                        <span>Software</span>
                    </a>

                    <a href="{{ route('categories.index') }}"
                        class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-white {{ request()->routeIs('categories.*') ? 'bg-gray-700 bg-opacity-25 text-white' : '' }}">
                        <svg class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                        <span>Categories</span>
                    </a>

                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('users.index') }}"
                            class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-white {{ request()->routeIs('users.*') ? 'bg-gray-700 bg-opacity-25 text-white' : '' }}">
                            <svg class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <span>Users</span>
                        </a>
                    @endif

                    <!-- Settings Section -->
                    <div x-data="{ open: false }" class="mt-4">
                        <a href="{{ route('settings.index') }}"
                            class="flex items-center w-full px-6 py-3 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-white focus:outline-none {{ request()->routeIs('settings.*') ? 'bg-gray-700 bg-opacity-25 text-white' : '' }}">
                            <svg class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="flex-1 text-left">Settings</span>
                        </a>
                    </div>

                    <!-- User Profile section at the bottom -->
                    <div class="absolute bottom-0 w-64 border-t border-gray-700">
                        @auth
                            <div class="px-6 py-4" x-data="{ open: false }">
                                <button @click="open = !open"
                                    class="flex items-center w-full text-gray-300 hover:text-white focus:outline-none">
                                    <span
                                        class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-gray-500 mr-3">
                                        <span class="text-sm font-medium leading-none text-white">
                                            {{ auth()->user()->name[0] }}
                                        </span>
                                    </span>
                                    <span class="flex-1 text-left">{{ auth()->user()->name }}</span>
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div x-show="open" @click.away="open = false"
                                    class="mt-2 py-1 bg-gray-700 rounded-md shadow-lg">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="block w-full px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-white text-left">
                                            Sign out
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endauth
                    </div>
                </nav>
            </div>
        @endif

        <!-- Main Content -->
        <div class="flex-1">
            <main class="py-10 px-8">
                @if (session('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                        role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                        role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>
