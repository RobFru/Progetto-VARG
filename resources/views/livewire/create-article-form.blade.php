<div>
    @if (session('message'))
        <div class="alert alert-custom alert-dismissible fade show" role="alert">
        <strong>{{session('message')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form wire:submit="store">
    <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="title" name="title" class="form-control" @error('title') is-invalid @enderror id="title"
              wire:model.blur="title">
          @error('title')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>
      <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea type="description" name="description" class="form-control" @error('description') is-invalid @enderror
              cols="30" rows="10" id="description" wire:model.blur="description"></textarea>
          @error('description')
              <span class="fst-italic text-danger">{{ $message }}</span>
          @enderror
      </div>
      <div class="mb-3">
          <label for="price" class="form-label">Price</label>
          <input type="price" name="price" class="form-control" @error('price') is-invalid @enderror id="price"
              wire:model.blur="price">
          @error('price')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>
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
          <button type="submit" class="btn btn-dark">Insert Articles</button>
      </div>
      </form>
</div>
