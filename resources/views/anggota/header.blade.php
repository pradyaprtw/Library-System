<div class="container">
    <nav class="navbar bg-body-sm fixed-top" style="background-color: #B03052;">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: #FFF4B7; font-weight: bold;" href="{{ route('anggota.home') }}">
                Library System
            </a>
            
            <div class="d-flex align-items-center">
                <h5 class="text-custom me-3" style="color: #FFF4B7;">HALLO, {{ Auth::user()->username }}</h5>
                <div class="position-relative">
                    <i class="bi bi-person-circle" id="profileIcon" style="color: #FFF4B7; font-size: 1.5rem; cursor: pointer;"></i>
                    <div class="profile-menu" id="profileMenu" style="display: none; position: absolute; right: 0; background-color: #B03052; border: 1px solid #FFF4B7; z-index: 1000;">
                        <ul class="list-unstyled">
                            <li><a href="{{ route('anggota.home')}}" class="dropdown-item">Home</a></li>
                            <li><a href="{{ route('anggota.profile', Auth::user()->id) }}" class="dropdown-item">Edit Profile</a></li>
                            <li><a href="{{ route('anggota.riwayat') }}" class="dropdown-item">Riwayat Peminjaman</a></li>
                            <li><a href="{{ route('anggota.denda') }}" class="dropdown-item">Denda</a></li>
                            <li><a href="{{ route('logout') }}" class="dropdown-item">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>

