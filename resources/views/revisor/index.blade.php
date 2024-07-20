<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mt-3 mb-3 text-center">
                <h1 class="display-5 text center pb-2">Revisor Dashboard</h1>
            </div>
        </div>
    </div>
    @if ($article_to_check)
        <div class="row justify-content-center">
            @if ($article_to_check->images->count())
                @foreach ($article_to_check->images as $key => $image)
                    <div class="col-6 col-md-4 mb-3">
                        {{-- @dd($image->getUrl(300, 300)) --}}
                        <img src="{{ $image->getUrl(300, 300) }}" class="d-block w-100"
                            alt="img {{ $key + 1 }} of {{ $article_to_check->title }}">
                    </div>
                @endforeach
            @else
                <div class="col-12 d-flex justify-content-center">
                    <h3>No images</h3>
                </div>
            @endif
        </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-md-3 ps-4 d-flex flex-column align-items-center">
                <div class="shop-card w-100">
                    <div class="title">
                        <h2 class="text-truncate">{{ $article_to_check->title }}</h2>
                    </div>
                    <h3>Author: {{ $article_to_check->user->name }}</h3>
                    <h4>${{ $article_to_check->price }}</h4>
                    <div class="d-flex justify-content-center mb-3">
                        <a href="{{route('byCategory', ['category' => $article_to_check->category])}}" class="btn-2 btn-custom-2">{{ $article_to_check->category->name }}</a>
                    </div>
                    <div class="desc">
                        <p>{{ $article_to_check->description }}</p>
                    </div>
                </div>
                <div class="d-flex pb-4 justify-content-around  w-100 mt-5">
                    <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-danger">Reject</button>
                    </form>
                    <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class=" btn btn-success">Accept</button>
                    </form>
                    @if ($article_to_rollback)
                        <form action="{{ route('goBack', ['article' => $article_to_rollback]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class=" btn btn-custom-2">Rollback</button>
                        </form>
                    @else
                        <h4>No rollback</h4>
                    @endif
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-custom alert-dismissible fade show" role="alert">
                        <strong>{{ session('message') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
        <div class="row justify-content-center">
            <div class="col-10 col-md-8">
                <table class="table">
                    <thead class="table-custom">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Price</th>
                            <th scope="col">By</th>
                            <th scope="col">Action</th>
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
