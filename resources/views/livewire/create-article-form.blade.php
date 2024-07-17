<div>
    @if (session('message'))
    <div class="alert alert-custom alert-dismissible fade show" role="alert">
        <strong>{{session('message')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @endif
    {{-- title --}}
    <form wire:submit="store">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="title" name="title" class="form-control" @error('title') is-invalid @enderror id="title"
            wire:model.blur="title">
            @error('title')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        {{-- description --}}
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="description" name="description" class="form-control" @error('description') is-invalid @enderror
            rows="5" id="description" wire:model.blur="description"></textarea>
            @error('description')
            <span class="fst-italic text-danger">{{ $message }}</span>
            @enderror
        </div>
        {{-- price --}}
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="price" name="price" class="form-control" @error('price') is-invalid @enderror id="price"
            wire:model.blur="price">
            @error('price')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        {{-- image --}}
        <div class="mb-3">
            <label for="img" class="form-label">Image:</label>
            <input type="file" wire:model.live="temporary_images"multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img/">
            
            @error('temporary_images.*')
            <p class="fst-italic text-danger">{{ $message }}</p>
            @enderror
            
            @error('temporary_images')
            <p class="fst-italic text-danger">{{ $message }}</p>
            @enderror
            
        </div>
        @if (!empty($images))
        <div class="row">
            <div class="col-12">
                <p>photo preview</p>
                <div class="row border border-4 border-success rounded shadow py-4">
                    @foreach ($images as $key => $image)
                    <div class="col d-flex flex-column align-items-center my-3">
                        <div class="img-preview mx-auto shadow rounded" style="background-image: url({{ $image->temporaryUrl() }});">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
        {{-- select category --}}
        <div class="mb-3">
            <select id="category" wire:model.blur="category" class="form-control"
            @error('category') is-invalid @enderror>
            <option label disabled>Select Category</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-custom">Insert Article</button>
    </div>
</form>
</div>
