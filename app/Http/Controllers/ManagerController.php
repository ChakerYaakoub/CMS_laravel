<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Color;
use App\Models\DesignTemplate;
use App\Models\Reaction;
use App\Models\Site;
use App\Models\SiteVisit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use stdClass;

class ManagerController extends Controller
{
    //

    public function show()
    {
        // Get the logged-in user's ID
        $userId = Auth::id();



        $totalVisits = SiteVisit::where('site_builder_id', $userId)->count();;

        // Total number of sites by the logged-in user
        $totalSites = Site::where('user_id', $userId)->count();

        // Total reactions by the logged-in user
        $totalReactions = Reaction::where('user_id', $userId)->count();

        return view('manager.index', compact('totalVisits', 'totalSites', 'totalReactions'));
    }

    public function showForm()
    {
        return view('manager.create');
    }

    public function showFormArticles(Request $request, $site_id)
    {
        $article_nb = $request->query('article_nb');

        // Use the $site_id and $article_nb as needed

        return view('manager.newArticles', compact('site_id', 'article_nb'));
    }




    public function storeGeneral(Request $request)
    {
        // dd($request->file('logo'));

        $validatedData = $request->validate([

            'site_title' => 'required|string|max:255|unique:sites,site_title',
            'introduction' => 'required|string',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'BasicImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'required|string',
            'font_color' => 'required|string',
            'background_color' => 'required|string',
            'section_separator_color' => 'required|string',
            'template_type' => 'required|string',


        ]);

        $color = Color::create([
            'font_color' => $validatedData['font_color'],
            'background_color' => $validatedData['background_color'],
            'section_separator_color' => $validatedData['section_separator_color'],
        ]);

        $template = DesignTemplate::create([
            'template_type' => $validatedData['template_type'],
        ]);

        if ($request->hasFile('logo')) {


            $validatedData['logo'] = $request->file('logo')->store(str_replace(' ', '_', "sites/{$validatedData['site_title']}"), 'public');
        }

        if ($request->hasFile('BasicImage')) {


            $validatedData['BasicImage'] = $request->file('BasicImage')->store(str_replace(' ', '_', "sites/{$validatedData['site_title']}"), 'public');
        }

        $site = Site::create([
            'user_id' => auth()->user()->id,
            'site_builder' => auth()->user()->name,
            'site_title' => $validatedData['site_title'],
            'introduction' => $validatedData['introduction'],
            'tags' => $validatedData['tags'],
            'color_id' => $color->id,
            'design_template_id' => $template->id,
            'logo' => $validatedData['logo'],
            'BasicImage' => $validatedData['BasicImage'],
            'link' => 'http://'
        ]);

        // with('success', 'Site created successfully');

        //  return $site->id; 

        return redirect("/sites/manager/newBlog/articles/{$site->id}?article_nb=1")
            ->with('message', 'Thanks for signing up!');
    }


    // upload image articles
    public function upload_imageArticles(Request $request)
    {

        // Validate the uploaded image
        $request->validate([
            'image_param' => 'required|image|max:2048', // Max file size: 2MB
            'site_id' => 'required|integer',
        ]);


        $site_id = $request->input('site_id'); // Use input() instead of query() to get parameters from the request body
        // find site by id and get the title 
        $site = Site::find($site_id);
        $site_title = $site->site_title;

        // Store the uploaded image in the 'public/images' directory
        $path = $request->file('image_param')->store(str_replace(' ', '_', "sites/{$site_title}"), 'public');

        // Generate the URL for the uploaded image
        $link = Storage::url($path);




        return response()->json([

            'link' => $link,
        ]);
    }


    // delete image articles
    public function remove_imageArticles(Request $request)
    {
        // Get src from the request body.
        $data = json_decode($request->getContent(), true);
        $src = $data['src'];

        // Extract the path from the full URL.
        $urlParts = parse_url($src);
        $path = $urlParts['path'];

        // Construct the absolute path on the server.
        $absolutePath = public_path($path);

        // Check if file exists and delete it.
        if (file_exists($absolutePath)) {
            unlink($absolutePath);
            return response()->json(['message' => 'Image deleted successfully'], 200);
        } else {
            return response()->json(['error' => 'File not found'], 404);
        }
    }



    //  save the articles
    public function storeArticles(Request $request, $site_id, $addNew, $article_nb)

    {


        $validatedData = $request->validate([

            'article_title' => 'required|string|max:255',
            'article_content' => 'required|string',
        ]);

        $article = Article::create([
            'user_id' => auth()->user()->id,
            'site_id' => $site_id,
            'article_title' => $validatedData['article_title'],
            'article_content' => $validatedData['article_content'],
            'article_nb' => $article_nb,
        ]);

        if ($addNew == 'true') {
            return redirect("/sites/manager/newBlog/articles/{$site_id}?article_nb=" . ($article_nb + 1));
        } else {
            return redirect("/site/$site_id");
        }
    }
}
