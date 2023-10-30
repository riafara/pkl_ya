<h1>Add User</h1>

@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

<form method="POST" action="{{ route('user.create') }}">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control">
    </div>

    <div class="form-group">
        <label for="nip">NIP:</label>
        <input type="text" name="nip" id="nip" class="form-control">
    </div>

    <div class="form-group">
        <label for="role">Role:</label>
        <select name="role" id="role" class="form-control">
            <option value="" selected>Pilih Role</option>
            <option value="administrator">Administrator</option>
            <option value="employee">Employee</option>
        </select>
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Add User</button>
    <a href="{{ route('user.index') }}" class="btn btn-secondary">Back</a>
</form>