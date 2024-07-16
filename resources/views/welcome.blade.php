<x-layout title="VARG">

    <x-masthead h1="VARG" />
    @if (session()->has('errorMessage'))
        <div class="alert alert-warning">
            {{ session('errorMessage') }}
        </div>
    @endif

    @if (session()->has('message'))
        <div class="alert alert-custom" role="alert">
            {{ session('message') }}
        </div>
    @endif
    {{-- <div class="d-none d-md-block vh-100"></div> --}}
    <div class="container-fluid">
        <div class="row mt-3">
            {{-- <div class="col-12"> --}}
            @forelse ($articles as $article)
                <div class="col-12 col-md-4 d-flex justify-content-center mt-5">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <h3 class="text-center">
                        There are no articles yet.
                    </h3>
                </div>
            @endforelse

        </div>
    </div>
</x-layout>
