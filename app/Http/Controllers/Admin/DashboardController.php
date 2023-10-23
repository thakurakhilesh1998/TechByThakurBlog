<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Models\Posts;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categories=Category::count();
        $posts=Posts::count();
        $users=User::where('role_as','0')->count();
        $admin=User::where('role_as','1')->count();
        return view("admin.dashboard",compact('categories','posts','users','admin'));
    }
}
