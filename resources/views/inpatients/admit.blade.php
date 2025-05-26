@php
    use Carbon\Carbon;
    $admittedDate = old('dateAdmittedInWard') ?? now()->toDateString();
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size: 24px; font-weight: bold; color: #f7fafc;">Admit Patient: {{ $inpatient->patient->full_name ?? 'N/A' }}</h2>
    </x-slot>

    <div style="padding: 20px; max-width: 600px; margin: 0 auto;">
        @if ($errors->any())
            <div style="color: red; margin-bottom: 15px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('inpatients.admit', $inpatient->inpatientID) }}">
            @csrf
            @method('PUT') {{-- Use PUT for updating an existing record --}}

            <p style="color: #cbd5e0; margin-bottom: 15px;">
                Patient on Waitlist since: {{ \Carbon\Carbon::parse($inpatient->datePlacedOnWaitlist)->format('Y-m-d') }}
            </p>

            <label style="color: #cbd5e0;">Ward:</label><br>
            <select name="wardID" required style="width: 100%; padding: 8px; margin-bottom: 10px; background-color: #374151; border: 1px solid #4b5563; color: #e5e7eb; border-radius: 0.375rem;">
                <option value="">-- Select Ward --</option>
                @foreach ($wards as $ward)
                    <option value="{{ $ward->wardID }}" {{ old('wardID', $inpatient->wardID) == $ward->wardID ? 'selected' : '' }}>
                        {{ $ward->wardName }}
                    </option>
                @endforeach
            </select><br>
            <x-input-error :messages="$errors->get('wardID')" class="mt-1" /><br>

            <label style="color: #cbd5e0;">Bed Number (optional):</label><br>
            <select name="bedID" style="width: 100%; padding: 8px; margin-bottom: 10px; background-color: #374151; border: 1px solid #4b5563; color: #e5e7eb; border-radius: 0.375rem;">
                <option value="">None</option>
                @foreach ($beds as $bed)
                    {{-- You might want to filter beds by ward here --}}
                    <option value="{{ $bed->bedID }}" {{ old('bedID', $inpatient->bedID) == $bed->bedID ? 'selected' : '' }}>
                        {{ $bed->bedID }} ({{ $bed->ward->wardName ?? 'Unknown Ward' }})
                    </option>
                @endforeach
            </select><br>
            <x-input-error :messages="$errors->get('bedID')" class="mt-1" /><br>


            <label style="color: #cbd5e0;">Date Admitted In Ward:</label><br>
            <input type="date" name="dateAdmittedInWard" value="{{ $admittedDate }}" required
                   style="width: 100%; padding: 8px; margin-bottom: 10px; background-color: #374151; border: 1px solid #4b5563; color: #e5e7eb; border-radius: 0.375rem;"><br>
            <x-input-error :messages="$errors->get('dateAdmittedInWard')" class="mt-1" /><br>

            <label style="color: #cbd5e0;">Expected Days to Stay:</label><br>
            <input type="number" name="expectedDaysToStay" value="{{ old('expectedDaysToStay', $inpatient->expectedDaysToStay) }}" min="1" required
                   style="width: 100%; padding: 8px; margin-bottom: 20px; background-color: #374151; border: 1px solid #4b5563; color: #e5e7eb; border-radius: 0.375rem;"><br>
            <x-input-error :messages="$errors->get('expectedDaysToStay')" class="mt-1" /><br>

            {{-- These fields are NOT part of admission --}}
            {{-- <input type="hidden" name="expectedLeave" value=""> --}}
            {{-- <input type="hidden" name="actualLeave" value=""> --}}


            <button type="submit" style="padding: 10px 20px; background-color: #22c55e; color: white; border: none; border-radius: 0.375rem; cursor: pointer;">Admit Patient</button>
        </form>
    </div>
</x-app-layout>