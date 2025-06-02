<div class="w-64 bg-white rounded-lg shadow">
    <nav class="space-y-1">
        <a href="{{ route('settings.general') }}"
            class="flex items-center px-4 py-3 text-sm font-medium {{ request()->routeIs('settings.general') ? 'text-indigo-700 bg-indigo-50 hover:bg-indigo-100' : 'text-gray-900 hover:bg-gray-50' }}">
            <svg class="mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
            </svg>
            General Options
        </a>

        <a href="{{ route('settings.customizations') }}"
            class="flex items-center px-4 py-3 text-sm font-medium {{ request()->routeIs('settings.customizations') ? 'text-indigo-700 bg-indigo-50 hover:bg-indigo-100' : 'text-gray-900 hover:bg-gray-50' }}">
            <svg class="mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
            </svg>
            Customizations
        </a>

        <a href="{{ route('settings.integrations') }}"
            class="flex items-center px-4 py-3 text-sm font-medium {{ request()->routeIs('settings.integrations') ? 'text-indigo-700 bg-indigo-50 hover:bg-indigo-100' : 'text-gray-900 hover:bg-gray-50' }}">
            <svg class="mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
            Integrations
        </a>

        <a href="{{ route('settings.workflows') }}"
            class="flex items-center px-4 py-3 text-sm font-medium {{ request()->routeIs('settings.workflows') ? 'text-indigo-700 bg-indigo-50 hover:bg-indigo-100' : 'text-gray-900 hover:bg-gray-50' }}">
            <svg class="mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            Workflows
        </a>

        <a href="{{ route('settings.notifications') }}"
            class="flex items-center px-4 py-3 text-sm font-medium {{ request()->routeIs('settings.notifications') ? 'text-indigo-700 bg-indigo-50 hover:bg-indigo-100' : 'text-gray-900 hover:bg-gray-50' }}">
            <svg class="mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            Notifications
        </a>

        <a href="{{ route('settings.maintenance') }}"
            class="flex items-center px-4 py-3 text-sm font-medium {{ request()->routeIs('settings.maintenance') ? 'text-indigo-700 bg-indigo-50 hover:bg-indigo-100' : 'text-gray-900 hover:bg-gray-50' }}">
            <svg class="mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
            Maintenance
        </a>

        <a href="{{ route('settings.system-logs') }}"
            class="flex items-center px-4 py-3 text-sm font-medium {{ request()->routeIs('settings.system-logs') ? 'text-indigo-700 bg-indigo-50 hover:bg-indigo-100' : 'text-gray-900 hover:bg-gray-50' }}">
            <svg class="mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            System Logs
        </a>
    </nav>
</div>
