<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add New Supplier</h2>
    </x-slot>

    <div class="py-4 px-6">
        @if ($errors->any())
            <div class="text-red-600 mb-4 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('suppliers.store') }}" class="space-y-6 max-w-lg mx-auto">
            @csrf

            <div class="space-y-3">
                <label class="block font-semibold">Supplier Name</label>
                <input name="supplierName" class="w-full border rounded px-3 py-2" value="{{ old('supplierName') }}" required>
            </div>

            <div class="space-y-3">
                <label class="block font-semibold">Address</label>
                <input name="address" class="w-full border rounded px-3 py-2" value="{{ old('address') }}" required>
            </div>

            <div class="space-y-3">
                <label class="block font-semibold">Telephone</label>
                <input name="telephone" class="w-full border rounded px-3 py-2" value="{{ old('telephone') }}">
            </div>

            <div class="space-y-3">
                <label class="block font-semibold">Fax</label>
                <input name="fax" class="w-full border rounded px-3 py-2" value="{{ old('fax') }}">
            </div>

            <div class="flex justify-center space-x-6 pt-4">
                <button type="submit" class="bg-gray-800 text-white px-6 py-2 rounded">Add Supplier</button>
                <button type="reset" class="bg-white border border-gray-400 px-6 py-2 rounded">Clear</button>
            </div>
        </form>
    </div>
</x-app-layout>