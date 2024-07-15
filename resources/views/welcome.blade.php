<x-layout
title="VARG">

    <x-masthead
    h1="VARG"
    />
    @if (session()->has('errorMessage'))
    <div class="alert alert-warning">
        {{ session('errorMessage') }}
            </div>
        @endif
    
    @if (session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{session('message')}}
        </div>
    @endif    
<div class="container-fluid">
    <div class="row mt-3">
        {{-- <div class="col-12"> --}}
            @forelse ($articles as $article)
            <div class="col-12 col-md-4 d-flex justify-content-center mt-5">
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
    {{-- disattivato momentaneamente perchè mette una side scrollbar --}}
    <div class="row">
        <div class="col-12 mt-5 mb-3 d-flex justify-content-center">
            <a href="{{route('create.article')}}"><button type="submit" class="button-86" role="button">Create Your Article</button></a>
        </div>
    </div>
</x-layout>