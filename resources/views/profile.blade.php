@extends('layout.app')

@section('content')

<div class="content">
    <div class="main">
        <form class="text-main" action="{{ route('profile', $user->id) }}" method="POST">
            @csrf
            @method('POST')
            <div >
                <label for="name">Name:</label>
                <input class="input" type="text" id="name" name="name" value="{{ $user->name }}">
            </div>
            <div class="input">
                <label for="nip">NIP:</label>
                <input class="input" type="text" id="nip" name="nip" value="{{ $user->nip }}" disabled>
            </div>
            <div class="input">
                <label for="role">Role:</label>
                <input class="input" type="text" id="role" name="role" value="{{ $user->role }}" disabled>
            </div>
            <button type="submit">Simpan</button>
        </form>
    </div>
</div>

@endsection