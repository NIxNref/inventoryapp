<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">Notification Settings</h2>

            <div class="flex gap-6">
                <!-- Settings Sidebar -->
                @include('settings.partials.sidebar')

                <!-- Content Area -->
                <div class="flex-1 bg-white rounded-lg shadow p-6">
                    <form action="#" method="POST" class="space-y-6">
                        @csrf

                        <!-- Email Notifications -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Email Notifications</h3>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input type="checkbox" name="email_asset_requests" id="email_asset_requests"
                                            class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="email_asset_requests" class="font-medium text-gray-700">Asset
                                            Requests</label>
                                        <p class="text-gray-500">Receive email notifications for new asset requests and
                                            approvals</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input type="checkbox" name="email_maintenance" id="email_maintenance"
                                            class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="email_maintenance" class="font-medium text-gray-700">Maintenance
                                            Alerts</label>
                                        <p class="text-gray-500">Receive email notifications for maintenance schedules
                                            and updates</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input type="checkbox" name="email_inventory" id="email_inventory"
                                            class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="email_inventory" class="font-medium text-gray-700">Inventory
                                            Updates</label>
                                        <p class="text-gray-500">Receive email notifications for low stock and inventory
                                            changes</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- System Notifications -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">System Notifications</h3>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input type="checkbox" name="system_alerts" id="system_alerts"
                                            class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="system_alerts" class="font-medium text-gray-700">System
                                            Alerts</label>
                                        <p class="text-gray-500">Show in-app notifications for system alerts and updates
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input type="checkbox" name="task_reminders" id="task_reminders"
                                            class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="task_reminders" class="font-medium text-gray-700">Task
                                            Reminders</label>
                                        <p class="text-gray-500">Show in-app reminders for pending tasks and approvals
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Notification Schedule -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Notification Schedule</h3>
                            <div class="space-y-4">
                                <div>
                                    <label for="notification_frequency"
                                        class="block text-sm font-medium text-gray-700">Email Digest Frequency</label>
                                    <select name="notification_frequency" id="notification_frequency"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option value="immediate">Immediate</option>
                                        <option value="daily">Daily Digest</option>
                                        <option value="weekly">Weekly Digest</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="quiet_hours" class="block text-sm font-medium text-gray-700">Quiet
                                        Hours</label>
                                    <div class="mt-1 grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="quiet_hours_start" class="block text-xs text-gray-500">Start
                                                Time</label>
                                            <input type="time" name="quiet_hours_start" id="quiet_hours_start"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        </div>
                                        <div>
                                            <label for="quiet_hours_end" class="block text-xs text-gray-500">End
                                                Time</label>
                                            <input type="time" name="quiet_hours_end" id="quiet_hours_end"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        </div>
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
