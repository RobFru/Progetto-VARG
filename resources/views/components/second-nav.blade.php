<div>
    <nav class="navbar navbar-secondaria">
        <ul class="navbar-secondaria mx-auto mb-2 mb-lg-0">
            @foreach ($categories as $category)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('byCategory', ['category' => $category]) }}">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
</div>
