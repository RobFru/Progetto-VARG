<x-layout>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 mt-3 mb-3 text-center">
                <h1 class="display-5 text center pb-2 mt-4">{{ __('ui.Dashboard') }}</h1>
            </div>
        </div>
    </div>
    @if (session()->has('message'))
    <div class="alert alert-custom alert-dismissible fade show" role="alert">
        <strong>{{ session('message') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert"
            aria-label="Close"></button>
    </div>
@endif
    @if ($article_to_check)
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12 col-md-3 mb-5 me-5 ms-0 ms-md-5 d-flex">
                    <div class="shop-card-1 w-100">
                        <div class="title">
                            <h2 class="text-truncate">{{ $article_to_check->title }}</h2>
                        </div>
                        <h3>{{ __('ui.Author') }}: {{ $article_to_check->user->name }}</h3>
                        <h4>${{ $article_to_check->price }}</h4>
                        <div class="d-flex justify-content-center mb-3">
                            <a href="{{ route('byCategory', ['category' => $article_to_check->category]) }}"
                                class="btn-2 btn-custom-2">{{ __("ui.{$article_to_check->category->name}") }}</a>
                        </div>
                        <div class="desc">
                            <p>{{ $article_to_check->description }}</p>
                        </div>
                        <div class="d-flex pb-4 justify-content-around w-100">
                            <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class=" btn btn-custom-accept">{{ __('ui.Approve') }}</button>
                            </form>
                            <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-custom-reject">{{ __('ui.Reject') }}</button>
                            </form>
                            @if ($article_to_rollback)
                                <form action="{{ route('goBack', ['article' => $article_to_rollback]) }}"
                                    method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class=" btn btn-custom-2">{{ __('ui.Cancel') }}</button>
                                </form>
                            @else
                                <h4>{{ __('ui.No cancellable articles') }}</h4>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- Inizio carosello --}}
                {{-- carosello immagini --}}
                @if ($article_to_check->images->count())
                    <div id="carouselExample" class="carousel slide col-12 col-md-7 mb-0 mb-md-3">
                        <div class="carousel-inner">
                            @foreach ($article_to_check->images as $key => $image)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <div class="d-md-flex">
                                        <img src="{{ $image->getUrl(500, 600) }}" class="d-block w-100"
                                            alt="img {{ $key + 1 }} of {{ $article_to_check->title }}">
                                        {{-- DESKTOP --}}
                                        <div class="shop-card-1 d-none d-md-block">
                                            <div class="col-12">
                                                <h3 class="">Labels</h3>
                                            </div>
                                            @if ($image->labels)
                                                @foreach ($image->labels as $label)
                                                    <div class="col-12 col-md-3">
                                                        <span
                                                            class="badge btn-custom mt-2 ms-3">#{{ $label }}</span>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p class="fst-italic">No labels</p>
                                            @endif
                                            <div class="col-12 mt-3">
                                                <h3 class="">Tags</h3>
                                            </div>
                                            <div class="row mt-2 ms-2">
                                                <div class="col-12 d-flex my-1">
                                                    <div class="badge btn-custom-2">Adult</div>
                                                    <div class=" {{ $image->adult }} ms-1"></div>
                                                </div>
                                                <div class="col-12 d-flex my-1">
                                                    <div class="badge btn-custom-2">Medical</div>
                                                    <div class=" {{ $image->medical }} ms-1"></div>
                                                </div>
                                                <div class="col-12 d-flex my-1">
                                                    <div class="badge btn-custom-2">Spoof</div>
                                                    <div class=" {{ $image->spoof }} ms-1"></div>
                                                </div>
                                                <div class="col-12 d-flex my-1">
                                                    <div class="badge btn-custom-2">Violence</div>
                                                    <div class=" {{ $image->violence }} ms-1"></div>
                                                </div>
                                                <div class="col-12 d-flex my-1">
                                                    <div class="badge btn-custom-2">Racy</div>
                                                    <div class=" {{ $image->racy }} ms-1"></div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- MOBILE --}}
                                        <div class="shop-card-1 d-block d-md-none">
                                            <div class="col-12">
                                                <h3 class="">Labels</h3>
                                            </div>

                                            @if ($image->labels)
                                                @foreach ($image->labels as $label)
                                                    <span class="badge btn-custom">#{{ $label }}</span>
                                                @endforeach
                                            @else
                                                <p class="fst-italic">No labels</p>
                                            @endif
                                            <div class="col-12 mt-3">
                                                <h3 class="">Tags</h3>
                                            </div>
                                            <div class="row mt-2 ms-2">
                                                <div class="col-12 d-flex my-1 justify-content-center">
                                                    <div class="badge btn-custom-2">Adult</div>
                                                    <div class=" {{ $image->adult }} ms-1"></div>
                                                </div>
                                                <div class="col-12 d-flex my-1 justify-content-center">
                                                    <div class="badge btn-custom-2">Medical</div>
                                                    <div class=" {{ $image->medical }} ms-1"></div>
                                                </div>
                                                <div class="col-12 d-flex my-1 justify-content-center">
                                                    <div class="badge btn-custom-2">Spoof</div>
                                                    <div class=" {{ $image->spoof }} ms-1"></div>
                                                </div>
                                                <div class="col-12 d-flex my-1 justify-content-center">
                                                    <div class="badge btn-custom-2">Violence</div>
                                                    <div class=" {{ $image->violence }} ms-1"></div>
                                                </div>
                                                <div class="col-12 d-flex my-1 justify-content-center">
                                                    <div class="badge btn-custom-2">Racy</div>
                                                    <div class=" {{ $image->racy }} ms-1"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if ($article_to_check->images->count() > 1)
                            <button class="carousel-control-prev next-custom-2" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon btn-custom rounded-pill"
                                    aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next next-custom" type="button"
                                data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon btn-custom rounded-pill"
                                    aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        @endif
                    </div>
                @endif
            </div>
        </div>
        </div>
    @else
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="fst-italic display-4">
                    There are no articles to check.
                </h1>
                @if ($article_to_rollback)
                    <form action="{{ route('goBack', ['article' => $article_to_rollback]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="mt-5 btn-2 btn-custom-2">Rollback</button>
                    </form>
                @else
                    <h4 class="">No rollback</h4>
                @endif
            </div>
        </div>
    @endif
    <div class="container-fluid mt-5">
        <div class="row justify-content-start justify-content-md-around">
            <div class="col-10 col-md-8">
                <table class="table">
                    <thead class="table-custom">
                        <tr>
                            <th scope="col-1">#</th>
                            <th scope="col-1">{{ __('ui.Title') }}</th>
                            <th scope="col-1">{{ __('ui.Price') }}</th>
                            <th scope="col-1">{{ __('ui.By') }}</th>
                            <th scope="col-1">{{ __('ui.Actions') }}</th>
                            <th scope="col-1">{{ __('ui.Status') }}
                                <span class="sort">
                                    <a class="decoration-none sort"
                                        href="{{ route('revisor.index', ['sort' => 'status', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                        <i class="bi bi-arrow-down-up"></i>
                                        @if (request('sort') == 'status')
                                            @if (request('direction') == 'asc')
                                                <i class="fas fa-sort-up"></i>
                                            @else
                                                <i class="fas fa-sort-down"></i>
                                            @endif
                                        @endif
                                    </a>
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <th scope="row">{{ $article->id }}</th>
                                <td>{{ $article->title }}</td>
                                <td class="">${{ $article->price }}</td>
                                <td>{{ $article->user->name }}</td>
                                <td>
                                    @if (is_null($article->is_accepted))
                                        <p>{{ __('ui.Article not yet reviewed') }}</p>
                                    @else
                                        <form action="{{ route('revisor.undoArticle', $article) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-custom-2">{{ __('ui.Redirect for review') }}</button>
                                        </form>
                                    @endif
                                </td>
                                <td>
                                    @if ($article->is_accepted === null)
                                        <p class="text-warning">{{ __('ui.To be revised') }}</p>
                                    @elseif ($article->is_accepted)
                                        <p class="text-success">{{ __('ui.Accepted') }}</p>
                                    @else
                                        <p class="text-danger">{{ __('ui.Rejected') }}</p>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-12">
                <a href="{{ route('homepage') }}" class="mt-3 btn-2 btn-custom-2">Homepage</a>
            </div>
        </div>
    </div>
    </div>

</x-layout>
