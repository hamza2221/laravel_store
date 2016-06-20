

@extends('Admin.main')
@section('title','Users | Admin')
@section('content')
@section('page_header','Users List')
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List
                            <a href="{{url('admin/user/create')}}" class="pull-right "><span class=""><i class="fa fa-plus"></i> Add New</span></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
											<th>Role</th>
                                            <th>Created</th>
                                            <th>...</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $i)
                                        <tr class="odd gradeX">
                                            <td>{{$i->name}}</td>
                                            <td>{{$i->email}}</td>
											<td>{{$i->role}}</td>
                                            <td>{{$i->created_at}}</td>
                                            <td>

                                            	<a href='{{url("admin/user/$i->id")}}' class="btn btn-primary fa fa-info-circle"></a>
                                            	<a href='{{url("admin/user/$i->id/delete")}}' class="btn btn-danger fa fa-remove"></a>
                                            	<a href='{{url("admin/user/$i->id/edit")}}' class="btn btn-info fa fa-pencil"></a>
                                            </td>
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