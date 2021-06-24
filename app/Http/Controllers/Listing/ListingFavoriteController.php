<?php

namespace App\Http\Controllers\Listing;

use App\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Listing;

class ListingFavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Request $request, Area $area, Listing $listing)
    {
        $request->user()->favouriteListings()->syncWithoutDetaching([$listing->id]);

        return back();
    }
}
