<h1>NIP</h1>
@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

<a href="{{ route('nip.create') }}" class="btn btn-success">Add NIP</a>
<a href="{{ route('dashboard') }}" class="btn btn-secondary">Back</a>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($nips as $index => $nip)
            <tr>
                <td>{{ $index + 1}}</td>
                <td>{{ $nip->nip }}</td>
                <td>
                    <a href="{{ route('nip.update', $nip->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('nip.delete', $nip->id) }}" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
