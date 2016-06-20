@extends('Admin.main')
@section('title','| Admin')
@section('content')
@section('page_header','Tag Delete')
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
                               
                                <li><a href="{{url('admin/tags/'.$tag->id.'/edit')}}"><i class="fa fa-pencil"></i>  Edit</a>
                                </li>
                                <li class="active"><a   href="{{url('admin/tags/'.$tag->id.'/delete')}}"><i class="fa fa-remove"></i> Delete</a>
                                </li>
                                
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                
                                
                                <div class="tab-pane fade  in active" id="delete">
                                    <h4>Delele Tag</h4>
                                    <p>Do you really want to delele {{$tag->name}}?</p>
                                    <form method="post" action="{{url('admin/tags/'.$tag->id)}}">
                                        <input type="hidden" name="_method" value="Delete">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-danger "><i class="fa fa-remove"></i> DELETE</button>
                                        <a href="{{url('admin/tags/'.$tag->id)}}" class="btn btn-default">Cancel</a>
                                    </form>
                                </div>
                                
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
@endsection