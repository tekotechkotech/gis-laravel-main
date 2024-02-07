
<nav class="navbar navbar-expand-lg  navbar-light bg-light shadow">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('img/logo.png') }}"  height="30" class="d-inline-block align-top" alt="">
            | Laravel <b>GIS</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        @auth
            
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav m-auto">
            <a class="nav-link {{ Route::is('dashboard')?'active':'' }}" wire:navigate href="dashboard">Dashboard</a>
            <a class="nav-link {{ Route::is('maps')?'active':'' }}" wire:navigate href="maps">Maps</a>
            <a class="nav-link {{ Route::is('konfirmasi')?'active':'' }}" wire:navigate href="konfirmasi">Konfirmasi</a>

            @if (Auth::user()->role=="super admin")
              <a class="nav-link {{ Route::is('superadmin')?'active':'' }}" wire:navigate href="superadmin">Super Admin</a>
              <a class="nav-link {{ Route::is('sekolah')?'active':'' }}" wire:navigate href="sekolah">Sekolah</a>
            @endif
            @if (Auth::user()->role=="super admin" || Auth::user()->role=="admin")
              <a class="nav-link {{ Route::is('siswa')?'active':'' }}" wire:navigate href="siswa">Siswa</a>
            @endif
            
          </div>
        </div>
        
        @livewire('logout')
        @endauth
        @guest
        <a href="/login" class="btn btn-success  btn-sm px-4">Login</a>
        @endguest
    </div>
    
  </nav>