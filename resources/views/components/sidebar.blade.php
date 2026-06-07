<div class="overlay" id="overlay"></div>

<aside class="sidebar" id="sidebar">

    <div class="d-flex justify-content-between mb-2 align-items-center">

        <a href="{{ $home_link }}" class="navbar-brand fs-3">

            <i class="bi bi-bus-front-fill">

            </i>
            BusKu

        </a>

        <button class="btn btn-dark d-lg-none" id="closeBtn">

            <i class="bi bi-x-lg"></i>

        </button>

    </div>

    <ul class="navbar-nav gap-2">

        @foreach ($links as $link)
            <li class="nav-item">

                <a href="{{ $link['url'] }}" class="nav-link {{ request()->routeIs($link['route']) ? 'active' : '' }}">

                    <i class="bi {{ $link['icon'] }} me-1"></i>

                    {{ $link['label'] }}

                </a>

            </li>
        @endforeach

        <li class="nav-item">

            <form action="{{ route('logout') }}" method="post">
                @csrf

                <button class="btn btn-danger w-100" onclick="confirmLogout(this)" type="button">

                    <i class="bi bi-box-arrow-right"></i>

                    <span>Logout</span>

                </button>

            </form>

        </li>

    </ul>

</aside>
