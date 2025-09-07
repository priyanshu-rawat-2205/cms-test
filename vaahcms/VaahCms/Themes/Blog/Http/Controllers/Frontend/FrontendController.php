<?php namespace VaahCms\Themes\Blog\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use VaahCms\Modules\Blog\Models\Blog;
use VaahCms\Modules\Blog\Models\Category;
use VaahCms\Modules\Blog\Models\Tag;


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
            $query->where('category_id', $request->category);
        }
        if ($request->filled('tag')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('tag_id', $request->tag);
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

        return view('blog::frontend.home', compact('blogs', 'categories', 'tags', 'detail'));
    }

}
