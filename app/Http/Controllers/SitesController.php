<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Color;
use App\Models\DesignTemplate;

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
        $site_template = DesignTemplate::where('id', $site->design_template_id)->first();
        $site_color = Color::where('id', $site->color_id)->first();
        $site_articles = Article::where('site_id', $site->id)->get();

        return view('sites.show', [
            'site' => $site,
            'site_template' => $site_template->template_type,
            'site_color' => $site_color,
            'site_articles' => $site_articles
        ]);
    }


    // show create form
    public function create()
    {
        return view('sites.create');
    }
}
