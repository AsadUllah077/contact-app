<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Person Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    <div class="flex justify-end items-center ">
                        <a class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-full" href="{{ route('person.index') }}">Back</a>
                    </div>
                    <table class="table-fixed border-separate border-spacing-6">
                        <thead>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Business</th>
                        </thead>
                        <tbody>
                            <td>{{ $person->firstname }}</td>
                            <td>{{ $person->email }}</td>
                            <td>{{ $person->phone }}</td>
                            <td class="{{($person->business?->deleted_at?'italic' : 'non-italic')}}">{{ $person->business?->business_name }}</td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
