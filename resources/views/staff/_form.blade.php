@php
    $isEdit = isset($staff);
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <label class="block">Name</label>
        <input type="text" name="name" value="{{ old('name', $staff->name ?? '') }}" class="w-full border p-2 rounded">
        @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label class="block">Address</label>
        <input type="text" name="address" value="{{ old('address', $staff->address ?? '') }}" class="w-full border p-2 rounded">
        @error('address') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label class="block">Telephone</label>
        <input type="text" name="telephone" value="{{ old('telephone', $staff->telephone ?? '') }}" class="w-full border p-2 rounded">
        @error('telephone') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label class="block">Date of Birth</label>
        <input type="date" name="dateOfBirth" value="{{ old('dateOfBirth', $staff->dateOfBirth ?? '') }}" class="w-full border p-2 rounded">
        @error('dateOfBirth') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label class="block">Sex</label>
        <select name="sex" class="w-full border p-2 rounded">
            <option value="M" {{ old('sex', $staff->sex ?? '') == 'M' ? 'selected' : '' }}>Male</option>
            <option value="F" {{ old('sex', $staff->sex ?? '') == 'F' ? 'selected' : '' }}>Female</option>
        </select>
        @error('sex') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label class="block">National Insurance Number</label>
        <input type="text" name="nationalInsuranceNumber" value="{{ old('nationalInsuranceNumber', $staff->nationalInsuranceNumber ?? '') }}" class="w-full border p-2 rounded">
        @error('nationalInsuranceNumber') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label class="block">Position</label>
        <input type="text" name="position" value="{{ old('position', $staff->position ?? '') }}" class="w-full border p-2 rounded">
        @error('position') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label class="block">Current Salary ($)</label>
        <input type="number" step="0.01" name="currentSalary" value="{{ old('currentSalary', $staff->currentSalary ?? '') }}" class="w-full border p-2 rounded">
        @error('currentSalary') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label class="block">Salary Scale</label>
        <input type="text" name="salaryScale" value="{{ old('salaryScale', $staff->salaryScale ?? '') }}" class="w-full border p-2 rounded">
        @error('salaryScale') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label class="block">Contract Type</label>
        <input type="text" name="contractType" value="{{ old('contractType', $staff->contractType ?? '') }}" class="w-full border p-2 rounded">
        @error('contractType') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label class="block">Hours Per Week</label>
        <input type="number" name="hoursPerWeek" value="{{ old('hoursPerWeek', $staff->hoursPerWeek ?? '') }}" class="w-full border p-2 rounded">
        @error('hoursPerWeek') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label class="block">Payment Type</label>
        <input type="text" name="paymentType" value="{{ old('paymentType', $staff->paymentType ?? '') }}" class="w-full border p-2 rounded">
        @error('paymentType') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label class="block">Ward ID (optional)</label>
        <input type="number" name="wardID" value="{{ old('wardID', $staff->wardID ?? '') }}" class="w-full border p-2 rounded">
        @error('wardID') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>
</div>
