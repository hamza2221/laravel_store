@extends('Admin.main')
@section('title','Add Product Images | Admin')
@section('content')
@section('page_header','Add Product Images')
<div class="row">
    <div class="panel-body">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Add Product Images</h4>
                        <p>First added image will be primary image of product, however you can change it later</p>
                    </div>
                    <div class="modal-body">
                            <form id="myDropzone" method="post" action="{{url('admin/products/uploadImages')}}" class="dropzone">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="productId" value="{{ $id }}">
                                <button class="btn btn-success" id="addFiles" type="button">Start Upload</button>
                            </form>    
                        
                    </div>
                    <div class="modal-footer">
                        <a href="{{ url('').'/admin/products/productImages/'.$id }}"><button type="button" class="btn btn-default" >Close</button></a>
                        <a href="{{ url('').'/admin/products/productImages/'.$id }}"><button type="button" class="btn btn-primary">Save changes</button></a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
</div>
@endsection


@section('custom_scripts')

<link rel="stylesheet" type="text/css" href="{{url('resources/assets/dropzone-master/dist/dropzone.css')}}">
<script type="text/javascript" src="{{url('resources/assets/dropzone-master/dist/dropzone.js')}}"></script>
<script type="text/javascript">
Dropzone.options.myDropzone = {
    paramName: "file",
    acceptedFiles: "image/*",
    addRemoveLinks: true,
    maxFiles: 5,
    autoProcessQueue: false,
    clickable: true,
    uploadMultiple: true,
    parallelUploads: 10,
    dictDefaultMessage: "Upload or drag Category image",
    maxfilesexceeded: function (file) {
        alert("no more files");
    },
    success: function (file, response) {
        //console.log(file);
        //console.log(response);
        window.location.href = response;
        //$("#cat_image").val(response);
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
$("#myModal").modal({show:true, backdrop: 'static'});
</script>
@endsection