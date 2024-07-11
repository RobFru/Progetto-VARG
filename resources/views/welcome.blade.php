<x-layout>

    <x-masthead/>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <a href="{{route('create.article')}}"><button type="submit" class="button-86" role="button">Create Articles</button></a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            @forelse ($articles as $article)
            <div class="col-12 col-md-3">
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

</x-layout>