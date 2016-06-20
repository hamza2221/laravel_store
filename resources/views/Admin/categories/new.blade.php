@extends('Admin.main')
@section('title','New Category | Admin')
@section('content')
@section('page_header','New Category')
<div class="row">
                                <div class="col-lg-6">
                                <form id="myDropzone" method="post" action="{{url('admin/categories/imageUpload')}}" class="dropzone">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button class="btn btn-success" id="addFiles" type="button">Start Upload</button>
                                </form>
                                    <form method="post" action="{{url('admin/categories')}}" role="form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input name="name" class="form-control">
                                            <input type="hidden" name="picture" value="no_image.gif" id="cat_image" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Parent Category</label>
                                            <select name="parent_id" class="form-control" name="category_id">
                                            <option value="">--None--</option>
                                            @foreach($categories as $i)
                                            	<option value="{{$i->id}}">{{$i->name}}</option>
                                            @endforeach
                                            </select >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Sort Order</label >
                                            <input type="text" name="sort_order" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            
	
@endsection

@section('custom_scripts')

<link rel="stylesheet" type="text/css" href="{{url('resources/assets/dropzone-master/dist/dropzone.css')}}">
<script type="text/javascript" src="{{url('resources/assets/dropzone-master/dist/dropzone.js')}}"></script>
<script type="text/javascript">
Dropzone.options.myDropzone={
    paramName: "file",
    acceptedFiles:"image/*",
    maxFilesize:2,
    addRemoveLinks:true,
    maxFiles:1,
    autoProcessQueue:false,
    clickable:true,
    dictDefaultMessage:"Upload or drag Category image",
    maxfilesexceeded:function(file){
        alert("no more files");
    },

    success: function (file,response){
    console.log(file);
    console.log(response);
    $("#cat_image").val(response);
    },
     init: function() {
         myDropzone = this;
        $("#addFiles").click(function(){
            myDropzone.processQueue(); 
            
    });
      myDropzone.on("addedfile", function(file) {
            if (!file.type.match(/image.*/)) {
                if(file.type.match(/application.zip/)){
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