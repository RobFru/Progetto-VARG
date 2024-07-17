<footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>

        {{-- se non sei revisore o se non sei loggato allora mostra work with us --}}
        @if (Auth::guest() || (Auth::check() && !Auth::user()->is_revisor))
        <li class="nav-item"><a href="{{route('form.revisor')}}" class="nav-link px-2 text-body-secondary">Work with us</a></li>
        @endif
        
    </ul>
    {{-- <div>
        <h5>Vuoi diventare revisore</h5>
        <p>Clicca qui</p>
        <a href="{{route('become.revisor')}}">diventa revisore</a>
    </div> --}}
    <p class="text-center text-body-secondary">VARG © 2024 Company, Inc</p>
</footer>
