@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @if (Auth::check())
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <nav class="nav nav-stacked">
                                <ul>
                                    <li style="list-style: none"><a href="">Email to a friend</a></li>
                                    @if (!$listing->favouritedBy(Auth::user()))
                                        <li style="list-style: none">
                                            <a
                                                href=""
                                                onclick="event.preventDefault();
                                                    document.getElementById('listings-favorite-form').submit();">
                                                Add to favorites
                                            </a>
                                            <form id="listings-favorite-form" action="{{ route('listings.favorites.store', [$area, $listing]) }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            @endif

            <div class="{{ Auth::check() ? 'col-md-9' : 'col-md-12' }}">
                <div class="panel panel-default">
                    <h4>
                        <div class="panel-heading">{{ $listing->title }} in <span class="text-muted">{{ $listing->area->name }}</span></div>
                    </h4>
                    <div class="panel-body">
                        {!! nl2br(e($listing->body)) !!}
                        <hr>
                        <p>Viewed x times</p>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Contact {{ $listing->user->name }}</span></div>
                    <div class="panel-body">
                        @if (Auth::guest())
                            <p><a href="/register">Sign up</a> for an account or <a href="/login">sign in</a> to contact listing owners.</p>
                        @else
                            <form action="" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="message" id="message" cols="30" rows="50" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">Send</button>
                                    <span class="help-block">
                                        This will email {{ $listing->user->name }} and they'll be able to reply derectly to you by email
                                    </span>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection