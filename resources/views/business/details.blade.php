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
                    <div class="flex justify-end items-center ">
                        <a class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-full" href="{{ route('business.index') }}">Back</a>
                    </div>
                    <table class="table-fixed border-separate border-spacing-6">
                        <thead>
                            <th>Business Name</th>
                            <th>Contact Email</th>
                            <th>Tasks</th>
                        </thead>
                        <tbody>
                           <td>{{$business->business_name}}</td>
                           <td>{{$business->contact_email}}</td>
                           <td>
                            @foreach ($business?->tasks as $per)
                            <h4 class="font-semibold">{{ $per->title }}</h4>
                            <br>
                            <p>{{ $per->description }}</p>
                            @endforeach
                        </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
