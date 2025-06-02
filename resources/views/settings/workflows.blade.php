<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">Workflow Settings</h2>

            <div class="flex gap-6">
                <!-- Settings Sidebar -->
                @include('settings.partials.sidebar')

                <!-- Content Area -->
                <div class="flex-1 bg-white rounded-lg shadow p-6">
                    <form action="#" method="POST" class="space-y-6">
                        @csrf

                        <!-- Asset Request Workflow -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Asset Request Workflow</h3>
                            <div class="space-y-4">
                                <div>
                                    <label for="approval_required"
                                        class="block text-sm font-medium text-gray-700">Approval Process</label>
                                    <select name="approval_required" id="approval_required"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option value="none">No approval required</option>
                                        <option value="single">Single level approval</option>
                                        <option value="multi">Multi-level approval</option>
                                    </select>
                                </div>

                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input type="checkbox" name="auto_approve_below_amount"
                                            id="auto_approve_below_amount"
                                            class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="auto_approve_below_amount"
                                            class="font-medium text-gray-700">Auto-approve Below Amount</label>
                                        <p class="text-gray-500">Automatically approve requests below a certain value
                                        </p>
                                    </div>
                                </div>

                                <div>
                                    <label for="auto_approve_amount"
                                        class="block text-sm font-medium text-gray-700">Auto-approve Threshold</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm">$</span>
                                        </div>
                                        <input type="number" name="auto_approve_amount" id="auto_approve_amount"
                                            class="pl-7 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="0.00">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Automation Rules -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Automation Rules</h3>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input type="checkbox" name="auto_assign" id="auto_assign"
                                            class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="auto_assign" class="font-medium text-gray-700">Auto-assign
                                            Assets</label>
                                        <p class="text-gray-500">Automatically assign assets based on department rules
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input type="checkbox" name="auto_return" id="auto_return"
                                            class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="auto_return" class="font-medium text-gray-700">Auto-return
                                            Process</label>
                                        <p class="text-gray-500">Automatically initiate return process for temporary
                                            assignments</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input type="checkbox" name="auto_maintenance" id="auto_maintenance"
                                            class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="auto_maintenance" class="font-medium text-gray-700">Auto-schedule
                                            Maintenance</label>
                                        <p class="text-gray-500">Automatically schedule maintenance based on usage
                                            patterns</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Notification Rules -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Workflow Notifications</h3>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input type="checkbox" name="notify_approvers" id="notify_approvers"
                                            class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="notify_approvers" class="font-medium text-gray-700">Notify
                                            Approvers</label>
                                        <p class="text-gray-500">Send notifications to approvers when new requests are
                                            submitted</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input type="checkbox" name="notify_requesters" id="notify_requesters"
                                            class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="notify_requesters" class="font-medium text-gray-700">Notify
                                            Requesters</label>
                                        <p class="text-gray-500">Send notifications to requesters about request status
                                            changes</p>
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
