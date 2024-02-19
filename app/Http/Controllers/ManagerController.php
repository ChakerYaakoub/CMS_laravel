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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use stdClass;
use Illuminate\Validation\ValidationException;

class ManagerController extends Controller
{
    //

    public function myBlogs()
    {
        $userId = Auth::id();
        $sites = Site::where('user_id', $userId)->get();
        return view('manager.myBlogs', compact('sites'));
    }

    public function show()
    {
        // Get the logged-in user's ID
        $userId = Auth::id();



        $totalVisits = SiteVisit::where('site_builder_id', $userId)->count();;

        // Total number of sites by the logged-in user
        $totalSites = Site::where('user_id', $userId)->count();

        // Total reactions by the logged-in user
        $reactions = Reaction::where('site_builder_id', $userId);

        $sites = Site::where('user_id', $userId)
            ->withCount([
                'reactions',
                'reactions as likes_count' => function ($query) {
                    $query->where('reaction_type', 'like');
                },
                'reactions as dislikes_count' => function ($query) {
                    $query->where('reaction_type', 'dislike');
                },
                'reactions as loves_count' => function ($query) {
                    $query->where('reaction_type', 'love');
                },
                'siteVisits'
            ])
            ->get();

        return view('manager.index', compact('totalVisits', 'totalSites', 'reactions', 'sites'));
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


            $validatedData['logo'] = $request->file('logo')->store(str_replace(' ', '_', "sites/general"), 'public');
        }

