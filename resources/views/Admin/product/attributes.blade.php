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
                    <li ><a href="{{url('admin/products/'.$product->id)}}" ><i class="fa fa-info-circle"></i> Detail</a>
                    </li>
                    <li ><a href="{{url('admin/products/productImages/'.$product->id)}}"><i class="fa fa-camera"></i>  Image Gallery</a></li>
                    <li><a href="{{url('admin/products/'.$product->id.'/edit')}}"><i class="fa fa-pencil"></i>  Edit</a>
                    </li>
                    <li class="active"><a href="{{url('admin/products/'.$product->id.'/attributes')}}"><i class="fa fa-pencil"></i>  Product Attributes</a>
                    </li>
                    <li><a href="{{url('admin/products/'.$product->id.'/delete')}}"><i class="fa fa-remove"></i>  Delete</a>
                    </li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="home">
                        <div class="page-header">
                            <h4>{{$product->title}}</h4>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal" >Add Product Attribute </button>
                        </div>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Values</th>
                                    <th>
                                        ...
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ProductAttribues as $i)
                                <tr>
                                    <td>{{$i->name}}</td>
                                    <td>{{$i->values}}</td>
                                    <td>
                                        <a onclick="return confirm('Are you sure to delete this attribue?')" href="{{url('/admin/products/deleteAttributes/'.$i->id.'/'.$i->product_id)}}" >Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add Attribute</h4>
                </div>
                <div class="modal-body">
                    <form id="attributesForm" method="post" action="{{url('admin/products/'.$product->id.'/attributes')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="productId" value="{{ $product->id }}">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" >
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="values"></textarea>
                            <p>Each value must be seprated with comma(,)</p>
                        </div>
                        <button class="btn btn-success"  type="submit">Save</button>
                    </form>    

                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @endsection