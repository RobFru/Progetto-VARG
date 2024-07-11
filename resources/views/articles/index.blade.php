<x-layout>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="d-flex justify-content-center mt-3 mb-3">
                Articles
            </h1>
        </div>
    </div>
    <div class="row">
        @forelse ($articles as $article)
            <div class="col-12 col-md-4 mb-5">
                <x-card :article="$article"/>
            </div>
            @empty
            <div class="col-12">
                <h3 class="text-center">
                    there are no articles yet.
                </h3>
            </div>  
            @endforelse
    </div>
</div>  
<div class="">
    <div>
        {{ $articles->links() }}
    </div>
</div>











</x-layout>