        if ($request->hasFile('BasicImage')) {


            $validatedData['BasicImage'] = $request->file('BasicImage')->store(str_replace(' ', '_', "sites/general"), 'public');
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

        return redirect("/sites/manager/newBlog/articles/{$site->id}?article_nb=1");
        //  ->with('message', 'Thanks for signing up!');
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
        $path = $request->file('image_param')->store("sites/articles", 'public');

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
            // 'user_id' => auth()->user()->id,
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

    // editBlog 

    public      function editBlogForm($site_id)
    {
        $site = Site::find($site_id);

        $site_template = DesignTemplate::where('id', $site->design_template_id)->first()->template_type;
        $site_color = Color::where('id', $site->color_id)->first();
        $site_articles = Article::where('site_id', $site->id)
            ->orderBy('article_nb', 'asc')
            ->get();

        // return view('sites.show', [
        //    'site' => $site,
        //   'site_template' => $site_template->template_type,
        //   'site_color' => $site_color,
        //   //'site_articles' => $site_articles
        //  ]);

        return view('manager.edit', compact('site', 'site_template', 'site_color', 'site_articles'));
    }

    // update site
    public function updateSite(Request $request, $site_id)
    {
        // dd($request->all());




        // try {
        $validatedData = $request->validate([
            // general data 
            'site_title' => 'required|string|max:255',
            'site_id' => 'required|integer', // 'site_id' is required and must be an 'integer
            'introduction' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'BasicImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'required|string',
            'font_color' => 'required|string',
            'background_color' => 'required|string',
            'section_separator_color' => 'required|string',
            'template_type' => 'required|string',

            // articles
            'articles.*.title' => 'required|string|max:255',
            'articles.*.content' => 'nullable|string',
            'articles.*.id' => 'integer',
            'articles.*.delete' => 'string',
            'articles.*.article_nb' => 'integer',


        ]);





        $site = Site::where('id', $validatedData['site_id'])->first(); // Use first() instead of get()

        if (!$site) {
            throw new \Exception("Site not found with ID: {$validatedData['site_id']}");
        };






        $color = Color::create([
            'font_color' => $validatedData['font_color'],
            'background_color' => $validatedData['background_color'],
            'section_separator_color' => $validatedData['section_separator_color'],
        ]);

        $template = DesignTemplate::create([
            'template_type' => $validatedData['template_type'],
        ]);




        if ($request->hasFile('logo')) {

            // Storage::delete($site->logo);
            $s = Storage::delete('public/' . $site->logo);






            $validatedData['logo'] = $request->file('logo')->store(str_replace(' ', '_', "sites/general"), 'public');
        }

        if ($request->hasFile('BasicImage')) {


            $s = Storage::delete('public/' . $site->BasicImage);







            $validatedData['BasicImage'] = $request->file('BasicImage')->store(str_replace(' ', '_', "sites/general"), 'public');
        }

        $site->update([
            'site_title' => $validatedData['site_title'],
            'introduction' => $validatedData['introduction'],
            'tags' => $validatedData['tags'],
            'color_id' => $color->id,
            'design_template_id' => $template->id,
            'logo' => $validatedData['logo'] ?? $site->logo, // Use existing logo if not provided
            'BasicImage' => $validatedData['BasicImage'] ?? $site->BasicImage, // Use existing BasicImage if not provided
            'link' => 'http://'


        ]);
        $site->save();


        // Process articles
        // $articleNb = 1;
        foreach ($validatedData['articles'] as $articleIndex => $articleData) {
            if ($articleData['delete'] === 'true') {
                $article_nb_deleted = $articleData['article_nb'];

                Article::destroy($articleData['id']);

                // Debug output
                Log::info("Article {$article_nb_deleted} deleted.");

                // Decrement article_nb for articles with article_nb greater than the deleted article
                foreach ($validatedData['articles'] as &$otherArticleData) {
                    if ($otherArticleData['article_nb'] > $article_nb_deleted) {
                        $otherArticleData['article_nb']--;

                        // Debug output
                        Log::info("Article {$otherArticleData['id']} updated with new article_nb: {$otherArticleData['article_nb']}");
                    }
                }
                unset($otherArticleData); // Unset reference to prevent unexpected behavior
            } else {
                $article = Article::find($articleData['id']);

                if (!$article) {
                    throw new \Exception("Article not found with ID: {$articleData['id']}");
                }

                $article->update([
                    'article_title' => $articleData['title'],
                    'article_content' => $articleData['content'],
                    'article_nb' => $articleData['article_nb'],
                ]);
            }
        }
        foreach ($validatedData['articles'] as $articleIndex => $articleData) {
            if ($articleData['delete'] === 'true') {
                $article_nb_deleted = $articleData['article_nb'];

                Article::destroy($articleData['id']);

                // Decrement article_nb for articles with article_nb greater than the deleted article
                foreach ($validatedData['articles'] as &$otherArticleData) {
                    if ($otherArticleData['article_nb'] > $article_nb_deleted) {
                        $otherArticleData['article_nb']--;
                    }
                }
                unset($otherArticleData); // Unset reference to prevent unexpected behavior
            } else {
                $article = Article::find($articleData['id']);

                if (!$article) {
                    throw new \Exception("Article not found with ID: {$articleData['id']}");
                }

                $article->update([
                    'article_title' => $articleData['title'],
                    'article_content' => $articleData['content'],
                    'article_nb' => $articleData['article_nb'],
                ]);
            }
        }




        //Color::destroy($site->color_id);
        // DesignTemplate::destroy($site->design_template_id);
        return redirect('/site/' . $validatedData['site_id'])->with('success', 'Site updated successfully');
        //  }
        //catch (ValidationException $e) {
        // Handle validation errors
        //    return $e->errors();
        // }
        //  catch (\Exception $e) {
        // Handle other exceptions
        //     return redirect('/sites/manager/edit/site/' . $site_id)->with('error', $e->getMessage());
        // }
    }

    public function upload_imageArticles_edit(Request $request)
    {

        // Validate the uploaded image
        $validatedData =  $request->validate([
            'image_param' => 'required|image|max:2048', // Max file size: 2MB
            'site_id' => 'required|integer',
            'title' => 'required|string|max:255',

        ]);




        // Store the uploaded image in the 'public/images' directory
        // {$validatedData['title']}
        $path = $request->file('image_param')->store(str_replace(' ', '_', "sites/articles"), 'public');

        // Generate the URL for the uploaded image
        $link = Storage::url($path);




        return response()->json([

            'link' => $link,
        ]);
    }




    public function getNewArticle(Request $request, $site_id, $article_nb)
    {

        $site = Site::find($site_id);
        $site_articles = Article::where('site_id', $site->id)->get();
        // $article_nb = $site_articles->count() + 1;
        $site_title = $site->site_title;

        $site_article = Article::create([
            'site_id' => $site_id,
            'article_title' => 'New Article ',
            'article_content' => 'New Article Content',
            'article_nb' => $article_nb,
        ]);

        // Generate the HTML content for the new article using the received site ID
        $html = view('manager.partials.editArticle', compact('site_article', 'article_nb', 'site_title'))->render();
        return response()->json(['html' => $html, 'site_article_id' => $site_article->id]);
    }
}
