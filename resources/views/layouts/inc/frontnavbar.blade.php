<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">BAUHINIA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('category') }}">Category</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('cart') }}"">Cart</a>
          </li>


        @if (Route::has('login'))
        @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                      </li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <li class="nav-item">
                            <a class="nav-link">{{ Auth::user()->name }}</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ url('my-orders') }}">My Orders</a>
                          </li>
                    </div>
                </li>
        @else
        <li class="nav-item">
               <a class="nav-link" href="{{ route('login') }}">Log in</a>
         </li>
            @if (Route::has('register'))
            <li class="nav-item">
               <a class="nav-link" href="{{ route('register') }}">Register</a>
         </li>
            @endif
        @endauth
@endif
      </ul>
    </div>
  </div>
</nav>
