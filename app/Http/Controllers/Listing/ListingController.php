<?php

namespace App\Http\Controllers\Listing;

use App\Area;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Listing;

class ListingController extends Controller
{
    public function index(Area $area, Category $category)
    {
        $listings = Listing::with(['user', 'area'])
            ->isLive()->inArea($area)->fromCategory($category)->latestFirst()->paginate((1));

        return view('listings.index', compact('listings', 'category'));
    }
}
