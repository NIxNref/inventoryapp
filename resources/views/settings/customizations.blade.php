<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">Customizations</h2>

            <div class="flex gap-6">
                <!-- Settings Sidebar -->
                @include('settings.partials.sidebar')

                <!-- Content Area -->
                <div class="flex-1 bg-white rounded-lg shadow p-6">
                    <form action="#" method="POST" class="space-y-6">
                        @csrf

                        <!-- Theme Settings -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Theme Settings</h3>
                            <div class="grid grid-cols-1 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Color Scheme</label>
                                    <div class="mt-4 grid grid-cols-3 gap-4">
                                        <div class="relative flex items-center">
                                            <input type="radio" name="color_scheme" value="light"
                                                class="peer sr-only" checked>
                                            <label for="light"
                                                class="peer-checked:border-indigo-600 peer-checked:ring-1 peer-checked:ring-indigo-600 absolute inset-0 cursor-pointer rounded-lg border border-gray-300"></label>
                                            <div class="p-4 w-full text-center">
                                                <div class="h-12 bg-white border border-gray-200 rounded-md mb-2"></div>
                                                <span class="text-sm font-medium text-gray-900">Light</span>
                                            </div>
                                        </div>
                                        <div class="relative flex items-center">
                                            <input type="radio" name="color_scheme" value="dark"
                                                class="peer sr-only">
                                            <label for="dark"
                                                class="peer-checked:border-indigo-600 peer-checked:ring-1 peer-checked:ring-indigo-600 absolute inset-0 cursor-pointer rounded-lg border border-gray-300"></label>
                                            <div class="p-4 w-full text-center">
                                                <div class="h-12 bg-gray-900 rounded-md mb-2"></div>
                                                <span class="text-sm font-medium text-gray-900">Dark</span>
                                            </div>
                                        </div>
                                        <div class="relative flex items-center">
                                            <input type="radio" name="color_scheme" value="system"
                                                class="peer sr-only">
                                            <label for="system"
                                                class="peer-checked:border-indigo-600 peer-checked:ring-1 peer-checked:ring-indigo-600 absolute inset-0 cursor-pointer rounded-lg border border-gray-300"></label>
                                            <div class="p-4 w-full text-center">
                                                <div
                                                    class="h-12 bg-gradient-to-r from-white to-gray-900 rounded-md mb-2">
                                                </div>
                                                <span class="text-sm font-medium text-gray-900">System</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label for="accent_color" class="block text-sm font-medium text-gray-700">Accent
                                        Color</label>
                                    <select name="accent_color" id="accent_color"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option value="indigo">Indigo</option>
                                        <option value="blue">Blue</option>
                                        <option value="green">Green</option>
                                        <option value="red">Red</option>
                                        <option value="purple">Purple</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Layout Settings -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Layout Settings</h3>
                            <div class="space-y-4">
                                <div>
                                    <label for="sidebar_position"
                                        class="block text-sm font-medium text-gray-700">Sidebar Position</label>
                                    <select name="sidebar_position" id="sidebar_position"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option value="left">Left</option>
                                        <option value="right">Right</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="content_width" class="block text-sm font-medium text-gray-700">Content
                                        Width</label>
                                    <select name="content_width" id="content_width"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option value="full">Full Width</option>
                                        <option value="contained">Contained</option>
                                    </select>
                                </div>

                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input type="checkbox" name="show_breadcrumbs" id="show_breadcrumbs"
                                            class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="show_breadcrumbs" class="font-medium text-gray-700">Show
                                            Breadcrumbs</label>
                                        <p class="text-gray-500">Display navigation breadcrumbs at the top of each page
                                        </p>
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
