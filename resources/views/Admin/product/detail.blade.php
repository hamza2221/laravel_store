@extends('Admin.main')
@section('title','Product Detail | Admin')
@section('content')
@section('page_header','Product Detail')
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
                                <li class="active"><a href="{{url('admin/products/'.$product->id)}}" ><i class="fa fa-info-circle"></i> Detail</a>
                                </li>
                                <li ><a href="{{url('admin/products/productImages/'.$product->id)}}"><i class="fa fa-camera"></i>  Image Gallery</a></li>
                                <li><a href="{{url('admin/products/'.$product->id.'/edit')}}"><i class="fa fa-pencil"></i>  Edit</a>
                                </li>
                                <li><a href="{{url('admin/products/'.$product->id.'/attributes')}}"><i class="fa fa-pencil"></i>  Product Attributes</a>
                                </li>
                                
                                <li><a href="{{url('admin/products/'.$product->id.'/delete')}}"><i class="fa fa-remove"></i>  Delete</a>
                                </li>
                                
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <div class="page-header">
                                        <h4>{{$product->title}}</h4>
                                    </div>
                                    <dd>
                                        <dt>
                                            <span class="label label-info">Category</span>
                                            <div class="well">{{$product->productCategory->name}}</div>
                                        </dt>
                                        <dt>
                                            <span class="label label-info">User</span>
                                            <div class="well">{{$product->user_id}}</div>
                                        </dt>
                                        <dt>
                                            <span class="label label-info">Price</span>
                                            <div class="well">{{$product->price}}</div>
                                        </dt>
                                        <dt>
                                            <span class="label label-info">SKU</span>
                                            <div class="well">{{$product->sku}}</div>
                                        </dt>
                                        <dt>
                                            <span class="label label-info">Quantity Available</span>
                                            <div class="well">{{$product->quantity_avaiable}}</div>
                                        </dt>
                                        <dt>
                                            <span class="label label-info">Status</span>
                                            <div class="well">{{$product->status}}</div>
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