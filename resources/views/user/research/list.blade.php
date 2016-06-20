

@extends('Admin.main')
@section('title','Research | Admin')
@section('content')
@section('page_header','Research List')
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List
                            <a href="{{url('admin/research/create')}}" class="pull-right "><span class=""><i class="fa fa-plus"></i> Add New</span></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
											<th>Company</th>
											<th>sector</th>
											<th>PDF File</th>
                                            <th>Created</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $i)
                                        <tr class="odd gradeX">
                                            <td>{{$i->title}}</td>
                                            <td>{{$i->description}}</td>
											<td>{{$i->company->name}}</td>
											<td>{{$i->sector->name}}</td>
											<td>
												@if($i->pdfFile!="")
												<a target="_blank" href="{{$i->pdfFile}}">Download PDF</a>
												@else
												Not Available
												@endif
												</td>
                                            <td>{{$i->created_at}}</td>
                                            
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
                <!-- /.col-lg-12 -->
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
    </script>
@endsection