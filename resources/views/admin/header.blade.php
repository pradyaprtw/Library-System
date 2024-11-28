<div class="container">
  <nav class="navbar fixed-top" style="background-color: #B03052; color: #FFF4B7;" data-bs-theme="dark">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-flex justify-content-center">
            <a class="nav-link" style="font-size: 20px; font-weight: bold; transition: color 0.2s ease-in-out;" href="{{route('admin.home')}}" onmouseover="this.style.color='#D76C82'" onmouseout="this.style.color='#FFF4B7'">Home</a>
        </div>
          <a class="navbar-brand" style="color: #FFF4B7;" href="#">Library System</a>
          <div class="offcanvas offcanvas-start" style="background-color: #B03052; color: #FFF4B7; width: 250px;" data-bs-scroll="true" data-bs-backdrop="false" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
              <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasNavbarLabel" style="color: #FFF4B7;">Library System</h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                  <ul class="navbar-nav">
                      <li class="nav-item">
                          <a class="nav-link" style="color: #FFF4B7;" href="{{ route('buku.index') }}">Buku</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" style="color: #FFF4B7;" href="{{ route('anggota.index') }}">Anggota</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" style="color: #FFF4B7;" href="{{ route('peminjaman.index') }}">Peminjaman</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" style="color: #FFF4B7;" href="{{ route('logout') }}">Logout</a>
                      </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" style="color: #FFF4B7;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Dropdown
                          </a>
                          <ul class="dropdown-menu" style="background-color: #B03052; color: #FFF4B7;">
                              <li><a class="dropdown-item" style="color: #FFF4B7;" href="{{route('admin.denda')}}">Riwayat Denda</a></li>
                              <li><a class="dropdown-item" style="color: #FFF4B7;" href="#">Another action</a></li>
                              <li><hr class="dropdown-divider" style="border-color: #FFF4B7;"></li>
                              <li><a class="dropdown-item" style="color: #FFF4B7;" href="#">Something else here</a></li>
                          </ul>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </nav>
</div>
