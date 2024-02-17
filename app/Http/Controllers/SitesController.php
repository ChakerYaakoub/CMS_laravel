<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Color;
use App\Models\Comment;
use App\Models\DesignTemplate;
use Illuminate\Support\Facades\Auth;

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
        $comments = Comment::select('comments.*', 'users.name as user_name')
            ->leftJoin('users', 'comments.user_id', '=', 'users.id')
            ->get();



        return view('sites.show', [
            'site' => $site,
            'site_template' => $site_template->template_type,
            'site_color' => $site_color,
            'site_articles' => $site_articles,
            'comments' => $comments

        ]);
    }


    // show create form
    public function create()
    {
        return view('sites.create');
    }

    public function  storeComment(Request $request)
    {

        try {
            $userId = Auth::id();
            $validatedData = $request->validate([
                'comment' => 'required',
                'site_id' => 'required'
            ]);
            $comment = Comment::create([
                'comment' => $validatedData['comment'],
                'site_id' => $validatedData['site_id'],
                'user_id' => $userId
            ]);

            return redirect("/site/{$comment->site_id}#comments");
        } catch (\Exception $e) {
            return back()->with('error', 'Error in adding comment');
        }
    }


    public function  storeReply(Request $request)
    {

        try {
            $userId = Auth::id();
            $validatedData = $request->validate([
                'comment' => 'required',
                'site_id' => 'required',
                'parent_id' => 'required'
            ]);
            $comment = Comment::create([
                'comment' => $validatedData['comment'],
                'site_id' => $validatedData['site_id'],
                'user_id' => $userId,
                'parent_id' => $validatedData['parent_id']
            ]);

            return redirect("/site/{$comment->site_id}#comments");
        } catch (\Exception $e) {
            return back()->with('error', 'Error in adding comment');
        }
    }

    public function remove($id)
    {
        try {
            // Find the comment by ID
            $comment = Comment::findOrFail($id);

            // Authorize if the user is allowed to delete the comment (optional)
            // $this->authorize('delete', $comment); // You may need to define a policy for this

            // Delete the comment
            $comment->delete();

            return response()->json(['message' => 'Comment deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete comment'], 500);
        }
    }
}
