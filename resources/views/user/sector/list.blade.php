

@extends('Admin.main')
@section('title','Sectors')
@section('content')
@section('page_header','Sector List')
<div class="row">


    <!-- /.col-lg-12 -->


    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                List
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Name </th>
                                <th>Created at </th>
                                <td>...</td>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $i)
                            <tr class="odd gradeX">
                                <td width="70%"><a href="javascript:void(0)" onClick="getDetail({{$i->id}})" >{{$i->name}}</a></td>
                                <td width="25%">{{$i->created_at}}</td>
                                <td width="5%"><button onclick="getDetail({{$i->id}})" type="button" class="btn btn-primary fa fa-info-circle" ></button></td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>


</div>
<div id="myModal" class="modal fade " role="dialog">
    <div class="modal-dialog  modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 id="name" class="modal-title">Details of Sector</h3>
                <small>Reseaches in this sector</small>
            </div>
            <div class="modal-body">
                <table id="researchesList" class="table table-striped" >
                    <thead>
                        <tr>
                            <th>Name </th>
                            <th>Description</th>
                            <th>PDF File</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
@endsection


@section('custom_scripts')
<!-- DataTables JavaScript -->
<script src="{{url('')}}/resources/assets/admin/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="{{url('')}}/resources/assets/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
                                            $(document).ready(function() {
                                    $('#dataTables-example').DataTable({
                                    responsive: true
                                    });
                                    });
                                            function getDetail (id){
                                            $('#researchesList tbody').html('');
                                                    $('#myModal').modal('show');
                                                    $("#showDetails").fadeOut();
                                                    $("#showDetails").fadeIn();
                                                    $.ajax({
                                                    type: 'get',
                                                            url: './sector/ajaxDetails/' + id,
                                                            dataType: "json",
                                                            cache: false,
                                                            contentType: false,
                                                            processData: false,
                                                            success: function (data) {

                                                            console.log(data.sector);
                                                                    $("#name").html(data.sector);
                                                                    var list = '<h4><ul>';
                                                                    var text_download = "Not Available";
                                                                    var url_download = "javascript:void(0)";
                                                                    if (data.researches.length > 0){
                                                            for (var i = 0; i < data.researches.length; i++){
                                                            if (data.researches[i].pdfFile != ""){
                                                            text_download = "Download PDF";
                                                                    url_download = data.researches[i].pdfFile;
                                                            }
                                                            list += '<li>' + data.researches[i].title + '</li>';
                                                                    $('#researchesList tbody').append('<tr><td>' + data.researches[i].title + '</td>\n\
                                                                <td>' + data.researches[i].description + '</td>\n\\n\
                                                                    <td><a target="_blank" href="' + url_download + '">' + text_download + '</a></td>\n\
                                                                </tr>');
                                                            }
                                                            }
                                                            else{
                                                            alert("No reasearch is related to this sector");
                                                                    $('#myModal').modal('hide');
                                                            }
                                                            list += '</ul></h4>';
                                                            },
                                                            error: function (data) {
                                                            alert("errors: try again");
                                                                    console.log(data);
                                                            }

                                                    });
                                            }

</script>
@endsection