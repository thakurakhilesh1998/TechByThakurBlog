@extends('layouts.master')

@section('title','View Posts')

@section('main')
<div class="container-fluid px-4 mt-4">
    <div class="card">
        <div class="card-header">
            <h4>View Posts
                <a href="{{url('admin/add-posts')}}" class="btn btn-primary btn-sm float-end">Add Posts</a>
            </h4>

        </div>
        <div class="card-body">
            @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <div class="table-responsive">
                <table id='datatable' class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Category
                        </th>
                        <th>
                            Post Name
                        </th>
                        <th>
                            Status
                        </th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $item)
                        <tr>
                            <td>
                                {{$item->id}}
                            </td>
                            <td>
                                {{$item->Category->name}}
                            </td>
                            <td>
                                {{$item->name}}
                            </td>
                            <td>
                                {{$item->status=='1'?"Hidden":"Visible"}}
                            </td>
                            <td><a href="{{'edit-post/'.$item->id}}" class="btn btn-primary">Edit</a></td>
                            <td><a href="{{'delete-post/'.$item->id}}" class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection