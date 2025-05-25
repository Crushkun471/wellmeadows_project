<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Staff List
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('staff.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Add Staff
        </a>

        @if (session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Position</th>
                        <th class="px-4 py-2">Salary</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staff as $member)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $member->name }}</td>
                            <td class="px-4 py-2">{{ $member->position }}</td>
                            <td class="px-4 py-2">${{ number_format($member->currentSalary, 2) }}</td>
                            <td class="px-4 py-2 flex space-x-2">
                                <a href="{{ route('staff.show', $member) }}" class="text-blue-600 hover:underline">View</a>
                                <a href="{{ route('staff.edit', $member) }}" class="text-yellow-600 hover:underline">Edit</a>
                                <form method="POST" action="{{ route('staff.destroy', $member) }}" onsubmit="return confirm('Delete this staff member?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($staff->isEmpty())
                        <tr><td colspan="4" class="text-center py-4">No staff found.</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
