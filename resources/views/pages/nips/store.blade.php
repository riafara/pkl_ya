<h1>Add NIP</h1>

@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

<form method="POST" action="{{ route('nip.create') }}">
    @csrf
    <div class="form-group">
        <label for="nip">NIP:</label>
        <input type="text" name="nip" id="nip" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Add NIP</button>
    <a href="{{ route('nip.index') }}" class="btn btn-secondary">Back</a>
</form>