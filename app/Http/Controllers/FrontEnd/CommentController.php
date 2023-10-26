<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Posts;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $req)
    {
        if(Auth::check())
        {
            $validator=Validator::make($req->all(),[
                'comment_body'=>'required|string'
            ]);
            if($validator->fails())
            {
                return redirect()->back->with('message',"Comment area is mandatory");
            }
            $post=Posts::where('slug',$req->post_slug)->where('status','0')->first();
            if($post)
            {
                Comment::create([
                    'post_id' => $post->id,
                    'user_id' => Auth::user()->id,
                    'comment_body'=>$req->comment_body

                ]);
                return redirect()->back()->with('message',"Commented Successfully");
            }
            else
            {
                return redirect()->back()->with('message',"No such post found");
            }
        }
        else
        {
            return redirect('login')->with('message',"Login first to comment");
        }
    }

    public function destroy(Request $req)
    {
     
        if(Auth::check())
        {
            $comment=Comment::where('id',$req->comment_id)->where('user_id',Auth::user()->id)->first();
            $comment->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Comment Deleted Successfully'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>401,
                "message"=>'Login to Delete this comment'
            ]);
        }
    }
}
