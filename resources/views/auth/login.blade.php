<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mt-3 mb-3 row justify-content-center">
                        <div class="col-12 text-center">
                            <h1>{{__('ui.Login')}}</h1>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">{{__('ui.Email address:')}}</label>
                        <input type="email" name="email" class="form-control shadow" id="email"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{__('ui.Password')}}</label>
                        <input type="password" name="password" class="form-control shadow" id="password">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-custom">{{__('ui.Login')}}</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="min-vh-100">
        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="d-flex justify-content-center mt-3">{{__('ui.or')}}</div>
        <div class="d-flex justify-content-center mt-3">
            <a href="{{route('register')}}" class="btn btn-custom">{{__('ui.Create account')}}</a>
        </div>
    </div>
</x-layout>
