<h1>Users</h1>
@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

<a href="{{ route('user.create') }}" class="btn btn-success">Add User</a>
<a href="{{ route('dashboard') }}" class="btn btn-secondary">Back</a>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>NIP</th>
            <th>Role</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->nip }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <a href="{{ route('user.update', $user->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('user.delete', $user->id) }}" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
