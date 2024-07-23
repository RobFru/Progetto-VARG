<x-layout>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 mt-3 mb-3 text-center">
                <h1>{{ __('ui.Articles by category') }}</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            @forelse ($articles as $article)
                <div class="col-12 col-md-4 d-flex justify-content-center mt-5">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12 d-flex justify-content-center mt-4">
                    <h3>
                        {{ __('ui.There are no articles yet for this category.') }}
                    </h3>
                </div>
                @auth
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 mt-4 d-flex justify-content-center">
                                <a class="btn btn-custom"
                                    href="{{ route('create.article') }}">{{ __('ui.Create Article') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="min-vh-100">
                @endauth
            @endforelse
        </div>
    </div>
</x-layout>
