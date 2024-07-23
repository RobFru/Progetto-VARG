<footer class="py-3 my-4">
    <ul class="nav justify-content-center separate-footer pb-3 mb-3">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">{{__('ui.Features')}}</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">{{__('ui.Pricing')}}</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">{{__('ui.FAQs') }}</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">{{__('ui.About') }}</a></li>

        {{-- se non sei revisore o se non sei loggato allora mostra work with us --}}
        @if (Auth::guest() || (Auth::check() && !Auth::user()->is_revisor))
        <li class="nav-item"><a href="{{route('form.revisor')}}" class="nav-link px-2 text-body-secondary">{{__('ui.Work with us')}}</a></li>
        @endif
        
    </ul>
    <ul class="nav justify-content-center pb-3 mb-3">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"><i class="bi bi-facebook"></i></a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"><i class="bi bi-instagram"></i></a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"><i class="bi bi-twitter"></i></a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"><i class="bi bi-linkedin"></i></a></li>
    </ul>
    <!-- Creatori del Sito -->
    <div class="text-center text-body-secondary pb-3 mb-3">
        <p>{{__('ui.Creators')}}:</p>
        <ul class="list-inline text-center">
            <li class="list-inline-item"><strong>V</strong>ittorio</li>
            <li class="list-inline-item"><strong>A</strong>ndrea</li>
            <li class="list-inline-item"><strong>R</strong>oberta</li>
            <li class="list-inline-item"><strong>G</strong>iovanni</li>
        </ul>
    </div>
    {{-- <div>
        <h5>Vuoi diventare revisore</h5>
        <p>Clicca qui</p>
        <a href="{{route('become.revisor')}}">diventa revisore</a>
    </div> --}}
    <p class="text-center text-body-secondary">VARG © 2024 Company, Inc</p>
</footer>
