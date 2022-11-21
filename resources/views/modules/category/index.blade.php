@extends('admin.layout.main')
@section('title')
    category
@endsection

@section('mainHeading')
Category
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">player</li>
@endsection

@section('content')
<div class="modal fade" id="addplayer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('category.insert') }}" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          @csrf
          <form method="post">
            <div class="row">
              <input type="file" class="form-control" name="image" />
              <div class="col-6">
                <label>Name</label>
                <input type="text" name="playername" value="{{ old('playername') }}" class="form-control"/>
              </div>
              <div class="col-6 form-group">
                <label>email</label>
                <input type="text" name="email" value="{{ old('email') }}" class="form-control"/>
              </div>
            </div>
         
        </div>
        <div class="modal-footer">
          
          <button type="submit" class="btn btn-primary">Please!</button>
        </div>
      </div>
    </form>
    </div>
  </div>
  

  <div class="modal fade" id="bulkUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">bulkUpload</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('category.bulkUpload') }}" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          @csrf
          <form method="post">
            <div class="row">
              <label>File Upload </label>
              <input type="file" class="form-control" name="uploadfile" />
            </div>
        </div>
        <div class="modal-footer">
          
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </form>
    </div>
  </div>


  <div class="modal fade" id="editplayer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{  route('category.update') }}" method="post">
       
        <div class="modal-body">
          @csrf
          <input type="hidden" name="id" id="id"/>
        
            <div class="row">
              <div class="col-6">
                <label>Name</label>
                <input type="text" name="playername" id="playername" value="{{ old('playername') }}" class="form-control"/>
              </div>
              <div class="col-6 form-group">
                <label>email</label>
                <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control"/>
              </div>
            </div>
         
        </div>
        <div class="modal-footer">
          
          <button type="submit" class="btn btn-primary">Ok!</button>
        </div>
      </div>
    </form>
    </div>
  </div>
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Player</h3>
      <div class="card-tools">
        <a href="{{ route('category.download') }}"
        class="btn btn-success"> Download</a>
        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#bulkUpload">
          <i class="fas fa-plus">BulkUpload</i>
        </button>
        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addplayer">
            <i class="fas fa-plus">Add</i>
          </button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table style="width: 50vw; margin-left: 25vw;" id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Player name </th>
                <th>Email </th>
                <th>Image </th>
                <th> Actions </th>
            </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td> {{$category->playername}} </td>
                        <td> {{$category->email}} </td>
                        <td> <img src="{{ asset('profile/'.$category->image)}}"
                          height="150px" width="150px"/>
                        <td>
                            <button type="button" class="btn btn-success btn-sm" onclick="edit({{$category}})">
                                <i class="fas fa-edit"></i>
                            </button>    

                            <a href="{{ route('category.delete',[$category->id]) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </a>
                        </td>
                     </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">

    </div>
    <!-- /.card-footer -->
  </div>
  <!-- /.card -->
@endsection
@section('script')
<script>
  function edit(data){
    $("#id").val(data.id);
    $('#playername').val(data.playername);
    $('#email').val(data.email);
    $('#editplayer').modal('show');
  }
    </script>
@endsection