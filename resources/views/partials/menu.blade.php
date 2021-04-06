<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="#" class="navbar-brand">
            <buttin class="btn btn-outline-primary">Holly Tour & Travell</buttin>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-flex justify-content-around" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{route('pages.home')}}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('pages.paket')}}" class="nav-link">Paket Travel</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('pages.gallery')}}" class="nav-link">Gallery</a>
                </li>
                @auth
                <li class="nav-item">
                    <a href="{{route('pages.pembayaran')}}" class="nav-link">Pembayaran</a>
                </li>
                @endauth
                <li class="nav-item my-auto">
                    <form class="form-inline ml-3" action="{{route('pages.search')}}">
                        <div class="input-group input-group-sm">
                            <input name="q" class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
{{--                    <a href="{{route('pages.search')}}" class="btn btn-info">--}}
{{--                        <i class="fas fa-search"></i>--}}
{{--                    </a>--}}
                </li>
            </ul>
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            @auth()
                <li class="nav-item">
                    <a href="{{route('logout')}}" class="btn btn-primary">Logout</a>
                </li>
            @endauth
            @guest()
                <li class="nav-item">
                    <a href="{{route('pages.login')}}" class="btn btn-primary">Login</a>
                </li>
                <li class="nav-item ml-2">
                    <a href="{{route('pages.register')}}" class="btn btn-primary">Register</a>
                </li>
            @endguest
        </ul>
    </div>
</nav>
