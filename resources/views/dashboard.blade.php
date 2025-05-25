{{-- resources/views/dashboard.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wellmeadows Hospital Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                {{-- Staff Section --}}
                <a href="{{ route('staff.index') }}" class="bg-white border border-gray-200 hover:shadow-lg transition rounded-lg p-6 text-center">
                    <h3 class="text-lg font-semibold text-blue-700">Manage Staff</h3>
                    <p class="text-gray-600 mt-2">View, add, edit, or delete hospital staff records.</p>
                </a>

                {{-- Add more links here if needed --}}
                {{-- Example: Patients, Appointments, Wards, etc. --}}
            </div>

        </div>
    </div>
</x-app-layout>
