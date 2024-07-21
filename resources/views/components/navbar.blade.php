<span class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-expand-xl bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand logo display-font" href="#"> <img src="/media/logolupo.png" alt="Logo"
                    style="height: 30px; margin-right: 10px;">VARG</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item">
                            {{-- explode splitta il nome in un array di parole e poi prende solo la prima --}}
                            <a class="nav-link user-text me-md-3" href="{{ route('homepage') }}">{{ __('ui.hello') }},
                                {{ explode(' ', Auth::user()->name)[0] }}</a>
                        </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link active m-none me-md-3" aria-current="page"
                            href="{{ route('homepage') }}">Home</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link m-none me-md-3"
                                href="{{ route('create.article') }}">{{ __('ui.createArticles') }}</a>
                        </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link m-none me-md-3"
                            href="{{ route('index.article') }}">{{ __('ui.indexArticles') }}</a>
                    </li>
                    {{-- dropdown categorie --}}
                    <li class="nav-item dropdown d-md-none d-flex flex-column text-center">
                        <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu text-center">
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
                                <button class="nav-link text-light m-none me-md-3">{{ __('ui.Logout') }}</button>
                            </form>
                        </li>
                    @endauth
                    @guest
                        <li class="nav-item">
                            <a class="nav-link m-none me-md-3" href="{{ route('login') }}">{{ __('ui.login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link m-none me-md-3" href="{{ route('register') }}">{{ __('ui.register') }}</a>
                        </li>
                    @endguest
                </ul>
                {{-- collegamento revisore --}}
                @auth
                    @if (Auth::user()->is_revisor)
                    <div class="separate-2"></div>
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class='nav-item'>
                                <a class="nav-link" href="{{ route('revisor.index') }}">{{ __('ui.Revisor') }}</a>
                                <span
                                    class="nav-link badge-custom text-white rounded-circle btn-custom me-2 d-none d-md-block">{{ \App\Models\Article::toBeRevisedCount() }}</span>
                                </a>
                            </li>
                        </ul>
                    @endif
                @endauth
                <form class="d-flex me-5" role="search" method="GET" action="{{ route('article.search') }}">
                    <input class="form-control shadow me-3" type="search" name="query" placeholder="Search"
                        aria-label="Search">
                    <button class="btn btn-custom-3" type="submit">{{ __('ui.search') }}</button>
                </form>
                <div class="dropdown dropdown-center me-5 d-flex justify-content-center" id="globo">
                    <i class="bi bi-globe2 icon-custom fs-3" type="button" data-bs-toggle="dropdown"></i>
                    {{-- da risolvere --}}
                    <span class="">
                        <ul class="dropdown-menu " id="globo_dropdown">
                            <li class=""><x-_locale lang="en" /></li>
                            <li class="mt-1"><x-_locale lang="it" /></li>
                            <li class="mt-1"><x-_locale lang="es" /></li>
                        </ul>
                    </span>
                </div>
            </div>
        </div>
    </nav>
    {{-- navbar 2 --}}
    <div class="d-none d-md-block">
        <nav class="navbar navbar-secondaria">
            <ul class="navbar-secondaria mx-auto mb-2 mb-lg-0">
                @foreach ($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('byCategory', ['category' => $category]) }}">
                            {{ __("ui.$category->name") }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</span>
<div class="mt-6">
</div>
