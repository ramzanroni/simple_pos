<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Phone;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    function getRelation() {
        //one to one
        // $phone=User::find(1);
        // $phone=User::find(1)->phoneTbl;

        // $user=Phone::find(1);
        // $user=Phone::find(1)->user;
        //$user=User::all();
        //similer as Phone model

        //one to many 
       // $post=Post::find(1);
        $post=Post::find(1)->comments;
        $post=Comment::find(1)->post;
        $post=Post::with('comments')->get();
        $comment=Comment::with('post')->get();
       // return $comment;
        $post=Post::with('categories')->get();
        $post=Category::with('posts')->get();
        return $post;
        return view('backend.relation.index', compact('post'));
    }
        
}
