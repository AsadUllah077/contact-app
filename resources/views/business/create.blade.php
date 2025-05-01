<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Business') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="font-semibold">Add Business</h1>
                    <form action="{{ route('business.store') }}" method="POST" class="p-4 rounded mx-auto">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-6 gap-4">
                            <!-- First Name -->
                            <div class="sm:col-span-3">
                                <label class="block text-sm font-medium text-gray-700">Business Name</label>
                                <input type="text" name="business_name" value="{{ old('business_name') }}"
                                    class="mt-1 block w-full rounded-md border @error('business_name') border-red-500 @else border-gray-300 @enderror p-2 focus:ring-blue-500 focus:border-blue-500" />
                                @error('business_name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Last Name -->
                            <div class="sm:col-span-3">
                                <label class="block text-sm font-medium text-gray-700">Contact Email</label>
                                <input type="email" name="contact_email" value="{{ old('contact_email') }}"
                                    class="mt-1 block w-full rounded-md border @error('contact_email') border-red-500 @else border-gray-300 @enderror p-2 focus:ring-blue-500 focus:border-blue-500" />
                                @error('contact_email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>


                        </div>

                        <div class="flex justify-end items-center mt-3 gap-4">
                            <a href="{{ route('business.index') }}">Cancel</a>
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-full">Add
                                business</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
