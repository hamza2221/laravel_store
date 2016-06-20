

@extends('Admin.main')
@section('title','Company | User Panel')
@section('content')
@section('page_header','Company List')
<div class="row">
    <div class="col-lg-12">


        <div class="dataTable_wrapper">
            <table class="table table-striped table-responsive table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Short Name</th>
                        <th>Ticket No.</th>
                        <th>Disclaimer</th>
                        <th>Address</th>
                        <th>...</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $i)
                    <tr class="odd gradeX">
                        <td><a href="javascript:void(0)" onClick="getDetail({{$i->id}})">{{$i->name}}</a></td>
                        <td>{{$i->shortName}}</td>
                        <td>{{$i->ticketNo}}</td>
                        <td>{{$i->disclaimer}}</td>
                        <td>{{$i->address}}</td>
                        <td><a href="javesecript:void(0)" onClick="getDetail({{$i->id}})" class="btn btn-primary fa fa-info-circle"></a></td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->

    </div>

    <!-- /.col-lg-12 -->
</div>
<div id="myModal" class="modal fade " role="dialog">
    <div class="modal-dialog  modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 id="name" class="modal-title">Details of Sector</h3>
                <small>Reseaches in this company</small>
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
                                    $("#showDetails").fadeOut();
                                            $("#showDetails").fadeIn();
                                            $('#researchesList tbody').html('');
                                            $.ajax({
                                            type: 'get',
                                                    url: './company/ajaxDetails/' + id,
                                                    dataType: "JSON",
                                                    cache: false,
                                                    contentType: false,
                                                    processData: false,
                                                    success: function (data) {
                                                    $("#name").html(data.company.name);
                                                            $('#myModal').modal('show');
                                                            $("#disclaimer").html(data.company.disclaimer);
                                                            $("#address").html(data.company.address);
                                                            $("#ticketNo").html(data.company.ticketNo);
                                                            $("#sector").html(data.company.sector);
                                                            $("#created_at").html(data.company.created_at);
                                                            var list = '<h3><ul>';
                                                            if (data.researches.length > 0){
                                                    var text_download = "Not Available";
                                                            var url_download = "javascript:void(0)";
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
                                                    }}
                                                    else{
                                                    alert("No reasearch is related to this company");
                                                            $('#myModal').modal('hide');
                                                    }
                                                    list += '</ul></h3>';
//                                                            $("#researches").html(list);
                                                    },
                                                    error: function (data) {
                                                    alert("errors: try again");
                                                            console.log(data);
                                                    }

                                            });
                                    }
</script>

@endsection