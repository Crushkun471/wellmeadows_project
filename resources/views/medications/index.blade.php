<x-app-layout>
    <x-slot name="header">📋 Medication History</x-slot>

    <div class="p-6">
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
        @endif

        <a href="{{ route('medications.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">➕ Prescribe Medication</a>

        <table class="w-full mt-6 border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-2 py-1">Patient</th>
                    <th class="border px-2 py-1">Drug</th>
                    <th class="border px-2 py-1">Units/Day</th>
                    <th class="border px-2 py-1">Method</th>
                    <th class="border px-2 py-1">Start</th>
                    <th class="border px-2 py-1">End</th>
                    <th class="border px-2 py-1">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($medications as $med)
                <tr class="border-t">
                    <td class="border px-2 py-1">{{ $med->patient->name }}</td>
                    <td class="border px-2 py-1">{{ $med->drug->drugName }}</td>
                    <td class="border px-2 py-1">{{ $med->unitsPerDay }}</td>
                    <td class="border px-2 py-1">{{ $med->administrationMethod }}</td>
                    <td class="border px-2 py-1">{{ $med->startDate }}</td>
                    <td class="border px-2 py-1">{{ $med->endDate ?? 'Ongoing' }}</td>
                    <td class="border px-2 py-1">
                        <a href="{{ route('medications.show', $med->medicationID) }}">Details</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
