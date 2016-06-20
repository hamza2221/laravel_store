@extends('Admin.main')
@section('title',"Edit $user->role | Admin")
@section('content')
@section('page_header',"Edit $user->role")

<div class="row">
    <div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                Modification Options
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li ><a href="{{url('admin/user/'.$user->id)}}" ><i class="fa fa-info-circle"></i> Detail</a>
                    </li>
                    <li class="active"><a  href="{{url('admin/user/'.$user->id.'/edit')}}"><i class="fa fa-pencil"></i>  Edit</a>
                    </li>
                    <li><a  href="{{url('admin/user/'.$user->id.'/delete')}}"><i class="fa fa-remove"></i>  Delete</a>
                    </li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="edit">
                        <div class="row">
                            <div class="col-lg-6">
                                <form method="post" action="{{url('admin/user/'.$user->id)}}" role="form">
                                    <input type="hidden" name="_method" value="PATCH">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label class="control-label">Name</label>

                                        <input type="text" class="form-control" name="name" value="{{ $user->name}}">

                                        @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label class=" control-label">E-Mail Address</label>

                                        <input type="email" class="form-control" readonly="" name="email" value="{{ $user->email}}">

                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label class=" control-label">Password</label>

                                        <input type="password" class="form-control" name="password">

                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <label class=" control-label">Confirm Password</label>


                                        <input type="password" class="form-control" name="password_confirmation">

                                        @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <label class="control-label">Role</label>

                                        <select id="role" class="form-control" name="role" >
                                            <option @if($user->role=="Admin") selected @endif value="Admin">Admin</option>
                                            <option @if($user->role=="User") selected @endif value="User">User</option>
                                        </select>
                                    </div>
                                    <div  @if($user->role !="User") hidden="" @endif  id="userPrefrences">
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
                                    </div>              
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn"></i>Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    @endsection

    @section('custom_scripts')
    <script type="text/javascript">
        $("#role").change(function () {

            if ($("#role :selected").text() == "User") {
                $("#userPrefrences").fadeIn();
            } else {
                $("#userPrefrences").fadeOut();
            }
        });
    </script>
    @endsection