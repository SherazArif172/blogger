<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts =Post::all();
        return view('auth.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        $tags = Tag::all();
        return view('auth.posts.create')->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validation

         $request->validate([
              'title'=>['required','string','max:255'],
              'description' => ['required','string', 'max:3000'],
              'status'  => ['required','integer','max:255'],
              'category' => ['required','integer','max:255'],
              'tags'        => ['nullable','array'],
              "tags.*" => ['required','string','max:255']
        ]);



      try {
        DB::transaction(function() use ($request) {    // dependandt record
            $post=Post::create([
                'user_id'=>auth()->id(),
                'title'=>$request->title,
                'description'=>$request->description,
                'status'=>$request->status,
                'category_id'=>$request->category,
            ]);

            foreach ($request->tags as $tag){

                $post->tags()->attach($tag);  // honi ye aik line the laken for each is lye chlyaa q k hmary pass multiple tags hain
            }

            DB::commit();

            $request->session()->flash('alert success', "Post Created Successfully");


        });
      } catch (\Exception $ex) {
             return back()->withErrors($ex->getMessage());
      }

        // return $request->all();
        return to_route('posts.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

        return view('auth.posts.show',compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('auth.posts.edit', compact('post','categories', 'tags'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {


        $request->validate([
            'title'=>['required','string','max:255'],
            'description' => ['required','string', 'max:3000'],
            'status'  => ['required','integer','max:255'],
            'category' => ['required','integer','max:255'],
            'tags'        => ['nullable','array'],
            "tags.*" => ['required','string','max:255']
      ]);


        $post->update([

            'user_id'=>auth()->id(),
            'title'=>$request->title,
            'description'=>$request->description,
            'status'=>$request->status,
            'category_id'=>$request->category,

        ]);


        foreach ($request->tags as $tag){

            $post->tags()->attach($tag);  // honi ye aik line the laken for each is lye chlyaa q k hmary pass multiple tags hain
        }


        $request->session()->flash('alert success', "Post Updated Successfully");

        return to_route('posts.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Post $post)
    {


        $post->tags()->detach();

        $post->delete();

        $request->session()->flash('alert success', "Post Deleted Successfully");


        return to_route('posts.index');



    }
}
