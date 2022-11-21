@extends('admin.layout.main')
@section('title')
    Profile
@endsection

@section('mainHeading')
Profile
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Profile</li>
@endsection
@section('content')

<div class="card card-primary card-outline">
    <div class="card-body box-profile">
      <div class="text-center">
        <img class="profile-user-img img-fluid img-circle"
             src="{{ asset('profile/'. Auth::user()->avatar) }}"
             alt="User profile picture">
      </div>

      <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
<form style="width: 50vw; margin-left: 25vw;" enctype="multipart/form-data" method="post" action="{{ route('profileUpdate') }}">
    @csrf
    <div class="row">
        <div class="form-group">
            <label> Image </label>
            <input type="file" name="image" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="form-group">
             <label> name  </label>
          <input type="text" name="name"  class="form-control" value="{{ Auth::user()->name }}">
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <label> Email </label>
            <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" >
        </div>
    </div>
<div class="row">
    <div class="col-4">
        <input type="submit"value="submit" />
    </div>
</div>
</form>

     

      {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
    <div>
   <div class="card card-primary card-outline">
  <h3 class="profile-username text-center">Change Password</h3>
  <form style="width: 50vw; margin-left: 25vw;" enctype="multipart/form-data" method="post" action="{{ route('changepassword') }}">
      @csrf
     
      <div class="row">
          <div class="form-group">
               <label> Old Password  </label>
            <input type="password" name="oldpassword"  class="form-control" value="{{ Auth::user()->oldpassword }}">
          </div>
      </div>
      <div class="row">
          <div class="form-group">
              <label> New Password </label>
              <input type="password" name="newpassword" class="form-control" value="{{ Auth::user()->newpassword }}" >
          </div>
      </div>
  <div class="row">
      <div class="col-4">
          <input type="submit"value="submit" />
      </div>
  </div>
  </form>
  
  <!-- /.card -->
@endsection

