@extends('admin.layout')

@section('content')
<div class="container">
    <h2>Pending Landlord Accounts</h2>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Landlord Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendingLandlords as $landlord)
                <tr>
                    <td>{{ $landlord->name }}</td>
                    <td>{{ $landlord->email }}</td>
                    <td>{{ $landlord->is_approved == 0 ? 'Pending' : ($landlord->is_approved == 1 ? 'Approved' : 'Rejected') }}</td>
                    <td>
                        @if ($landlord->is_approved == 0)
                            <form action="{{ route('admin.approve-landlord', $landlord->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit">Approve</button>
                            </form>
                            <form action="{{ route('admin.reject-landlord', $landlord->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit">Reject</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
