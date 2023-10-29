@extends('layouts/app')
@section('title',"$post->meta_title")
@section('description',"$post->meta_description")
@section('keywords',"$post->meta_keywords")
@section('content')
    <div class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="category-heading">
                        {!! $post->name !!}
                    </div>
                    <div class="my-2">
                        <h6>{{$post->category->name.'/'.$post->slug}}</h6>
                    </div>
                    <div class="card card-shadow mt-4">
                        <div class="card-body post-description">
                            {!! $post->description !!}
                        </div>
                    </div>

                    <div class="comment-area mt-4">

                        @if(session('message'))
                        <h6 class="alert alert-warning">{{session('message')}}</h6>
                        @endif
                        <div class="card card-body">
                            <h6 class="catd-title">Leave a Comment</h6>
                            <form action="{{url('comments')}}" method="POST">
                                @csrf
                                <input type="hidden" name="post_slug" value="{{$post->slug}}">
                                <textarea name="comment_body" class="form-control" rows="3" required></textarea>
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>
                        @forelse ($post->Comments as $comment)
                         <div class="comment-container card card-body shadow-sm my-3">
                            <div class="detail-area">
                                <h6 class="user-name mb-1">
                                    @if($comment->user)
                                        {{ $comment->user->name }}    
                                    @endif
                                    <small class="ms-3 text-primary">Commented on: {{$comment->created_at->format('d/m/y')}}</small>
                                </h6>
                                <p class="user-comment mb-1">
                                    {!! $comment->comment_body !!}
                                </p>
                            </div>
                            @if(Auth::check() && Auth::id()==$comment->user_id)
                            <div>
                                <button type="submit" value="{{$comment->id}}" class="btn btn-danger btn-sm me-2 deleteComment">Delete</button>
                            </div>
                            @endif
                        </div>
                        @empty
                        <div class="card card-body shadow-sm my-3">
                            <h6>No comments- Yet</h6> 
                        </div>
                        @endforelse
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="border p-2 mx-4">
                        <h4>Advertising Area</h4>
                    </div>
                    <div class="border p-2 mx-4">
                        <h4>Advertising Area</h4>
                    </div>
                    <div class="border p-2 mx-4">
                        <h4>Advertising Area</h4>
                    </div>
                    <div class="card mt-3 mx-4">
                        <div class="card-header">
                            <h4>Latest Posts</h4>
                        </div>
                        <div class="card-body">
                            @foreach ($latestPosts as $item)
                            <a href="{{url('tutorial/'.$item->category->slug.'/'.$item->slug)}}" class="text-decoration-none"><h6>{{$item->name}}</h6></a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
@endsection

@section('scripts')
    <script>
        $(document).ready(function()
        {
            $.ajaxSetup({
                headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
            $(document).on('click','.deleteComment',function()
            {
                if(confirm("Are you sure you want to delete this comment?"))
                {
                    var thisClicked=$(this);
                    var comment_id=thisClicked.val();
                    $.ajax({
                        type:'POST',
                        url:"{{url('delete-comment')}}",
                        data:{
                            'comment_id':comment_id,
                        },
                        success:function(res){
                            if(res.status==200)
                            {
                                thisClicked.closest('.comment-container').remove();
                                alert(res.message);
                            }
                            else
                            {
                                alert(res.messaage);
                            }
                        },
                        error:function(xhr)
                        {
                            alert(xhr.responseText.messaage)
                        }
                });
                }
            });
        });

    </script>
@endsection