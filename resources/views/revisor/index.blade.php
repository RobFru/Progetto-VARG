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
            @for ($i = 0; $i < 6; $i++)
                <div class="col-6 col-md-4">
                    <img src="https://picsum.photos/400" class="d-block w-100" alt="...">
                </div>
            @endfor
        </div>
        </div>
        <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">
            <div>
                <h1>{{ $article_to_check->title }}</h1>
                <h3>Author: {{ $article_to_check->user->name }}</h3>
                <h4>${{ $article_to_check->price }}</h4>
                <h4 class="fst-italic text-muted">#{{ $article_to_check->category->name }}</h4>
                <p class="h6">{{ $article_to_check->description }}</p>
            </div>
            <div class="d-flex pb-4 justify-content-around">
                <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-custom-2">Reject</button>
                </form>
                <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class=" btn btn-custom-2">Accept</button>
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
    @else
        <div class="row vh-100 justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="fst-italic display-4">
                    There are no articles to check.
                </h1>
                <a href="{{ route('homepage') }}" class="mt-5 btn btn-custom-2">Go back</a>
            </div>
        </div>
    @endif
    </div>

</x-layout>
