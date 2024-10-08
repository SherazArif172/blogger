<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;


class DashboardController extends Controller
{
    //
    public function dashboard(){

        $postsCount = Post::count();
        $tagsCount = Tag::count();
        $categoryCount = Category::count();
        $usersCount = User::count();

        return view('auth.dashboard', compact('postsCount','tagsCount','categoryCount','usersCount'));
    }
}
