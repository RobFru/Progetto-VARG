<form class="d-inline" action="{{route('setLocale', $lang)}}" method="POST">
    @csrf
    <button type="submit" class="btn btn-custom-4 ms-2">
        <img src="{{asset('vendor/blade-flags/language-' . $lang . '.svg')}}" width="32" height="32" />
    </button>
</form>