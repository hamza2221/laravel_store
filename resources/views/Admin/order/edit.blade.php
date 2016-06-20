@extends('Admin.main')
@section('title','Category Edit | Admin')
@section('content')
@section('page_header','Category Edit')
<?php $category=$data['category']; ?>
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
                                <li ><a href="{{url('admin/categories/'.$category->id)}}" ><i class="fa fa-info-circle"></i> Detail</a>
                                </li>
                                <li class="active"><a  href="{{url('admin/categories/'.$category->id.'/edit')}}"><i class="fa fa-pencil"></i>  Edit</a>
                                </li>
                                <li><a  href="{{url('admin/categories/'.$category->id.'/delete')}}"><i class="fa fa-remove"></i>  Delete</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="edit">
                                    <div class="row">
                                <div class="col-lg-6">
                                    <form method="post" action="{{url('admin/categories/'.$category->id)}}" role="form">
                                    <input type="hidden" name="_method" value="PATCH">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input value="{{$category->name}}" name="name" class="form-control">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Parent Category</label>
                                            <select class="form-control" name="parent_id">
                                            <option value="">--None--</option>
                                                @foreach($data['categories'] as $i)
                                                    <option value="{{$i->ID}}">{{$i->name}}</option>
                                                @endforeach
                                            </select >
                                        </div>
                                        <div class="form-group">
                                            <label>Sort Order</label >
                                            <input value="{{$category->sort_order}}" type="text" name="sort_order" class="form-control">
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