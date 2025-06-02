<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">General Settings</h2>

            <div class="flex gap-6">
                <!-- Settings Sidebar -->
                @include('settings.partials.sidebar')

                <!-- Content Area -->
                <div class="flex-1 bg-white rounded-lg shadow p-6">
                    <form action="#" method="POST" class="space-y-6">
                        @csrf

                        <!-- Company Information -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Company Information</h3>
                            <div class="grid grid-cols-1 gap-4">
                                <div>
                                    <label for="company_name" class="block text-sm font-medium text-gray-700">Company
                                        Name</label>
                                    <input type="text" name="company_name" id="company_name"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        value="{{ old('company_name', 'Your Company Name') }}">
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Contact
                                        Email</label>
                                    <input type="email" name="email" id="email"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        value="{{ old('email', 'contact@example.com') }}">
                                </div>
                            </div>
                        </div>

                        <!-- System Settings -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">System Settings</h3>
                            <div class="grid grid-cols-1 gap-4">
                                <div>
                                    <label for="timezone"
                                        class="block text-sm font-medium text-gray-700">Timezone</label>
                                    <select name="timezone" id="timezone"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option value="UTC">UTC</option>
                                        <option value="America/New_York">Eastern Time</option>
                                        <option value="America/Chicago">Central Time</option>
                                        <option value="America/Denver">Mountain Time</option>
                                        <option value="America/Los_Angeles">Pacific Time</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="date_format" class="block text-sm font-medium text-gray-700">Date
                                        Format</label>
                                    <select name="date_format" id="date_format"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option value="Y-m-d">YYYY-MM-DD</option>
                                        <option value="m/d/Y">MM/DD/YYYY</option>
                                        <option value="d/m/Y">DD/MM/YYYY</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Notification Preferences -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Notification Preferences</h3>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input type="checkbox" name="email_notifications" id="email_notifications"
                                            class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="email_notifications" class="font-medium text-gray-700">Email
                                            Notifications</label>
                                        <p class="text-gray-500">Receive email notifications for important updates</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input type="checkbox" name="system_notifications" id="system_notifications"
                                            class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="system_notifications" class="font-medium text-gray-700">System
                                            Notifications</label>
                                        <p class="text-gray-500">Receive in-app notifications for system events</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
