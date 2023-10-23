@extends('layouts.master')

@section('title','Category')

@section('main')

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{url('admin/delete-category')}}" method="POST">
            @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Category with its posts</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <h4>Are you sure want to delete the Category with its posts?</h4>
         <input type="hidden" name="category_id" id="category_id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Yes, Delete</button>
        </div>
      </div>
    </form>
    </div>
  </div>

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
            <div class="table-responsive">
                <table  id='datatable' class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
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
                               <a href="{{'edit-category/'.$cat->id}}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                            {{-- <a href="{{'delete-category/'.$cat->id}}" class="btn btn-danger">Delete</a> --}}
                            <button class="btn btn-danger deleteCategoryBtn" value="{{$cat->id}}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
    <script>
       $(document).ready(function()
        {
            $(document).on('click','.deleteCategoryBtn', function(e)
            {
                e.preventDefault();
                var category_id=$(this).val();
                $('#category_id').val(category_id);
                $('#deleteModal').modal('show');
            })
        });
    </script>
@endsection