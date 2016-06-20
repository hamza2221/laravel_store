@extends('Admin.main')
@section('title','Research Detail | Admin')
@section('content')
@section('page_header','Research Detail')
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
                                <li class="active"><a href="{{url('admin/research/'.$research->id)}}" ><i class="fa fa-info-circle"></i> Detail</a>
                                </li>
                                
                                <li><a href="{{url('admin/research/'.$research->id.'/edit')}}"><i class="fa fa-pencil"></i>  Edit</a>
                                </li>
                                <li><a href="{{url('admin/research/'.$research->id.'/delete')}}"><i class="fa fa-remove"></i>  Delete</a>
                                </li>
                                
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <div class="page-header">
                                        <h4>{{$research->name}}</h4>
                                    </div>
                                    <dd>
                                        
                                       <dt>
                                            <span class="label label-info">Description</span>
                                            <div class="well">{{$research->description}}</div>
                                        </dt>
                                        <dt>
                                            <span class="label label-info">Company</span>
                                            <div class="well">{{$research->companyId}}</div>
                                        </dt>
                                        <dt>
                                            <span class="label label-info">Sector</span>
                                            <div class="well">{{$research->sectorId}}</div>
                                        </dt>
                                       
                                        <dt>
                                            <span class="label label-info">PDF File</span>
                                            <div class="well">
                                                @if($research->pdfFile!="")
                                                <a target="_blank" href="{{$research->pdfFile}}">Download</a>
                                                @else
                                                <p>Not Available</p>
                                                @endif
                                            </div>
                                        </dt>
                                        <dt>
                                            <span class="label label-info">Created Date</span>
                                            <div class="well">{{$research->created_at}}</div>
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