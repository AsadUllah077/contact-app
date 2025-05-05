<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Business Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-end mb-4">
                        <a class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-full" href="{{ route('business.index') }}">Back</a>
                    </div>

                    <div class="flex flex-col lg:flex-row gap-8">
                        <!-- Left side: Business Details -->
                        <div class="w-full lg:w-1/2">
                            <table class="table-fixed border-separate border-spacing-6 w-full">
                                <thead>
                                    <tr>
                                        <th>Business Name</th>
                                        <th>Contact Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $business->business_name }}</td>
                                        <td>{{ $business->contact_email }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Right side: Add Task Form + Task List -->
                        <div class="w-full lg:w-1/2">
                            <!-- Add Task Form -->
                            <form action="{{ route('task.store') }}" method="POST" class="mb-6">
                                @csrf
                                <input type="hidden" name="taskable_id" value="{{ $business->id }}">
                                <input type="hidden" name="taskable_type" value="business">
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Title</label>
                                    <input type="text" name="title" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200">
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea name="description" rows="3" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200"></textarea>
                                </div>
                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">
                                    Add Task
                                </button>
                            </form>

                            <!-- Task List -->
                            <div>
                                <h3 class="text-lg font-semibold mb-2">Tasks</h3>
                                @forelse ($business?->tasks as $task)
                                    <div class="mb-4 border p-4 rounded shadow-sm">
                                        <h4 class="font-semibold text-blue-700">{{ $task->title }}</h4>
                                        <p class="text-gray-600">{{ $task->description }}</p>
                                        <button class="text-gray-600 py-2 px-3 hover:bg-blue-600 hover:text-white rounded-full bg-blue-300">{{ $task->status }}</button>
                                    </div>
                                @empty
                                    <p class="text-gray-500">No tasks available.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
