<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a href="#" class="navbar-brand fw-bold fs-3">
            <i class="bi bi-bus-front-fill"></i>
            {{ $brand }}
        </a>

        <button class="navbar-toggler" 
            data-bs-target="#navbarNav"
            data-bs-toggle="collapse"
            type="button">
            <span class="navbar-toggler-icon">
            </span>
        </button>
        
        <div class="navbar-collapse collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto gap-2">
                @foreach ($links as $link)
                    <li class="nav-item">
                        <a href="{{ $link['url'] }}" class="nav-link">{{ $link['label'] }}</a>
                    </li>
                @endforeach
                <li class="nav-item">
                    <a href="{{ route('login-page') }}" class="nav-link btn btn-primary rounded-pill px-3">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
