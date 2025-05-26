<x-app-layout>
    <x-slot name="header">🩺 Administer Medication</x-slot>

    <div class="p-6">
        <form action="{{ route('medications.administer.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block font-medium">Select Medication</label>
                <select name="medicationID" required class="w-full border rounded p-2">
                    <option value="">-- Select --</option>
                    @foreach($medications as $med)
                        <option value="{{ $med->medicationID }}">
                            {{ $med->patient->name }} - {{ $med->drug->drugName }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-medium">Administration Time</label>
                <input type="datetime-local" name="administrationTime" required class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-medium">Notes (optional)</label>
                <textarea name="notes" rows="3" class="w-full border rounded p-2"></textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">Submit</button>
        </form>
    </div>
</x-app-layout>
