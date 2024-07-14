<div class="shop-card">
    <div class="title">
        <h2 class="text-truncate">{{ $article->title }}</h2>
    </div>
    <div class="desc">
        <p>{{ $article->description }}</p>
    </div>
    <div class="slider">
        <figure data-color="#E24938, #A30F22">
            <img src="http://www.supah.it/dribbble/012/1.jpg" />
        </figure>
    </div>

    <div class="cta">
        <div class="price"><span>$</span>{{ $article->price }}</div>
        <a class="" href="{{ route('show.article', compact('article')) }}"><button class="btn btn-custom mx-2">Details</button></a>
        <a href="{{route('byCategory', ['category' => $article->category])}}" class="btn btn-custom">{{$article->category->name}}</a>
    </div>
</div>
<div class="bg"></div>
