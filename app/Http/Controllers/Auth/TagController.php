<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;


class TagController extends Controller
{
    public function index(){

        $tags = Tag::all();

        return view('auth.tags.index',compact('tags'));

    }
}
