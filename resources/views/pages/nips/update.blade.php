<h1>Edit Nip</h1>

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

<form method="POST" action="{{ route('nip.update', $nips->id) }}">
    @csrf
    @method('POST')

    <div class="form-group">
        <label for="nip">NIP</label>
        <input type="number" name="nip" id="nip" value="{{ $nips->nip }}" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Update Nip</button>
    <a href="{{ route('nip.index') }}" class="btn btn-secondary">Back</a>
</form>