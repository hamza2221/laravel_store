@extends('Admin.main')
@section('title','| Admin')
@section('content')
@section('page_header','Category Delete')
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
                                <li><a href="{{url('admin/categories/'.$category->id.'/edit')}}"><i class="fa fa-pencil"></i>  Edit</a>
                                </li>
                                <li class="active"><a   href="{{url('admin/categories/'.$category->id.'/delete')}}"><i class="fa fa-remove"></i> Delete</a>
                                </li>
                                
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                
                                
                                <div class="tab-pane fade  in active" id="delete">
                                    <h4>Delele Category</h4>
                                    <p>Do you really want to delele <i>{{$category->name}} </i>? </p>
                                    @if(count($category->inProduct))

                                        <p>It is being used in followig products, to delete this category first remove all related products</p>
                                                <ul>
                                                @foreach($category->inProduct as $i)
                                                    <li><a href="{{url('admin/products/'.$i->id)}}">{{$i->title}}</a></li>
                                                @endforeach
                                               </ul>
                                    @else
                                                       
                                             
                                    <form method="POST" action="{{url('admin/categories/'.$category->id)}}">
                                    <input type="hidden" name="_method" value="Delete">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" id="delete" class="btn btn-danger "><i class="fa fa-remove"></i> DELETE</button>
                                    <a href="{{url('admin/categories/'.$category->id)}}" class="btn btn-default">Cancel</a>
                                    </form>
                                    @endif
                                </div>
                                
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
@endsection