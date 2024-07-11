<x-layout
title="VARG">

    <x-masthead
    h1="VARG"
    p="The best antiques site"
    />
<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <a href="{{route('create.article')}}"><button type="submit" class="button-86" role="button">Create Your Article</button></a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
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