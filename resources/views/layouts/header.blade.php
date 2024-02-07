<nav class="navbar sticky-top navbar-expand-lg navbar-white bg-white shadow">
    <div class="container">
      <span class="mr-auto text-bold small">{{ Auth::user()->name }}</span>
      <a href="/profile" class="ml-auto small" wire:navigate>Profile</a>
    </div>
  </div>
</nav>