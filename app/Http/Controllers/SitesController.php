<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Color;
use App\Models\Comment;
use App\Models\DesignTemplate;
use App\Models\Reaction;
use App\Models\SiteVisit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
    public function show(Request $request,  Site $site)
    {
        $site_template = DesignTemplate::where('id', $site->design_template_id)->first();
        $site_color = Color::where('id', $site->color_id)->first();
        $site_articles = Article::where('site_id', $site->id)
            ->orderBy('article_nb', 'asc')
            ->get();



        $comments = Comment::select('comments.*', 'users.name as user_name')
            ->leftJoin('users', 'comments.user_id', '=', 'users.id')
            ->where('comments.site_id', $site->id)
            ->get();
        $reactions = Reaction::where('site_id', $site->id)->get();

        $ipAddress = $request->ip();
        $existingVisit = SiteVisit::where('site_id', $site->id)
            ->where('ip_address', $ipAddress)
            ->exists();

        if (!$existingVisit) {
            SiteVisit::create([
                'site_id' => $site->id,
                'site_builder_id' => $site->user_id,
                'ip_address' => $ipAddress,
            ]);
        }



        return view('sites.show', [
            'site' => $site,
            'site_template' => $site_template->template_type,
            'site_color' => $site_color,
            'site_articles' => $site_articles,
            'comments' => $comments,
            'reactions' => $reactions


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

    public function  removeSite($id)
    {
        try {
            // Find the site by ID
            $site = Site::findOrFail($id);

            $s = Storage::delete('public/' . $site->logo);
            $s2 = Storage::delete('public/' . $site->BasicImage);


            // Delete the site
            $site->delete();

            return response()->json(['message' => 'site deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete site'], 500);
        }
    }

    // handle reaction 

    public function handleReaction(Request $request, $site_id, $reaction)
    {
        $site_builder_id = Site::where('id', $site_id)->first()->user_id;
        $oldReaction = Reaction::where('site_id', $site_id)->where('user_id', $request->user()->id)->first()->reaction_type ?? null;

        if ($oldReaction == $reaction) {
            // delete the reaction
            Reaction::where('site_id', $site_id)->where('user_id', $request->user()->id)->delete();
            return response()->json(['message' => 'Reaction deleted successfully', 'reaction' => 'none', 'oldReaction' => $oldReaction], 201);
        }
        // Check if the user is authenticated
        if ($request->user()) {
            // Create or update the reaction in the database
            $newReaction = Reaction::updateOrCreate(
                ['site_id' => $site_id, 'user_id' => $request->user()->id],
                [
                    'site_builder_id' => $site_builder_id, 'reaction_type' => $reaction
                ]
            );

            return response()->json(['message' => 'Reaction updated successfully', 'reaction' => $newReaction->reaction_type, 'oldReaction' => $oldReaction], 200);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }
}
