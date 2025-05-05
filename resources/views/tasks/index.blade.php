<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    {{-- <div class="flex justify-end items-center ">
                        <a class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-full" href="{{ route('task.create') }}">Add
                            task</a>
                    </div> --}}
                    <table class="table-fixed border-separate border-spacing-6">
                        <thead>
                            <th>Task Name</th>
                            <th>Task Type</th>
                            <th>Description</th>
                            <th>Status</th>
                            {{-- <th>Action</th> --}}
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td><a href="#">{{ $task->title }}</a></td>
                                    <td>{{ $task->taskable?->firstname}} {{ $task->taskable?->business_name}}</td>
                                    <td>
                                        {{ $task->description }}
                                    </td>
                                    <td class="flex
                                    ">
                                     <a class="text-gray-600 py-2 px-3 hover:bg-blue-600 hover:text-white rounded-full bg-blue-300" href="{{route('task.edit', $task->id)}}">{{ $task->status }}</a>
                                      {{--  <a href="{{route('task.destroy', $task->id)}}" onclick="return confirm('Are you want to delete?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                        </a> --}}

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
