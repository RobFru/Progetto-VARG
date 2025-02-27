<x-layout>
    <div class="container-fluid">
        <div class="row justify-content-start mt-5">
            <div class="col-12 col-md-4 mt-5">
                @if ($article->images->count() > 0)
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-indicators">
                            @foreach ($article->images as $key => $image)
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}"
                                    class="@if ($loop->first) active @endif"
                                    @if ($loop->first) aria-current="true" @endif
                                    aria-label="Slide {{ $key + 1 }}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach ($article->images as $key => $image)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img src="{{ $image->getUrl(500, 600) }}" class="d-block w-100"
                                        alt="img: {{ $key + 1 }} of article {{ $article->title }}">
                                </div>
                            @endforeach
                        </div>
                        @if ($article->images->count() > 1)
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        @endif
                    </div>
                @else
                    <h3>{{__('ui.Noimagesforthisarticle')}}</h3>
                @endif
            </div>
            <div class="col-12 col-md-5 mt-5 text-center">
                <h1 class="mb-3">{{ $article->title }}</h1>
                <div class="d-block d-md-none separate"></div>
                <div class="fs-2 text-center mt-1 mb-1">${{ $article->price }}
                    {{-- <button class="btn-no-border mb-1" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <img src="../.././media/buy_logo.png" class="buy_logo" alt="buy_logo">
                    </button> --}}
                    <div class="separate"></div>
                </div>
                <p class="fs-3 text-start mt-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    Facere, dicta? Veniam iste magni consectetur, iusto aliquam fugiat alias eaque
                    aperiam?{{ $article->description }}</p>
                <div class="separate"></div>
            </div>
            {{-- <div class="col-12 col-md-3 vh-100 text-center">
              <div class="fs-3">placeholder per buy menu</div>
            </div> --}}
        </div>
    </div>
</x-layout>

{{-- OFFCANVAS --}}
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header offcanvas-custom">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">{{ __('ui.hello') }}, @auth{{ Auth::user()->name }}@endauth @guest{{__('ui.guest')}}@endguest</h5>
        <button type="button" class="btn-close mb-2-5 icon-custom offcanvas-icon" data-bs-dismiss="offcanvas" aria-label="Close"><i class="bi bi-x-circle-fill fs-4"></i></button>
    </div>
    <div class="offcanvas-body">
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic enim molestias vitae odio facilis a repudiandae
        eos quo placeat similique.
    </div>
</div>