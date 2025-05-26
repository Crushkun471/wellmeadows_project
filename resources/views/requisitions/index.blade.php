<x-app-layout>
    <x-slot name="header">📦 Requisitions</x-slot>

    <div class="p-4">
        <a href="{{ route('requisitions.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">➕ Create Requisition</a>

        <table class="w-full mt-4 border">
            <thead>
                <tr class="bg-gray-100">
                    <th>Requisition ID</th>
                    <th>Ward</th>
                    <th>Placed By</th>
                    <th>Ordered</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($requisitions as $req)
                <tr class="border-t">
                    <td>{{ $req->requisitionID }}</td>
                    <td>{{ $req->ward->wardName ?? '' }}</td>
                    <td>{{ $req->staff->name ?? '' }}</td>
                    <td>{{ $req->dateOrdered }}</td>
                    <td>
                        @if($req->dateReceived)
                            ✅ Received by {{ $req->receivedByNurse->staff->name ?? 'N/A' }}
                        @else
                            ⏳ Pending
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('requisitions.show', $req->requisitionID) }}" class="text-blue-600">View</a>
                        @if(!$req->dateReceived)
                            <form action="{{ route('requisitions.accept', $req->requisitionID) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-green-600 ml-2">Accept</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
