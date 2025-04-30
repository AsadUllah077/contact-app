<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('People') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="font-semibold">Add Person</h1>
                    <form action="{{ route('person.store') }}" method="POST" class="p-4 rounded mx-auto">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-6 gap-4">
                            <!-- First Name -->
                            <div class="sm:col-span-3">
                                <label class="block text-sm font-medium text-gray-700">First Name</label>
                                <input type="text" name="firstname" value="{{ old('firstname') }}"
                                    class="mt-1 block w-full rounded-md border @error('firstname') border-red-500 @else border-gray-300 @enderror p-2 focus:ring-blue-500 focus:border-blue-500" />
                                @error('firstname')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Last Name -->
                            <div class="sm:col-span-3">
                                <label class="block text-sm font-medium text-gray-700">Last Name</label>
                                <input type="text" name="lastname" value="{{ old('lastname') }}"
                                    class="mt-1 block w-full rounded-md border @error('lastname') border-red-500 @else border-gray-300 @enderror p-2 focus:ring-blue-500 focus:border-blue-500" />
                                @error('lastname')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="sm:col-span-3">
                                <label class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}"
                                    class="mt-1 block w-full rounded-md border @error('email') border-red-500 @else border-gray-300 @enderror p-2 focus:ring-blue-500 focus:border-blue-500" />
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="sm:col-span-3">
                                <label class="block text-sm font-medium text-gray-700">Phone</label>
                                <input type="text" name="phone" value="{{ old('phone') }}"
                                    class="mt-1 block w-full rounded-md border @error('phone') border-red-500 @else border-gray-300 @enderror p-2 focus:ring-blue-500 focus:border-blue-500" />
                                @error('phone')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end items-center mt-3 gap-4">
                            <a href="{{route('person.index')}}">Cancel</a>
                            <button type="submit"  class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-full" >Add Person</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
