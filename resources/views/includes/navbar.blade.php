<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
  <div class="container">
    <a href="{{ route('home') }}" class="navbar-brand" title="home">
      <img src="/images/logo.svg" alt="logo" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collpase navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a href="{{ route('home') }}" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('categories') }}" class="nav-link">Categories</a>
        </li>
        <li class="nav-item">
            <a href="/rewards.html" class="nav-link">Rewards</a>
        </li>
        @auth
        </ul>
          <ul class="navbar-nav d-none d-lg-flex">
              <li class="nav-item dropdown">
              <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                  <img src="/images/user_pc.png" alt="profile" class="rounded-circle mr-2 profile-picture">
                  {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu">
                  <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                  <a href="{{ route('dashboard-account-store') }}" class="dropdown-item">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
              </li>
              <li class="nav-item">
                @php
                    $cartCount = \App\Cart::where('users_id', Auth::user()->id)->count();
                @endphp
                @if ($cartCount > 0)
                <a href="{{ route('cart') }}" class="nav-link d-inline-bloc mt-2">
                  <img src="/images/shopping-cart-filled.svg" alt="cart-empty">
                  <div class="cart-badge">{{ $cartCount }}</div>
                </a>
                @else
                <a href="{{ route('cart') }}" class="nav-link d-inline-bloc mt-2">
                    <img src="/images/icon-cart-empty.svg" alt="cart-empty">
                </a>
                @endif
              </li>
          </ul>

          <!-- mobile app -->
          <ul class="navbar-nav d-block d-lg-none">
              <li class="nav-item">
              <a href="" class="nav-link">
                  {{ Auth::user()->name }}
              </a>
              </li>
              <li class="nav-item">
              <a href="{{ route('cart') }}" class="nav-link d-inline-block">
                  Cart
              </a>
              </li>
          </ul>
        @else
          <li class="nav-item">
            <a href="{{ route('register') }}" class="nav-link">Sign Up</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('login') }}" class="btn btn-success nav-link px-4 text-white">Sign In</a>
          </li>
          @endauth
        </ul>
    </div>
  </div>
</nav>