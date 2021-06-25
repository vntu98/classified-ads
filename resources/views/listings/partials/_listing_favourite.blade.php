@component('listings.partials._base_listing', compact('listing'))

    @slot('links')
        <ul class="list-inline">
            <li style="display: inline-block; margin-right: 10px">Added {{ $listing->pivot->created_at->diffForHumans() }}</li>
            <li style="display: inline-block;"><a href="" onclick="
                event.preventDefault();
                document.getElementById('listings-favourites-destroy-{{ $listing->id }}').submit()">Delete</a></li>

            <form id="listings-favourites-destroy-{{ $listing->id }}" action="{{ route('listings.favourites.destroy', [$area, $listing]) }}" method="post">
                @csrf
                {{ method_field('DELETE') }}
            </form>
        </ul>
    @endslot

@endcomponent