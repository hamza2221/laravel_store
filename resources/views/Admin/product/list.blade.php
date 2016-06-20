

@extends('Admin.main')
@section('title','Product | Admin')
@section('content')
@section('page_header','Product List')
<div class="row">
    <div class="col-lg-12">
        <div class="well">
            <a href="{{url('admin/products/create')}}" class="btn btn-success">
                <i class="fa fa-plus"></i> Add New
            </a>
            <button class="btn btn-danger" onClick="bulk_delete()"><i class="fa fa-remove"></i> Delete Selected</button>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                List

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <form id="form_bulk_delete" method="post" action="{{url("admin/products/bulk_delete")}}">

                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th width="5%"><input onClick="toggle(this)"  type="checkbox" /></th>
                                    <th width="22%">Title</th>
                                    <th width="15%">Category</th>
                                    <th width="10%">Price</th>
                                    <th width="11%">...</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $i)
                                <tr class="odd gradeX">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <th ><input name="id[]" value="{{$i->id}}" type="checkbox" /></th>

                            <td>{{$i->title}}</td>
                            <td>{{$i->productCategory->name}}</td>
                            <td>{{$i->price}}</td>
                            <td>

                                <a href='{{url("admin/products/$i->id")}}' class="btn btn-primary fa fa-info-circle"></a>
                                <a href='{{url("admin/products/productImages/$i->id")}}' class="btn  btn-success fa fa-photo"></a>
                                <a href='{{url("admin/products/$i->id/delete")}}' class="btn btn-danger fa fa-remove"></a>
                                <a href='{{url("admin/products/$i->id/edit")}}' class="btn btn-info fa fa-pencil"></a>
                            </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </form>
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
                                        $(document).ready(function () {
                                            $('#dataTables-example').DataTable({
                                                responsive: true
                                            });

                                        });
                                        function toggle(source) {
                                            checkboxes = document.getElementsByName('id[]');
                                            for (var i = 0, n = checkboxes.length; i < n; i++) {
                                                checkboxes[i].checked = source.checked;
                                            }
                                        }
                                        function bulk_delete() {
                                            $("#form_bulk_delete").submit();
                                        }
</script>
@endsection