<h1>Users Log</h1>
@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

<a href="{{ route('dashboard') }}" class="btn btn-secondary">Back</a>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Log</th>
            <th>Type</th>
            <th>Time</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usersLog as $index => $ul)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $ul->users }}</td>
                <td>{{ $ul->log }}</td>
                <td>{{ $ul->type }}</td>
                <td>{{ $ul->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
