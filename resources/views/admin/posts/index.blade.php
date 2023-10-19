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
            <table class="table table-bordered text-center">
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection