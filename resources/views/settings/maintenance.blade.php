<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">Maintenance Settings</h2>

            <div class="flex gap-6">
                <!-- Settings Sidebar -->
                @include('settings.partials.sidebar')

                <!-- Content Area -->
                <div class="flex-1 bg-white rounded-lg shadow p-6">
                    <form action="#" method="POST" class="space-y-6">
                        @csrf

                        <!-- Backup Settings -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Backup Settings</h3>
                            <div class="space-y-4">
                                <div>
                                    <label for="backup_frequency" class="block text-sm font-medium text-gray-700">Backup
                                        Frequency</label>
                                    <select name="backup_frequency" id="backup_frequency"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option value="daily">Daily</option>
                                        <option value="weekly">Weekly</option>
                                        <option value="monthly">Monthly</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="backup_retention" class="block text-sm font-medium text-gray-700">Backup
                                        Retention Period</label>
                                    <select name="backup_retention" id="backup_retention"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option value="7">7 days</option>
                                        <option value="30">30 days</option>
                                        <option value="90">90 days</option>
                                        <option value="365">1 year</option>
                                    </select>
                                </div>

                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input type="checkbox" name="backup_compression" id="backup_compression"
                                            class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="backup_compression" class="font-medium text-gray-700">Enable
                                            Compression</label>
                                        <p class="text-gray-500">Compress backup files to save storage space</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- System Maintenance -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">System Maintenance</h3>
                            <div class="space-y-4">
                                <div>
                                    <label for="maintenance_window"
                                        class="block text-sm font-medium text-gray-700">Maintenance Window</label>
                                    <div class="mt-1 grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="maintenance_start" class="block text-xs text-gray-500">Start
                                                Time</label>
                                            <input type="time" name="maintenance_start" id="maintenance_start"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        </div>
                                        <div>
                                            <label for="maintenance_end" class="block text-xs text-gray-500">End
                                                Time</label>
                                            <input type="time" name="maintenance_end" id="maintenance_end"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label for="maintenance_day"
                                        class="block text-sm font-medium text-gray-700">Preferred Maintenance
                                        Day</label>
                                    <select name="maintenance_day" id="maintenance_day"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option value="monday">Monday</option>
                                        <option value="tuesday">Tuesday</option>
                                        <option value="wednesday">Wednesday</option>
                                        <option value="thursday">Thursday</option>
                                        <option value="friday">Friday</option>
                                        <option value="saturday">Saturday</option>
                                        <option value="sunday">Sunday</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Cache Management -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Cache Management</h3>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input type="checkbox" name="auto_cache_clear" id="auto_cache_clear"
                                            class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="auto_cache_clear" class="font-medium text-gray-700">Auto Clear
                                            Cache</label>
                                        <p class="text-gray-500">Automatically clear application cache during
                                            maintenance</p>
                                    </div>
                                </div>

                                <div>
                                    <label for="cache_lifetime" class="block text-sm font-medium text-gray-700">Cache
                                        Lifetime</label>
                                    <select name="cache_lifetime" id="cache_lifetime"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option value="60">1 hour</option>
                                        <option value="720">12 hours</option>
                                        <option value="1440">24 hours</option>
                                        <option value="10080">1 week</option>
                                    </select>
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
