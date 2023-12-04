<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container container-fluid">

    <a class="navbar-brand" href="/home">Taartely</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    {{-- LINK --}}
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link" href="/home">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/products">Product</a>
        </li>

        {{-- Jalan kalau user sebagai pembeli dan sudah login --}}
        @can("buyer")
        <li class="nav-item">
          <a class="nav-link" href="/carts">My Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/orders">My Order</a>
        </li>
        @endcan
        @can("seller")
        {{-- Jalan kalau user sebagai penjual --}}
        <li class="nav-item">
          <a class="nav-link" href="/seller/dashboard">Dashboard</a>
        </li>
        @endcan
        {{-- Jalan kalau user belum login --}}
        @auth
        <li class="nav-item">
          <form action="/logout" method="post" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-link p-0">Logout</button>
          </form>
      </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
        </li>
        @endauth

                                                                                                                                                
        {{-- Jalan kalau user sudah login --}}
        

      </ul>
    </div>

    

  </div>
</nav>