<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index()
    {
        $users=User::all();
        return view('admin/users/index',compact('users'));
    }

    public function edit($user_id)
    {
        $user=User::find($user_id);
        return view('admin/users/edit',compact('user'));
    }
    
    public function update(Request $req,$user_id)
    {
        $user=User::find($user_id);
        if($user)
        {
            $user->role_as=$req['role_as'];
            $user->update();
            return redirect('admin/users')->with('message',"User Role Updaed Successfully");
        }
        else
        {
            return redirect('admin/users')->with('message',"No such user found");
        }
    }
}
