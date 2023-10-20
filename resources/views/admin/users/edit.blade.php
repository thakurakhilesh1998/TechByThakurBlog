@extends('layouts.master')

@section('title','Edit User')

@section('main')
<div class="container-fluid px-4 mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Edit User
                <a href="{{url('admin/users/')}}" class="btn btn-success float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
          <form>
            <div class="mb-3">
                <label for="user_name">Name</label>
                <p class="form-control">{{$user->name}}</p>
            </div>
            <div class="mb-3">
                <label for="user_email">Email</label>
                <p class="form-control">{{$user->email}}</p>
            </div>
            <div class="mb-3">
                <label for="Created At">User Create At</label>
                <p class="form-control">{{$user->created_at->format('d/m/y')}}</p>
            </div>
            <div class="mb-3">
                <label for="Created At">User Role</label>
                <select name="role_as" id="" class="form-control">
                    <option value="0" {{$user->role_as=='0'?"selected":''}}>User</option>
                    <option value="1" {{$user->role_as=='1'?"selected":''}}>Admin</option>
                    <option value="2" {{$user->role_as=='2'?"selected":''}}>Blogger</option>
                </select>
            </div>
            <button type="sumbit" class="btn btn-primary">Update User</button>
          </form>

        </div>
    </div>
</div>
@endsection