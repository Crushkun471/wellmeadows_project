<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Inpatients Management') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded-md mb-4">
                {{ session('error') }}
            </div>
        @endif

        {{-- Waiting List Dropdown --}}
        <button type="button" onclick="toggleSection('waitingListSection')"
                class="w-full bg-red-600 text-white font-bold py-3 rounded-md cursor-pointer focus:outline-none">
            Waiting List ({{ $waitingList->count() }} patients)
        </button>
        <div id="waitingListSection" class="border border-red-300 rounded-md mt-2 p-4 bg-red-50 max-h-[500px] overflow-auto">
            <table class="min-w-full divide-y divide-gray-700 text-gray-700">
                <thead>
                    <tr>
                        <th class="px-3 py-2 text-left text-xs font-semibold uppercase">Patient No</th>
                        <th class="px-3 py-2 text-left text-xs font-semibold uppercase">Full Name</th>
                        <th class="px-3 py-2 text-left text-xs font-semibold uppercase">Sex</th>
                        <th class="px-3 py-2 text-left text-xs font-semibold uppercase">Address</th>
                        <th class="px-3 py-2 text-left text-xs font-semibold uppercase">Ward Required</th>
                        <th class="px-3 py-2 text-left text-xs font-semibold uppercase">Expected Stay (Days)</th>
                        <th class="px-3 py-2 text-right text-xs font-semibold uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($waitingList as $inpatient)
                        <tr class="even:bg-red-100">
                            <td class="px-3 py-1">{{ $inpatient->patient->patientID ?? 'N/A' }}</td>
                            <td class="px-3 py-1">{{ $inpatient->patient->full_name ?? 'N/A' }}</td>
                            <td class="px-3 py-1">{{ $inpatient->patient->sex ?? 'N/A' }}</td>
                            <td class="px-3 py-1">{{ $inpatient->patient->address ?? 'N/A' }}</td>
                            <td class="px-3 py-1">{{ $inpatient->wardRequired ?? 'N/A' }}</td>
                            <td class="px-3 py-1">{{ $inpatient->expectedDaysToStay ?? 'N/A' }}</td>
                            <td class="px-3 py-1 text-right space-x-2">
                                <a href="{{ route('inpatients.admitPatientForm', $inpatient->inpatientID) }}" class="text-green-600 hover:underline">Admit</a>
                                <a href="{{ route('inpatients.edit', $inpatient->inpatientID) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('inpatients.destroy', $inpatient->inpatientID) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-3 py-1 text-center text-gray-500 italic">No patients in the waiting list.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Admitted Patients Dropdown --}}
        <button type="button" onclick="toggleSection('admittedPatientsSection')"
                class="w-full bg-green-600 text-white font-bold py-3 rounded-md cursor-pointer focus:outline-none mt-6">
            Admitted Patients ({{ $admittedPatients->count() }} patients)
        </button>
        <div id="admittedPatientsSection" class="border border-green-300 rounded-md mt-2 p-4 bg-green-50 max-h-[500px] overflow-auto">
            <table class="min-w-full divide-y divide-gray-700 text-gray-700">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Patient</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Ward</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Bed</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Date Admitted</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Expected Stay (Days)</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Expected Leave</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($admittedPatients as $inpatient)
                        <tr class="even:bg-green-100">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $inpatient->patient->full_name ?? 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $inpatient->ward->wardName ?? 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $inpatient->bedID ?? 'None' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $inpatient->dateAdmittedInWard ? \Carbon\Carbon::parse($inpatient->dateAdmittedInWard)->format('Y-m-d') : 'N/A' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $inpatient->expectedDaysToStay ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $inpatient->expectedLeave ? \Carbon\Carbon::parse($inpatient->expectedLeave)->format('Y-m-d') : 'N/A' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                <a href="{{ route('inpatients.editAdmitted', $inpatient->inpatientID) }}" class="text-blue-600 hover:text-blue-800">Edit Admitted</a>
                                <form method="POST" action="{{ route('inpatients.destroy', $inpatient->inpatientID) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this inpatient?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500 italic">No admitted patients found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Discharged Patients Dropdown (New Section) --}}
        <button type="button" onclick="toggleSection('dischargedPatientsSection')"
                class="w-full bg-blue-600 text-white font-bold py-3 rounded-md cursor-pointer focus:outline-none mt-6">
            Discharged Patients ({{ $dischargedPatients->count() }} patients)
        </button>
        <div id="dischargedPatientsSection" class="border border-blue-300 rounded-md mt-2 p-4 bg-blue-50 max-h-[500px] overflow-auto">
            <table class="min-w-full divide-y divide-gray-700 text-gray-700">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Patient</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Ward</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Bed</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Date Admitted</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Actual Leave</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dischargedPatients as $inpatient)
                        <tr class="even:bg-blue-100">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $inpatient->patient->full_name ?? 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $inpatient->ward->wardName ?? 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $inpatient->bedID ?? 'None' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $inpatient->dateAdmittedInWard ? \Carbon\Carbon::parse($inpatient->dateAdmittedInWard)->format('Y-m-d') : 'N/A' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $inpatient->actualLeave ? \Carbon\Carbon::parse($inpatient->actualLeave)->format('Y-m-d') : 'N/A' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                {{-- You might only allow view or delete here for discharged patients --}}
                                <form method="POST" action="{{ route('inpatients.destroy', $inpatient->inpatientID) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this discharged inpatient record?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500 italic">No discharged patients found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function toggleSection(id) {
            const section = document.getElementById(id);
            if (!section) return;
            if (section.style.display === 'none' || section.style.display === '') {
                section.style.display = 'block';
            } else {
                section.style.display = 'none';
            }
        }

        // Optionally, start with sections collapsed
        document.getElementById('waitingListSection').style.display = 'none';
        document.getElementById('admittedPatientsSection').style.display = 'none';
        document.getElementById('dischargedPatientsSection').style.display = 'none';
    </script>

</x-app-layout>