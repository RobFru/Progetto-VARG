<nav class="navbar navbar-expand-lg navbar-expand-xl bg-body-tertiary fixed-top ">
    <div class="container-fluid">
        <a class="navbar-brand logo" href="#"> <img src="/media/logolupo.png" alt="Logo" style="height: 30px; margin-right: 10px;">VARG</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                @auth
                    <li class="nav-item">
                        {{-- explode splitta il nome in un array di parole e poi prende solo la prima --}}
                        <a class="nav-link user-text" href="{{ route('homepage') }}">Hi,
                            {{ explode(' ', Auth::user()->name)[0] }}</a>
                    </li>
                @endauth
                <li class="nav-item">
                    <a class="nav-link fw-bold active" aria-current="page" href="{{ route('homepage') }}">Home</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="{{ route('create.article') }}">Create Articles</a>
                    </li>
                @endauth
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="{{ route('index.article') }}">Index Articles</a>
                </li>
                {{-- dropdown categorie --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item"
                                    href="{{ route('byCategory', ['category' => $category]) }}">{{ $category->name }}</a>
                            </li>
                            @if (!$loop->last)
                                <hr class="dropdown-divider">
                            @endif
                        @endforeach
                    </ul>
                </li>
                @auth
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="nav-link text-light">Logout</button>
                        </form>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="{{ route('register') }}">Register</a>
                    </li>
                @endguest
            </ul>
            {{-- collegamento revisore --}}
            @auth
                @if (Auth::user()->is_revisor)
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class='nav-item '>
                        <a class="nav-link" href="{{ route('revisor.index') }}">Revisor
                        <span class="nav-link text-white badge rounded-circle btn-custom">{{\App\Models\Article::toBeRevisedCount()}}</span>
                    </a>
                    </li>
                </ul>
                @endif
                @endauth
                <form class="d-flex" role="search" method="GET" action="">
                <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
        </div>
    </nav>
    <div class="mt-6">
    </div>
        
