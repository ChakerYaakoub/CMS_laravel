<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class SitesController extends Controller
{


    // show all listings
    public function index(Request $request)
    {
        // dd($request); ==> to see the request info with arg index(Request $request) 
        //dd(request()); // ==> the  same without passing the request

        return view('sites.index', [
            // 'listings' => Listing::all()
            'sites' => Site::latest()->take(10)->filter(request(['tag', 'search']))->get()
        ]);
    }

    // show single listing
    public function show(Site $site)
    {
        return view('sites.show', [
            'site' => $site
        ]);

        // or 

        /*    $list = Listing::find($listing->id);
    if ($listing) {
        return view('listing', [
            'listing' => $list
        ]);
    } else {
        // return response('Listing not found', 404);
        abort(404);*/
    }

    // show create form
    public function create()
    {
        return view('sites.create');
    }
}
