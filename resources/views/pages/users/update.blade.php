<h1>Edit User</h1>

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

<form method="POST" action="{{ route('user.update', $user->id) }}">
    @csrf
    @method('POST')

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="nip">NIP</label>
        <input type="number" name="nip" id="nip" value="{{ $user->nip }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="role">Role</label>
        <input type="text" name="role" id="role" value="{{ $user->role }}" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Update User</button>
    <a href="{{ route('user.index') }}" class="btn btn-secondary">Back</a>
</form>