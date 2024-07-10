<div>
    <div class="container">
        <div class="mt-3 mb-3 row justify-content-center">
            <div class="col-12 text-center">
                <h1>Create Article</h1>
            </div>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="title" name="title" class="form-control" id="title" wire:model="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descption</label>
            <textarea type="description" name="description" class="form-control" cols="30" rows="10" id="description"
                wire:model="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="price" name="price" class="form-control" id="price" wire:model="price">
        </div>
        <div class="mb-3">
            <select id="category" wire:model="category" class="form-control">
                <option label disabled>Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-dark">Login</button>
        </div>
        </form>
