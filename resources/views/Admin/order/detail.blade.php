@extends('Admin.main')
@section('title','| Admin')
@section('content')
@section('page_header','Category Detail')
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
                    <li class="active"><a href="{{url('admin/categories/'.$category->id)}}" ><i class="fa fa-info-circle"></i> Detail</a>
                    </li>
                    <li><a href="{{url('admin/categories/'.$category->id.'/edit')}}"><i class="fa fa-pencil"></i>  Edit</a>
                    </li>
                    <li><a href="{{url('admin/categories/'.$category->id.'/delete')}}"><i class="fa fa-remove"></i>  Delete</a>
                    </li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="home">
                        <div class="page-header">
                            <h4>{{$category->name}}</h4>
                        </div>
                        <div class="col-md-8"><dd>
                            <dt>
                            <span class="label label-info">Prent Category</span>
                            <div class="well"><a href="{{url('admin/categories/'.$category->parent_id)}}">{{$category->parent_id}}</a></div>
                            </dt>
                            <dt>
                            <span class="label label-info">Product(s) Count</span>
                            <div class="well">{{count($category->inProduct)}}</div>
                            </dt>

                            <dt>
                            <span class="label label-info">Sort Order</span>
                            <div class="well">{{$category->sort_order}}</div>
                            </dt>
                            <dt>
                            <span class="label label-info">Child Categories</span>
                            <div class="well">

                                @if($category->childCategory !=null)
                                <ul>
                                    @foreach($category->childCategory as $i)
                                    <li><a href="{{url('admin/categories/'.$i->id)}}">{{$i->name}}</a></li>
                                    @endforeach
                                </ul>
                                @else

                                @endif
                            </div>
                            </dt>
                            </dd>
                        </div>
                        <div class="col-md-4">
                            <img height="120px" width="120px" src="{{url('public').'/'.$category->picture}}" />
                            <hr>
                            <form id="myDropzone" method="post" action="{{url('admin/categories/imageChange').'/'.$category->id}}" class="dropzone">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
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

    @section('custom_scripts')

    <link rel="stylesheet" type="text/css" href="{{url('resources/assets/dropzone-master/dist/dropzone.css')}}">
    <script type="text/javascript" src="{{url('resources/assets/dropzone-master/dist/dropzone.js')}}"></script>
    <script type="text/javascript">
Dropzone.options.myDropzone = {
    paramName: "file",
    acceptedFiles: "image/*",
    maxFilesize: 2,
    addRemoveLinks: true,
    maxFiles: 1,
    autoProcessQueue: true,
    clickable: true,
    dictDefaultMessage: "Upload or drag Category image",
    maxfilesexceeded: function (file) {
        alert("no more files");
    },
    success: function (file, response) {
        location.reload();
        $("#cat_image").val(response);
    },
    init: function () {
        myDropzone = this;
        $("#addFiles").click(function () {
            myDropzone.processQueue();

        });
        myDropzone.on("addedfile", function (file) {
            if (!file.type.match(/image.*/)) {
                if (file.type.match(/application.zip/)) {
                    myDropzone.emit("thumbnail", file, "./public");
                } else {
                    myDropzone.emit("thumbnail", file, "./public");
                }
            }
        });
    }


}
function startUpload() {
    myDropzone.processQueue();
}
    </script>
    @endsection