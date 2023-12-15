{{--* Navbar --}}
<nav class="navbar navbar-expand-lg navgar-light shadow-sm fixed-top sticky-sm-top navbar-background">

  {{-- * Container --}}
  <div class="container-mx-7-rem container-fluid p-0 ">

    {{-- * Taartely navbar image --}}
    <a href="/home"><img src="{{ asset("/storage/taartely-assets/logotaartely.png") }}" alt="" width="100px"></a>

    {{-- * Responsive navbar --}}
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    {{-- * Navbar menu --}}
    <div class="collapse navbar-collapse" id="navbarNav">
      {{-- * Ul for navbar --}}
      <ul class="navbar-nav ms-auto ">

        {{-- * All roles --}}
        <li class="taartely-paragraph nav-item px-2"><a class="nav-link {{ Request::is("home") || Request::is("/") ? "active" : "" }}" href="/home">Home</a></li>
        <li class="taartely-paragraph nav-item px-2"><a class="nav-link {{ Request::is("products") ? "active" : "" }}" href="/products">Product</a></li>

        {{-- * Only for buyer --}}
        @can("buyer")
        <li class="taartely-paragraph nav-item px-2"><a class="nav-link {{ Request::is("carts") ? "active" : "" }}" href="/carts">My Cart</a></li>
        <li class="taartely-paragraph nav-item px-2"><a class="nav-link {{ Request::is("orders") ? "active" : "" }}" href="/orders">My Order</a></li>
        @endcan

        {{-- * Only for seller --}}
        @can("seller")
        <li class="taartely-paragraph nav-item px-2"><a class="nav-link {{ Request::is("seller/dashboard") ? "active" : "" }}" href="/seller/dashboard">Dashboard</a></li>
        @endcan

        {{-- * If user already login --}}
        @auth
        <div class="dropdown">
          <button class="taartely-paragraph btn dropdown-toggle border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome back {{ auth()->user()->name }}
          </button>
          <ul class="dropdown-menu">
            {{-- * Buyer only --}}
            @can("buyer")
            <li><a class="taartely-paragraph dropdown-item" href="/carts"><i class="bi bi-basket3-fill"></i> Keranjang</a></li>
            <li><a class="taartely-paragraph dropdown-item" href="/orders"><i class="bi bi-cart"></i> Pesanan</a></li>
            @endcan

            {{-- * Seller only --}}
            @can("seller")
            <li><a class="taartely-paragraph dropdown-item" href="/seller/dashboard"><i class="bi bi-layout-text-window"></i> Dashboard</a></li>
            @endcan

            <li>
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="taartely-paragraph dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
              </form>
            </li>
          </ul>
        </div>
        
        {{-- * For user not login --}}
        @else
        <li class="nav-item px-2">
          <a class="taartely-paragraph btn taartely-button-login fw-semibold" href="/login">Login</a>
        </li>
        @endauth

        {{-- * End of ul for navbar --}}
      </ul>

      {{-- * End of navbar menu --}}
    </div>  

    {{-- * End of Container --}}
  </div>

  {{-- * End Of Navbar --}}
</nav>