<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl sm:text-2xl text-gray-800 leading-tight">
            {{ __('Person Details') }}
        </h2>
    </x-slot>

    <div class="py-6 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-6 text-gray-900">
                    <!-- Back Button -->
                    <div class="flex justify-end mb-4">
                        <a class="bg-blue-500 hover:bg-blue-600 text-white text-sm sm:text-base px-3 py-2 rounded-full" href="{{ route('person.index') }}">
                            Back
                        </a>
                    </div>

                    <div class="flex flex-col lg:flex-row gap-8">
                        <!-- Left side: Person Details -->
                        <div class="w-full lg:w-1/2">
                            <div class="overflow-x-auto">
                                <table class="table-auto min-w-full border-separate border-spacing-4">
                                    <thead>
                                        <tr class="text-left text-sm font-semibold text-gray-700">
                                            <th class="pr-4">Name</th>
                                            <th class="pr-4">Email</th>
                                            <th class="pr-4">Phone</th>
                                            <th class="pr-4">Business</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-sm sm:text-base">
                                            <td class="pr-4">{{ $person->firstname }}</td>
                                            <td class="pr-4">{{ $person->email }}</td>
                                            <td class="pr-4">{{ $person->phone }}</td>
                                            <td class="pr-4 {{($person->business?->deleted_at ? 'italic' : 'non-italic')}}">
                                                {{ $person->business?->business_name }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Right side: Add Task Form & Task List -->
                        <div class="w-full lg:w-1/2">
                            <!-- Task Form -->
                            <form action="{{ route('task.store') }}" method="POST" class="mb-6">
                                @csrf
                                <input type="hidden" name="taskable_id" value="{{ $person->id }}">
                                <input type="hidden" name="taskable_type" value="person">

                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Title</label>
                                    <input type="text" name="title" required class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300">
                                </div>

                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea name="description" rows="3" required class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300"></textarea>
                                </div>

                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md text-sm sm:text-base">
                                    Add Task
                                </button>
                            </form>

                            <!-- Task List -->
                            <div>
                                <h3 class="text-lg font-semibold mb-2">Tasks</h3>
                                @forelse ($person?->tasks as $task)
                                    <div class="mb-4 border p-4 rounded shadow-sm bg-gray-50">
                                        <h4 class="font-semibold text-blue-700">{{ $task->title }}</h4>
                                        <p class="text-gray-600">{{ $task->description }}</p>
                                        {{-- <button class="text-gray-600 py-2 px-3 hover:bg-blue-600 hover:text-white rounded-full bg-blue-300">{{ $task->status }}</button> --}}
                                        <a class="text-gray-600 py-2 px-3 hover:bg-blue-600 hover:text-white rounded-full bg-blue-300" href="{{route('task.edit', $task->id)}}">{{ $task->status }}</a>
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
