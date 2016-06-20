@extends('Admin.main')
@section('title','| Admin')
@section('content')
@section('page_header','Product Edit')
<?php $product=$data['product'] ?>
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
                                <li ><a href="{{url('admin/products/'.$product->id)}}" ><i class="fa fa-info-circle"></i> Detail</a>
                                </li>
                                <li><a href="{{url('admin/products/productImages/'.$product->id)}}"><i class="fa fa-camera"></i>  Image Gallery</a></li>
                                <li class="active"><a  href="{{url('admin/products/'.$product->id.'/edit')}}"><i class="fa fa-pencil"></i>  Edit</a>
                                </li>
                                <li><a  href="{{url('admin/products/'.$product->id.'/delete')}}"><i class="fa fa-remove"></i>  Delete</a>
                                </li>
                                
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="edit">
                                    <div class="row">
                                <div class="col-lg-6">
                                    <form method="post" action="{{url('admin/products/'.$product->id)}}" role="form">
                                    <input type="hidden" name="_method" value="PATCH">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input value="{{$product->title}}" name="title" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input value="{{$product->price}}" name="price" class="form-control">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control" rows="3">{{$product->description}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>User</label>
                                            <select class="form-control" name="user_id">
                                                <option></option>
                                            </select >
                                        </div>

                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="parent_id">
                                                @foreach($data['categories'] as $i)
                                                    <option value="{{$i->id}}">{{$i->name}}</option>
                                                @endforeach
                                            </select >
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select  class="form-control" name="status">
                                                <option>Enable</option>
                                                <option>Disable</option>
                                            </select>
                                            
                                        </div>
                                         <div class="form-group">
                                            <label>Quantity Available</label >
                                            <input value="{{$i->quantity_available}}" type="text" name="quantity_available" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Sort Order</label >
                                            <input value="{{$product->sort_order}}" type="text" name="sort_order" class="form-control">
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