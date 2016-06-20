@extends('Admin.main')
@section('title',"$user->role Detail | Admin")
@section('content')
@section('page_header',"$user->role Detail")
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
                    <li class="active"><a href="{{url('admin/uesr/'.$user->id)}}" ><i class="fa fa-info-circle"></i> Detail</a>
                    </li>

                    <li><a href="{{url('admin/user/'.$user->id.'/edit')}}"><i class="fa fa-pencil"></i>  Edit</a>
                    </li>
                    <li><a href="{{url('admin/user/'.$user->id.'/delete')}}"><i class="fa fa-remove"></i>  Delete</a>
                    </li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="home">
                        <div class="page-header">
                            <h4>{{$user->name}}</h4>
                        </div>
                        <dd>

                        <dt>
                        <span class="label label-info">Role</span>
                        <div class="well">{{$user->role}}</div>
                        </dt>
                        <dt>
                        <span class="label label-info">Email</span>
                        <div class="well">{{$user->email}}</div>
                        </dt>

                        <dt>
                        <span class="label label-info">Created Date</span>
                        <div class="well">{{$user->created_at}}</div>
                        </dt>
                        <div @if($user->role !="User") hidden="" @endif>
                              <dt>
                            <span class="label label-info">Company Email Updates</span>
                            <div class="well">@if($user->company_update=="1") On @else  Off @endif</div>
                            </dt>
                            <dt>
                            <span class="label label-info">Calender Email Updates</span>
                            <div class="well">@if($user->calender_update=="1") On @else  Off @endif</div>
                            </dt>
                            <dt>
                            <span class="label label-info">Sector Email Updates</span>
                            <div class="well">@if($user->sector_update=="1") On @else  Off @endif</div>
                            </dt>
                            <dt>
                            <span class="label label-info">Weekly Email Updates</span>
                            <div class="well">@if($user->weekly_update=="1") On @else  Off @endif</div>
                            </dt>
                        </div>




                        </dd>

                    </div>

                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    @endsection