<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Staff Allocated to Each Ward</h2>
    </x-slot>

    <div class="py-6 px-8">
        @foreach ($wards as $ward)
            <div class="mb-6 border rounded-lg shadow p-4">
                <h3 class="text-lg font-semibold text-blue-700">{{ $ward->wardName }} ({{ $ward->location }})</h3>
                <p class="text-sm text-gray-500 mb-2">Total Beds: {{ $ward->totalBeds }} | Tel: {{ $ward->telExtension }}</p>

                @if ($ward->staff->count() > 0)
                    <table class="w-full table-auto border mt-3">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-3 py-2 border">Name</th>
                                <th class="px-3 py-2 border">Position</th>
                                <th class="px-3 py-2 border">Telephone</th>
                                <th class="px-3 py-2 border">Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ward->staff as $staff)
                                <tr>
                                    <td class="px-3 py-2 border">{{ $staff->name }}</td>
                                    <td class="px-3 py-2 border">{{ $staff->position }}</td>
                                    <td class="px-3 py-2 border">{{ $staff->telephone }}</td>
                                    <td class="px-3 py-2 border">${{ number_format($staff->currentSalary, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-red-500 mt-2">No staff assigned to this ward.</p>
                @endif
            </div>
        @endforeach
    </div>
</x-app-layout>
