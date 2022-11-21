@extends('admin.layout.main')
@section('title')
    Player
@endsection

@section('mainHeading')
Player
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Player</li>
@endsection

@section('content')
<div class="modal fade" id="addplayer1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('player.insert') }}" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          @csrf
          <form method="post">
            <div class="row">
             {{--  <input type="file" class="form-control" name="image" /> --}}
              <div class="col-6">
                <label>Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control"/>
              </div>
              <div class="col-6 form-group">
                <label>Age</label>
                <input type="number" name="age" value="{{ old('age') }}" class="form-control"/>
              </div>
              <div class="col-6 form-group">
                <label>Gender</label>
                <input type="text" name="gender" value="{{ old('gender') }}" class="form-control"/>
              </div>
              <div class="col-6 form-group">
                <label>SportsName</label>
                <input type="text" name="sportsname" value="{{ old('sportsname') }}" class="form-control"/>
              </div>
              <div class="col-6 form-group">
                <label>ContactNo</label>
                <input type="text" name="contactno" value="{{ old('contactno') }}" class="form-control"/>
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
  

  {{-- <div class="modal fade" id="bulkUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
 --}}

  <div class="modal fade" id="editplayer1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{  route('player.update') }}" method="post">
       
        <div class="modal-body">
          @csrf
          <input type="hidden" name="id" id="id"/>
          <form method="post">
            <div class="row">
              {{-- <input type="file" class="form-control" name="image" /> --}}
              <div class="col-6">
                <label>Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control"/>
              </div>
              <div class="col-6 form-group">
                <label>Age</label>
                <input type="number" id="age" name="age" value="{{ old('age') }}" class="form-control"/>
              </div>
              <div class="col-6 form-group">
                <label>Gender</label>
                <input type="text" id="gender" name="gender" value="{{ old('gender') }}" class="form-control"/>
              </div>
              <div class="col-6 form-group">
                <label>SportsName</label>
                <input type="text" id="sportsname" name="sportsname" value="{{ old('sportsname') }}" class="form-control"/>
              </div>
              <div class="col-6 form-group">
                <label>ContactNo</label>
                <input type="text" id="contactno" name="contactno" value="{{ old('contactno') }}" class="form-control"/>
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
        {{-- <a href="{{ route('category.download') }}"
        class="btn btn-success"> Download</a> --}}
        {{--< button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#bulkUpload">
          <i class="fas fa-plus">BulkUpload</i>
        </button> --}}
        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addplayer1">
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
                <th>Name </th>
                <th>Age </th>
                <th>Gender </th>
                <th>SportsName </th>
                <th>Contactno </th>
                
                <th> Actions </th>
            </tr>
            </thead>
            <tbody>
                @foreach($players as $player)
                    <tr>
                        <td> {{$player->name}} </td>
                        <td> {{$player->age}} </td>
                        <td> {{$player->gender}} </td>
                        <td> {{$player->sportsname}} </td>
                        <td> {{$player->contactno}} </td>
                        
                         <td> 
                        
                            <button type="button" class="btn btn-success btn-sm" onclick="edit({{$player}})">
                                <i class="fas fa-edit"></i>
                            </button>    

                            <a href="{{ route('player.delete',[$player->id]) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </a>
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
    $('#name').val(data.name);
    $('#age').val(data.age);
    $('#gender').val(data.gender);
    $('#sportsname').val(data.sportsname);
    $('#contactno').val(data.contactno);
    $('#editplayer1').modal('show');
  }
    </script>
@endsection