<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Posts;

class Posts extends Model
{
    use HasFactory;
    protected $table='posts';
    protected $fillable=['category_id','name','slug','description','yt_iframe','meta_title',
    'meta_description','meta_keywords','status','created_by'];

    public function category()
    {
        return $this->belongsto(Category::class,'category_id','id');
    }

    public function User()
    {
        return $this->belongsto(User::class,'created_by','id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'post_id','id');
    }
}
