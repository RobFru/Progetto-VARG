<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form method="POST" action="{{ route('become.revisor') }}">
                    @csrf
                    <div class="mt-3 mb-3 row justify-content-center">
                        <div class="col-12 text-center">
                            <h1>Send us a request</h1>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Tell us why you want to work with us</label>
                        <textarea type="description" cols="20" rows="10" name="description" class="form-control shadow" id="description"></textarea>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-custom">Send</button>
                    </div>
                </form>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</x-layout>