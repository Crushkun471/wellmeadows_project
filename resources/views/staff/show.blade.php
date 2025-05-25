<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Staff Details
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow-sm">
            <p><strong>Name:</strong> {{ $staff->name }}</p>
            <p><strong>Address:</strong> {{ $staff->address }}</p>
            <p><strong>Telephone:</strong> {{ $staff->telephone }}</p>
            <p><strong>Date of Birth:</strong> {{ $staff->dateOfBirth }}</p>
            <p><strong>Sex:</strong> {{ $staff->sex }}</p>
            <p><strong>National Insurance #:</strong> {{ $staff->nationalInsuranceNumber }}</p>
            <p><strong>Position:</strong> {{ $staff->position }}</p>
            <p><strong>Salary:</strong> ${{ number_format($staff->currentSalary, 2) }}</p>
            <p><strong>Salary Scale:</strong> {{ $staff->salaryScale }}</p>
            <p><strong>Contract Type:</strong> {{ $staff->contractType }}</p>
            <p><strong>Hours per Week:</strong> {{ $staff->hoursPerWeek }}</p>
            <p><strong>Payment Type:</strong> {{ $staff->paymentType }}</p>
            <p><strong>Ward ID:</strong> {{ $staff->wardID ?? 'N/A' }}</p>

            <div class="mt-4">
                <a href="{{ route('staff.index') }}" class="text-blue-600 hover:underline">← Back to list</a>
            </div>
        </div>
    </div>
</x-app-layout>
