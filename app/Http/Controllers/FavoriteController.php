<?php

namespace App\Http\Controllers;
use App\Post;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function add($post)
    {
        $user = Auth::user();
        $isFavorite = $user->favorite_posts()->where('post_id',$post)->count();

        if ($isFavorite == 0)
        {
            $user->favorite_posts()->attach($post);
            Toastr::success('Post adicionado aos favoritos :)','Successo');
            return redirect()->back();
        } else {
            $user->favorite_posts()->detach($post);
            Toastr::success('Post removido dos favoritos :(','Successo');
            return redirect()->back();
        }
    }
}
