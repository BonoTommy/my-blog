<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class BlogPostController extends Controller
{
    public function __construct()
    {
        $this->middleware(('auth'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogs = BlogPost::all();

        return view('blog.index', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $blogPost = BlogPost::create([
            'title'     => $request->title,
            'body'      => $request->body,
            'user_id'   => Auth::user()->id
        ]);

        return redirect(route('blog.show', $blogPost->id))->withSuccess('Post inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {
        //
        return view('blog.show', ['blogPost' => $blogPost]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blogPost)
    {
        //
        return view('blog.edit', ['blogPost' => $blogPost]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        //
        $blogPost->update([
            'title'     => $request->title,
            'body'      => $request->body
        ]);

        return redirect(route('blog.show', $blogPost->id))->withSuccess('Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();

        return redirect(route('blog.index'))->withSuccess('Post Deleted');
    }

    public function query() {

        $blog = BlogPost::all();

        //$blog = BlogPost::select('id', 'title')->get();
        //$blog = BlogPost::select()->first();

        // $blog = pdo->prepare(select * from blog_posts WHERE id = 7); $blog(execute(array($id))); $blog->fetch();

        // $blog = BlogPost::find(5);

        // $blog = BlogPost:: select()
        //     ->where('id', 1)
        //     ->first();

        // $blog = BlogPost:: select()
        //      ->where('user_id', '!=', 1)
        //      ->where('title', 'Abc')
        //      ->orderby('title'/*, 'desc'*/)
        //      ->get();
        
        /*$blog = BlogPost:: select()
        ->where('user_id', '!=', 1)
        ->orwhere('title', 'Abc')
        ->orderby('title', 'desc')
        ->get();*/


        //UPDATE

        // BlogPost::create([]);

        // $blog = new BlogPost;
        // $blog->title = 'Abc';
        // $blog->save();

        // $blog = BlogPost::find(1);
        // $blog->update([]);

        // $blog->title = "Abc";
        // $blog->save();

        //JOIN

        // $blog = BlogPost::select()
        //         ->join('users', 'user_id', '=', 'users.id')
        //         ->get();

        // $blog = BlogPost::select()
        // ->rightjoin('users', 'blog_posts.user_id', '=', 'users.id')
        // ->get();

        //AGGREGATION

    // $blog = BlogPost::count();
    // $blog = BlogPost::max('id');
    // $blog = BlogPost::average('id');

    // $blog = BlogPost::select()
    //     ->where("user_id", 2)
    //     ->count();

    // $blog = BlogPost::select(DB::raw('count(*) as blogs'), 'user_id')
    //     ->groupBy('user_id')
    //     ->get();

    // $blog = BlogPost::select()
    //     ->paginate(5);

         return $blog(0);
    }

    public function page() {
        $blogs = BlogPost::select()
            ->paginate(5);

        return view('blog.page', ['blogs' => $blogs]);
    }
}
