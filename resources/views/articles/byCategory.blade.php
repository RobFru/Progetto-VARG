<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1>Articles by category 
            </div>
        </div>
        <div class="row justify-content-center">
            @forelse ($articles as $article)
            <div class="col-12 col-md-3">
                <x-card :article="$article"/>
            </div>
            @empty
            <div class="col-12">
                <h3>
                    There are no articles yet for this category.
                </h3>
                @auth
                <a class="btn" href="{{ route('create.article') }}">Create Article</a>
                @endauth
            </div>
            @endforelse

        </div>
    </div>
</x-layout>