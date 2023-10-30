@extends('layout.app')

@section('content')

    <div class="content">
        <div class="main">
            <div class="text-main">
                <h1>Selamat Datang di DocNum</h1>
                <h3>Solusi Pintar untuk Manajemen Dokumen Anda!</h3>
                <br>
                <a class="button" href="#">Buat Dokumen Sekarang</a>
            </div>
            <div class="img-main">
                <img src="{{ asset('assets/img/logo-beranda.png')}}" alt="">
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-container">
            <div class="card-content">
                <h2 class="judul">Pengguna</h2>
                <img src="{{ asset('assets/img/users.svg')}}" alt="">
                <h2 class="angka">15</h2>
            </div>
            <a href="#">Selengkapnya <i class='bx bx-chevron-right' ></i></a>
        </div>
        <div class="card-container">
            <div class="card-content">
                <h2 class="judul">Pengguna</h2>
                <img src="{{ asset('assets/img/users.svg')}}" alt="">
                <h2 class="angka">15</h2>
            </div>
            <a href="#">Selengkapnya <i class='bx bx-chevron-right' ></i></a>
        </div>
    </div>

    <br>
    <br>

@endsection
