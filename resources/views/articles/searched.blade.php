<x-layout>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 mt-3 mb-3 text-center">
                <h1>{{__('ui.Searched articles')}}</h1>
            </div>
        </div>
        <div class="row">
            @forelse ($articles as $article)
            <div class="col-12 col-md-4 d-flex justify-content-center mt-5">
                <x-card :article="$article"/>
            </div>
            @empty
            <div class="col-12 d-flex justify-content-center mt-4">
                <h3>
                    {{__('ui.No articles found.')}}
                </h3>
            </div>
            @endforelse
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div>{{$articles->links()}}</div>
    </div>
</x-layout>