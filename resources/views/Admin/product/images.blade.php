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
                    <li class=""><a href="{{url('admin/products/'.$product->id)}}" ><i class="fa fa-info-circle"></i> Detail</a>
                    </li>
                    <li class="active"><a href="{{url('admin/products/productImages/'.$product->id)}}"><i class="fa fa-camera"></i>  Image Gallery</a></li>
                    <li><a href="{{url('admin/products/'.$product->id.'/edit')}}"><i class="fa fa-pencil"></i>  Edit</a>
                    </li>
                    <li><a href="{{url('admin/products/'.$product->id.'/delete')}}"><i class="fa fa-remove"></i>  Delete</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="page-header">
                    <h4>{{$product->title}}</h4>
                    <a class=" btn btn-success" href='{{url("admin/products/uploadImages/$product->id")}}'>Add More Images</a>
                </div>

                @foreach($product->productImages as $i)
                <div class="col-md-3 col-md-offset-1">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="home">
                            <dd>
                            <dt>
                            <span class="label label-info">{{$i->name}}</span>
                            <a onclick="return confirm('Are you really want to delete this image?')" href="{{url('').'/admin/products/'.$i->id.'/'.$i->product_id.'/deleteImage'}}" class="label label-danger pull-right"><i class="fa fa-remove"></i> Delete</a>
                            <div class="well">
                                @if($i->is_primary==false)
                                <a data-toggle="tooltip" data-placement="right" title="Set as primary image" class="pull-right" href="{{url('').'/admin/products/'.$i->id.'/'.$i->product_id.'/makePrimaryImage'}}" class=""><i  class=" fa fa-star-o fa-2x"></i></a>
                                @else
                                <span class="pull-right" data-toggle="tooltip" data-placement="right" title="It is primary image"><i class="fa fa-star fa-2x" style="color: #FFC107;"></i></span>
                                @endif
                                <a href="{{$i->path}}" target="_blank" data-toggle="tooltip" data-placement="top" title="View image">
                                    <img class="img img-thumbnail" height="125px" width="125px" src="{{$i->path_medium}}" ></a></div>
                            </dt>

                            </dd>

                        </div>

                    </div>
                </div>
                @endforeach

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    @endsection
    @section('custom_scripts')
    <link rel="stylesheet" href="{{url('/resources/assets/jquery.bxslider/jquery.bxslider.css')}}" />
    <script src="{{url('/resources/assets/jquery.bxslider/jquery.bxslider.js')}}"></script>
    <script>
                                $(function () {
                                    $('[data-toggle="tooltip"]').tooltip()
                                })
                                $('.bxslider').bxSlider({
                                    mode: 'fade',
                                    captions: true
                                });
    </script>
    @endsection