<section class="sidebar close">
    <div class="logo-details">
        <a href="#">
            <i class='bx bx-menu' ></i>
        </a>
        <img src="{{ asset('assets/img/logo.png')}}" alt="" class="logo-name">
    </div>
    <ul class="nav-links">
        <li>
            <a href="{{ route('dashboard')}}">
                <i class='bx bxs-home' ></i>
                <div class="item-container"> 
                    <span class="link_name">Home</span>
                </div>
            </a>
        </li>
        <li>
            <div class="icon-link">
                <a href="#">
                    <i class='bx bxs-file'></i>
                    <div class="item-container"> 
                        <span class="link_name">Data Master</span>
                        <i class='bx bx-chevron-down arrow'></i>
                    </div>
                </a>
                <ul class="sub-menu">
                    <li><a class="link_name" href="{{ route('user.index') }}">Pengguna</a></li>
                    <li><a href="#">Kategori Dokumen</a></li>
                    <li><a href="#">Jenis Dokumen</a></li>
                    <li><a href="{{ route('nip.index') }}">NIP</a></li>
                </ul>
            </div>
        </li>
        <li>
            <div class="icon-link">
                <a href="#">
                    <i class='bx bx-history'></i>
                    <div class="item-container"> 
                        <span class="link_name">Riwayat</span>
                        <i class='bx bx-chevron-down arrow'></i>
                    </div>
                </a>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Admin</a></li>
                    <li><a href="#">User</a></li>
                </ul>
            </div>
        </li>
        <li>
            <div class="icon-link">
                <a href="#">
                    <i class='bx bx-cog' ></i>
                    <div class="item-container"> 
                        <span class="link_name">Pengaturan</span>
                        <i class='bx bx-chevron-down arrow'></i>
                    </div>
                </a>
                <ul class="sub-menu">
                    <li><a class="link_name" href="{{ route('profile', Auth::user()->id) }}">Edit Profil</a></li>
                    <li><a href="#">Ganti Kata Sandi</a></li>
                    <li><a href="{{ route('logout') }}">Keluar</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="{{ route('log.index') }}">
                <i class='bx bxs-comment-minus'></i>
                <div class="item-container"> 
                    <span class="link_name">Log Activity</span>
                </div>
            </a>
        </li>
    </ul>
</section>