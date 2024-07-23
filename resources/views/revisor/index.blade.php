<x-layout>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 mt-3 mb-3 text-center">
                <h1 class="display-5 text center pb-2 mt-4">Revisor Dashboard</h1>
            </div>
        </div>
    </div>
    @if ($article_to_check)
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-8 col-md-3 mt-5 me-5 ms-5 d-flex flex-column align-items-center">
                    <div class="shop-card w-100">
                        <div class="title">
                            <h2 class="text-truncate">{{ $article_to_check->title }}</h2>
                        </div>
                        <h3>Author: {{ $article_to_check->user->name }}</h3>
                        <h4>${{ $article_to_check->price }}</h4>
                        <div class="d-flex justify-content-center mb-3">
                            <a href="{{ route('byCategory', ['category' => $article_to_check->category]) }}"
                                class="btn-2 btn-custom-2">{{ $article_to_check->category->name }}</a>
                        </div>
                        <div class="desc">
                            <p>{{ $article_to_check->description }}</p>
                        </div>
                        <div class="d-flex pb-4 justify-content-around w-100 mt-5">
                            <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class=" btn btn-custom-accept">Accept</button>
                            </form>
                            <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-custom-reject">Reject</button>
                            </form>
                            @if ($article_to_rollback)
                                <form action="{{ route('goBack', ['article' => $article_to_rollback]) }}"
                                    method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class=" btn btn-custom-2">Rollback</button>
                                </form>
                            @else
                                <h4>No rollback</h4>
                            @endif
                        </div>
                    </div>
                    @if (session()->has('message'))
                        <div class="alert alert-custom alert-dismissible fade show" role="alert">
                            <strong>{{ session('message') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                </div>

                {{-- carosello immagini --}}
                @if ($article_to_check->images->count())
                    <div id="carousel2" class="carousel slide col-2 col-md-4 mb-0 mb-md-3">
                        <div class="carousel-inner">
                            @foreach ($article_to_check->images as $key => $image)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img src="{{ $image->getUrl(300, 300) }}" class="d-block w-100"
                                        alt="img {{ $key + 1 }} of {{ $article_to_check->title }}">
                                </div>
                            @endforeach
                        </div>
                        @if ($article_to_check->images->count() > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#carousel2"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carousel2"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        @endif
                    </div>

                    {{-- carosello labels --}}
                    <div id="carousel1" class="carousel slide">
                        <div class="carousel-inner">
                            @foreach ($article_to_check->images as $key => $image)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <div class="col-12 col-md-3">
                                        <div class="row">
                                            <div class="shop-card">
                                                <div class="col-12">
                                                    <h3 class="">Labels</h3>
                                                </div>
                                                @if ($image->labels)
                                                    @foreach ($image->labels as $label)
                                                        <span
                                                            class="badge bg-secondary mt-2 ms-3">#{{ $label }}</span>
                                                    @endforeach
                                                @else
                                                    <p class="fst-italic">No labels</p>
                                                @endif
                                                <div class="row justify-content-around mt-5">
                                                    <div class="col-1 col-md-2 d-flex flex-column align-items-center ">
                                                        <div class="badge bg-primary">Adult</div>
                                                        <div class=" {{ $image->adult }}"></div>
                                                    </div>
                                                    <div class="col-1 col-md-2 d-flex flex-column align-items-center ">
                                                        <div class="badge bg-primary">Medical</div>
                                                        <div class=" {{ $image->medical }}"></div>
                                                    </div>
                                                    <div class="col-1 col-md-2 d-flex flex-column align-items-center ">
                                                        <div class="badge bg-primary">Spoof</div>
                                                        <div class=" {{ $image->spoof }}"></div>
                                                    </div>
                                                    <div class="col-1 col-md-2 d-flex flex-column align-items-center ">
                                                        <div class="badge bg-primary">Violence</div>
                                                        <div class=" {{ $image->violence }}"></div>
                                                    </div>
                                                    <div class="col-1 col-md-2 d-flex flex-column align-items-center ">
                                                        <div class="badge bg-primary">Racy</div>
                                                        <div class=" {{ $image->racy }}"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel1" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel1" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
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
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Price</th>
                            <th scope="col">By</th>
                            <th scope="col">Action</th>
                            <th scope="col">Status</th>
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
                                        <p>Article not yet reviewed</p>
                                    @else
                                        <form action="{{ route('revisor.undoArticle', $article) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-custom-2">Redirect for
                                                review</button>
                                        </form>
                                    @endif
                                </td>
                                <td>
                                    @if ($article->is_accepted === null)
                                        <p class="text-warning">To be revised</p>
                                    @elseif ($article->is_accepted)
                                        <p class="text-success">Accepted</p>
                                    @else
                                        <p class="text-danger">Rejected</p>
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
