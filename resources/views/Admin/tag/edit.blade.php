@extends('Admin.main')
@section('title','Tag Edit| Admin')
@section('content')
@section('page_header','Tag Edit')
<?php $tag=$data['tag'] ?>
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
                                <li ><a href="{{url('admin/tags/'.$tag->id)}}" ><i class="fa fa-info-circle"></i> Detail</a>
                                </li>
                               
                                <li class="active"><a  href="{{url('admin/tags/'.$tag->id.'/edit')}}"><i class="fa fa-pencil"></i>  Edit</a>
                                </li>
                                <li><a  href="{{url('admin/tags/'.$tag->id.'/delete')}}"><i class="fa fa-remove"></i>  Delete</a>
                                </li>
                                
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="edit">
                                    <div class="row">
                                <div class="col-lg-6">
                                    <form method="post" action="{{url('admin/tags/'.$tag->id)}}" role="form">
                                    <input type="hidden" name="_method" value="PATCH">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input value="{{$tag->name}}" name="name" class="form-control">
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="submit" value="Save" class="btn btn-primary">
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