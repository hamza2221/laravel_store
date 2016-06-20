@extends('Admin.main')
@section('title','| Admin')
@section('content')
@section('page_header','Product Delete')
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
                                <li ><a href="{{url('admin/products/productImages/'.$product->id)}}"><i class="fa fa-camera"></i>  Image Gallery</a></li>
                                <li><a href="{{url('admin/products/'.$product->id.'/edit')}}"><i class="fa fa-pencil"></i>  Edit</a>
                                </li>
                                <li class="active"><a   href="{{url('admin/products/'.$product->id.'/delete')}}"><i class="fa fa-remove"></i> Delete</a>
                                </li>
                                
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                
                                
                                <div class="tab-pane fade  in active" id="delete">
                                    <h4>Delele Product</h4>
                                    <p>Do you really want to delele {{$product->title}}?</p>
                                    <form method="patch" action="{{url('admin/proucts/'.$product->id)}}">
                                    <button type="submit" class="btn btn-danger "><i class="fa fa-remove"></i> DELETE</button>
                                    <a href="{{url('admin/products/'.$product->id)}}" class="btn btn-default">Cancel</a>
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