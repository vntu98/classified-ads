<div class="media">
    <div class="media-body">
        <h5>
            <strong><a href="{{ route('listings.show', [$area, $listing]) }}">{{ $listing->title }}</a></strong>

            @if ($area->children->count())
                in {{ $listing->area->name }}
            @endif
        </h5>

        <ul class="list-inline">
            <li style="display: inline-block; margin-right: 15px"><time>{{ $listing->created_at->diffForHumans() }}</time></li>
            <li style="display: inline-block;">{{ $listing->user->name }}</li>
        </ul>
    </div>
</div>

@yield('links')