<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Edit Staff Member
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow-sm">
            <form action="{{ route('staff.update', $staff) }}" method="POST">
                @csrf
                @method('PUT')
                @include('staff._form', ['staff' => $staff])
                <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>
