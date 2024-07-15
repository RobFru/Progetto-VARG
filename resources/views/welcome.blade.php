<x-layout
title="VARG">

    <x-masthead
    h1="VARG"
    />
<div class="container-fluid">
    <div class="row mt-5">
        {{-- <div class="col-12"> --}}
            @forelse ($articles as $article)
            <div class="col-12 col-md-4 d-flex justify-content-center">
                <x-card :article="$article"/>
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
    <div class="row">
        <div class="col-12 mt-5 mb-3 d-flex justify-content-center">
            <a href="{{route('create.article')}}"><button type="submit" class="button-86" role="button">Create Your Article</button></a>
        </div>
    </div>
</x-layout>