<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-900">Integrations</h2>
                <button type="button"
                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add Integration
                </button>
            </div>

            <div class="flex gap-6">
                <!-- Settings Sidebar -->
                @include('settings.partials.sidebar')

                <!-- Content Area -->
                <div class="flex-1 space-y-6">
                    <!-- Service Management URL -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="mb-4">
                            <label for="service_url" class="block text-sm font-medium text-gray-700">
                                Service Management Public URL
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="service_url" id="service_url"
                                    class="flex-1 min-w-0 block w-full px-3 py-2 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="https://support.asiasinergi.net"
                                    value="https://support.asiasinergi.net">
                            </div>
                            <p class="mt-2 text-sm text-gray-500">Enter the public URL of Service Management.</p>
                        </div>
                    </div>

                    <!-- Applications Section -->
                    <div class="bg-white rounded-lg shadow divide-y divide-gray-200">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900">Applications</h3>
                            <p class="mt-1 text-sm text-gray-500">Add and manage applications compatible with Service
                                Management.</p>
                        </div>

                        <!-- Microsoft Teams Integration -->
                        <div class="p-6">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <img class="h-12 w-12 rounded" src="https://www.microsoft.com/favicon.ico"
                                        alt="Microsoft Teams">
                                </div>
                                <div class="ml-4 flex-1">
                                    <div class="flex items-center justify-between">
                                        <h4 class="text-lg font-medium text-gray-900">Microsoft Teams</h4>
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Configure
                                        </button>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-500">Enables integration with Microsoft Teams and
                                        activates the Virtual Agent.</p>
                                    <div class="mt-2">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            Connected
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Zapier Integration -->
                        <div class="p-6">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <img class="h-12 w-12 rounded" src="{{ asset('images/icons/zapier-icon.png') }}"
                                        alt="Zapier">
                                </div>
                                <div class="ml-4 flex-1">
                                    <div class="flex items-center justify-between">
                                        <h4 class="text-lg font-medium text-gray-900">Zapier</h4>
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded-full shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Connect
                                        </button>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-500">Enables integration with Slack, Google
                                        Calendar and a wide variety of applications.</p>
                                    <div class="mt-2">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            Not Connected
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Resources Section -->
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">Resources</h3>
                            <p class="mt-1 text-sm text-gray-500">Additional integration resources and documentation.
                            </p>
                        </div>
                        <div class="p-6">
                            <ul class="divide-y divide-gray-200">
                                <li class="py-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900">API Documentation</p>
                                            <p class="text-sm text-gray-500">Complete API reference and integration
                                                guides</p>
                                        </div>
                                        <div>
                                            <a href="#"
                                                class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                                View
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900">Webhooks Guide</p>
                                            <p class="text-sm text-gray-500">Learn how to set up and manage webhooks</p>
                                        </div>
                                        <div>
                                            <a href="#"
                                                class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                                View
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
