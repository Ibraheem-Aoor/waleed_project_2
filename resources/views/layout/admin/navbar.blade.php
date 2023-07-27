<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3" style="visibility: hidden;">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    {{-- <ul class="navbar-nav mr-auto-navbav">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-language"></i>
                <span class="badge badge-warning navbar-badge"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <div class="dropdown-divider"></div>
                    <a rel="alternate" hreflang="{{ $localeCode }}"
                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                        class="dropdown-item text-center ">
                        {{ $properties['native'] }}
                    </a>
                @endforeach
            </div>

        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul> --}}

    <ul class="navbar-nav mr-auto-navbav">
        <li class="nav-item dropdown">

            <a class="btn btn-danger" onclick="$('#logout-form').submit();" class="dropdown-item text-center ">
                خروج
                <i class="fa fa-arrow-left"></i>
            </a>
            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                @csrf
            </form>

        </li>
    </ul>
</nav>
<!-- /.navbar -->
