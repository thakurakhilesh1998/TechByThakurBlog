@extends('layouts.master')

@section('title','Category')

@section('main')
<div class="container-fluid px-4">
    <h1 class="mt-4">Category</h1>

    
    
    <div class="card">
        <div class="card-header">
            <h4>View Category:  <a href="{{url('admin/add-category')}}" class="btn btn-primary btn-sm float-end">Add Category</a></h4>
        </div>
        <div class="card-body">
            @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $cat)
                        <tr>
                            <td>
                                {{$cat->id}}
                            </td>
                            <td>
                                {{$cat->name}}
                            </td>
                            <td>
                                <img src="{{asset('uploads/category/'.$cat->image)}}" width="50px" height="50px" alt="image">
                            </td>
                            <td>
                                {{$cat->status=='1'?"Hidden":"Show"}}
                            </td>
                            <td>
                               <a href="" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection