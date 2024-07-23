<div data-aos="fade-up">

    <div class="shop-card">
        <div class="title d-flex align-items-center justify-content-center">
            <h2 class="text-truncate">{{ $article->title }}</h2>
        </div>

        <div class="desc">
            <p class="text-truncate">{{ $article->description }}</p>
        </div>
        <div class="d-flex justify-content-center mb-3">
            <a href="{{ route('byCategory', ['category' => $article->category]) }}"
                class="btn-2 btn-custom-2">{{ __("ui.{$article->category->name}") }}</a>
        </div>
        <div class="slider">
            <figure data-color="#E24938, #A30F22">
                <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(500, 600) : 'http://www.supah.it/dribbble/012/1.jpg' }}"
                    alt="img of {{ $article->title }}" />
            </figure>
        </div>

        <div class="cta p-0 pt-4">
            <div class="price mx-2"><span>$</span>{{ $article->price }}</div>
            <a class="" href="{{ route('show.article', compact('article')) }}"><button
                    class="btn btn-custom mx-custom">{{ __('ui.details') }}</button></a>
        </div>
    </div>
    <div class="bg"></div>
</div>
