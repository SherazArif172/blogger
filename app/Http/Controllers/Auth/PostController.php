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
        });
      } catch (\Exception $ex) {
             return back()->withErrors($ex->getMessage());
      }

        return $request->all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
