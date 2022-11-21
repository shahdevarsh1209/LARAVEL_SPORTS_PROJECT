@extends('admin.layout.main')
@section('title')
    Tournament
@endsection

@section('mainHeading')
Tournament
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Tournament</li>
@endsection

@section('content')
<div class="modal fade" id="addtournament" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('tournament.insert') }}" method="post" enctype="multipart/form-data">
        <div class="modal-body">
        @csrf
          <form method="post">
            <div class="row">
                <div class="col-6">
                  <label>Name</label>
                  <input type="text"  name="playername" value="{{ old('playername') }}" class="form-control"/>
                </div>
                <div class="col-6 form-group">
                  <label>SportsName</label>
                  <input type="text" name="sportsname" value="{{ old('sportsname') }}" class="form-control"/>
                </div>
                <div class="col-6 form-group">
                  <label>DOB</label>
                  <input type="date" name="dob" value="{{ old('dob') }}" class="form-control"/>
                </div>
                <div class="col-6 form-group">
                  <label>Department</label>
                  <input type="text"  name="department" value="{{ old('department') }}" class="form-control"/>
                </div>
                <div class="col-6 form-group">
                  <label>Achivement</label>
                  <input type="text" name="achivement" value="{{ old('achivement') }}" class="form-control"/>
                </div>
            </div>
            
        </div>
        <div class="modal-footer">
          
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
    </div>
  </div>
  

  <div class="modal fade" id="edittournament" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('tournament.update') }}" method="post">
        <div class="modal-body">
          @csrf
          <input type="hidden" name="id" id="id" />
          
            <div class="row">
              <div class="col-6">
                <label>Name</label>
                <input type="text" id="playername" name="playername" value="{{ old('playername') }}" class="form-control"/>
              </div>
              <div class="col-6 form-group">
                <label>SportsName</label>
                <input type="text" id="sportsname" name="sportsname" value="{{ old('sportsname') }}" class="form-control"/>
              </div>
              <div class="col-6 form-group">
                <label>DOB</label>
                <input type="date" id="dob" name="dob" value="{{ old('dob') }}" class="form-control"/>
              </div>
              <div class="col-6 form-group">
                <label>Department</label>
                <input type="text" id="department" name="department" value="{{ old('department') }}" class="form-control"/>
              </div>
              <div class="col-6 form-group">
                <label>Achivement</label>
                <input type="text" id="achivement" name="achivement" value="{{ old('achivement') }}" class="form-control"/>
              </div>
            </div>
         
        </div>
        <div class="modal-footer">
          
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </form>
    </div>
  </div>
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">tournament</h3>
      <div class="card-tools">
       
        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addtournament">
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
                <th>PlayerName</th>
                <th>SportsName </th>
                <th>DOB</th>
                <th>Department</th>
                <th>Achivement</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($tournament as $tournament)
                    <tr>
                        <td> {{$tournament->playername}} </td>
                        <td> {{$tournament->sportsname}} </td>
                        <td> {{$tournament->dob}} </td>
                        <td> {{$tournament->department}} </td>
                        <td> {{$tournament->achivement}} </td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm" onclick="edit({{$tournament}})" >
                                <i class="fas fa-edit" ></i>
                            </button>    

                            <a href="{{ route('tournament.delete',[$tournament->id]) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </a>
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
$("#playername").val(data.playername);
$("#sportsname").val(data.sportsname);
$("#dob").val(data.dob);
$("#department").val(data.department);
$("#achivement").val(data.achivement);

$("#edittournament").modal('show');
}  
  </script>
@endsection