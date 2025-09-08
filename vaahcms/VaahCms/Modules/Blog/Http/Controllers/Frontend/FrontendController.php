<?php namespace VaahCms\Modules\Blog\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use VaahCms\Modules\Blog\Mails\WelcomeSubscriberMail;
use VaahCms\Modules\Blog\Models\Blog;
use VaahCms\Modules\Blog\Models\Category;
use VaahCms\Modules\Blog\Models\Subscription;
use VaahCms\Modules\Blog\Models\Tag;
use WebReinvent\VaahCms\Libraries\VaahMail;

class FrontendController extends Controller
{


    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $query = Blog::with(['category', 'tags']);

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->filled('category')) {
            $query->where('bl_category_id', $request->category);
        }
        if ($request->filled('tag')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('bl_tag_id', $request->tag);
            });
        }

        $blogs = $query->paginate(6);
        $categories = Category::all();
        $tags = Tag::all();

        // Add this for detail page support
        $detail = null;
        if ($request->filled('blog')) {
            $detail = Blog::with(['category', 'tags'])
                ->where('slug', $request->blog)
                ->first();
        }

        return view('blog::frontend.pages.index', compact('blogs', 'categories', 'tags', 'detail'));
    }

    public function show($slug){
        $blog = Blog::with(['category', 'tags'])->where('slug', $slug)->firstOrFail();
        return view('blog::frontend.pages.show', compact('blog'));
    }

    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
        ]);

        $existing = Subscription::where('email', $validated['email'])->first();

        if ($existing) {
            return back()->with('error', 'This email is already subscribed!');
        }

        $subscriber = Subscription::create([
            'email' => $validated['email'],
        ]);

        // dd($subscriber);

        VaahMail::addInQueue(
            new WelcomeSubscriberMail($subscriber->email),
            $subscriber->email
        );

        return back()->with('success', 'You have successfully subscribed');
    }

}