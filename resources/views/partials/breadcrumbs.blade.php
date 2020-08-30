@if (count($breadcrumbs))

    <ol class="breadcrumbs mw-100">
        @foreach ($breadcrumbs as $breadcrumb)

            @if ($breadcrumb->url && !$loop->last)
                <li class="breadcrumbs-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                <i class="fas fa-chevron-left"></i>
            @else
                <li class="breadcrumbs-item active mw-100 text-right">{{ $breadcrumb->title }} </li>
            @endif

        @endforeach
    </ol>

@endif
