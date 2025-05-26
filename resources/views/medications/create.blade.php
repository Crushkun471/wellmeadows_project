<x-app-layout>
    <x-slot name="header">💊 Prescribe New Medication</x-slot>

    <div class="p-6">
        <form action="{{ route('medications.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block font-medium">Select Patient</label>
                <select name="patientID" required class="w-full border rounded p-2">
                    <option value="">-- Select Patient --</option>
                    @foreach($patients as $patient)
                        <option value="{{ $patient->patientID }}">{{ $patient->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-medium">Select Drug</label>
                <select name="drugID" required class="w-full border rounded p-2">
                    <option value="">-- Select Drug --</option>
                    @foreach($drugs as $drug)
                        <option value="{{ $drug->drugID }}">{{ $drug->drugName }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium">Units Per Day</label>
                    <input type="number" name="unitsPerDay" class="w-full border rounded p-2" min="1" required>
                </div>
                <div>
                    <label class="block font-medium">Method</label>
                    <input type="text" name="administrationMethod" class="w-full border rounded p-2" placeholder="e.g., Oral, IV" required>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium">Start Date</label>
                    <input type="date" name="startDate" class="w-full border rounded p-2" required>
                </div>
                <div>
                    <label class="block font-medium">End Date (optional)</label>
                    <input type="date" name="endDate" class="w-full border rounded p-2">
                </div>
            </div>

            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded">Create Medication</button>
        </form>
    </div>
</x-app-layout>
