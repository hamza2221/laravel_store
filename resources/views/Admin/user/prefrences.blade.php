

@extends('Admin.main')
@section('title','My Prefrences | Admin')
@section('content')
@section('page_header','My Prefrences')
<div class="row">
                <div class="col-lg-12">
                    <form  role="form" method="POST" action="{{ url('/admin/myPrefrences') }}">
                        {!! csrf_field() !!}
						<input type="hidden" name="id" value="{{$user->id}}"  />
                        <div class="form-group">
                            <label >                     
                                <input type="checkbox" value="1" name="company_update" @if($user->company_update==true) checked @endif >
						Company Update</label>  
                        </div>
						<div class="form-group">
                            <label >                     
                                <input type="checkbox" value="1" name="weekly_update" @if($user->weekly_update==true) checked @endif >
						Weekly Update</label>  
                        </div>
						<div class="form-group">
                            <label >                     
                                <input type="checkbox" value="1" name="calender_update" @if($user->calender_update==true) checked @endif >
						Calender Update</label>  
                        </div>
						<div class="form-group">
                            <label >                     
                                <input type="checkbox" value="1" name="sector_update" @if($user->sector_update==true) checked @endif >
						Sector Update</label>  
                        </div>

                        

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                    Save
                            </button>
                        </div>
                    </form>
					</div>
                <!-- /.col-lg-12 -->
            </div>
					<div class="col-lg-12">
                    
                        <h1 class="page-header">Change My Password</h1>
                    </div>
					<div class="row">
                <div class="col-lg-5">
					<form  role="form" method="POST" action="{{ url('/admin/changePassword') }}">
                        {!! csrf_field() !!}
						<div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                            <label >Old Password</label>

                            
                                <input type="password" class="form-control" name="old_password">

                                @if ($errors->has('old_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
						
						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label >Password</label>

                            
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label >Confirm Password</label>

                            
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                           
                        </div>
						<div class="form-group">
                            <button type="submit" class="btn btn-warning">
                                    Change
                            </button>
                        </div>
						
                    </form>
                </div>
                <!-- /.col-lg-12 -->
            </div>
	
@endsection


@section('custom_scripts')
<!-- DataTables JavaScript -->
    <script src="{{url('')}}/resources/assets/admin/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="{{url('')}}/resources/assets/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
@endsection