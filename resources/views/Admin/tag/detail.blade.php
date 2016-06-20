@extends('Admin.main')
@section('title','Tag Detail | Admin')
@section('content')
@section('page_header','Tag Detail')
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
                                <li class="active"><a href="{{url('admin/tags/'.$tag->id)}}" ><i class="fa fa-info-circle"></i> Detail</a>
                                </li>
                               <li><a href="{{url('admin/tags/'.$tag->id.'/edit')}}"><i class="fa fa-pencil"></i>  Edit</a>
                                </li>
                                <li><a href="{{url('admin/tags/'.$tag->id.'/delete')}}"><i class="fa fa-remove"></i>  Delete</a>
                                </li>
                                
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <div class="page-header">
                                        <h4>{{$tag->name}}</h4>
                                    </div>
                                    <dd>
                                        <dt>
                                            <span class="label label-info">Product Count</span>
                                            <div class="well">5</div>
                                        </dt>
                                        
                                        


                                    </dd>
                                    
                                </div>
                                
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
@endsection