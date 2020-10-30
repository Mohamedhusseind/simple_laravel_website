@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <img src="../uploads/avatars/{{$user->avatar}}" style="width: 150px; height: 150px; float: left; border-radius: 50%;margin-right: 25px;"/><br>
               <h2><span style="color: #298fe2">{{$user->name}}'s profile</span></h2>
                <form enctype="multipart/form-data" action="/profile" method="POST">
                <h5>Update Profile Image</h5>
                <input type="file" name="avatar" />
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <input type="submit"class="pull-right btn btn-sm btn-primary"/>

                </form>
            </div>
        </div>
    </div>
@endsection
