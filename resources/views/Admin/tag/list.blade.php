

@extends('Admin.main')
@section('title','Tags | Admin')
@section('content')
@section('page_header','Tags List')
<div class="row">
    <div class="col-lg-12">
        <div class="well">
            <a href="{{url('admin/tags/create')}}" class="btn btn-success">
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
                
                    <form id="form_bulk_delete" method="post" action="{{url("admin/tags/bulk_delete")}}">
                    <DIV class="col-md-8">
                        
                        <label ><input onClick="toggle(this)"  type="checkbox" /> Select All</label>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />    
                   
                        
                        <ol class='list-group simple_with_animation vertical'>
                             @foreach($tags as $i)

                            <li id="{{$i->id}}" class="list-group-item text-capitalize">
                            <label>
                            <input name="id[]" value="{{$i->id}}" type="checkbox" />
                            {{$i->name}}
                            </label>    
                              <span class="pull-right">
                                    <span title="Hold and drag to change order" class="fa fa-arrows move btn btn-success"></span>
                                    <a href='{{url("admin/tags/$i->id")}}' class="btn btn-primary fa fa-info-circle"></a>
                                    <a href='{{url("admin/tags/$i->id/delete")}}' class="btn btn-danger fa fa-remove"></a>
                                    <a href='{{url("admin/tags/$i->id/edit")}}' class="btn btn-info fa fa-pencil"></a>
                              </span>
                          </li>
                           @endforeach
                        </ol>
                   
                     </DIV>       
                       


                    </form>
                
                
                <!-- /.table-responsive -->

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<style type="text/css">
    body.dragging, body.dragging * {
      cursor: move !important;
    }

    .dragged {
      position: absolute;
      opacity: 0.5;
      z-index: 2000;
    }

    ol.example li.placeholder {
      position: relative;
      /** More li styles **/
    }
    ol.example li.placeholder:before {
      position: absolute;
      /** Define arrowhead **/
    }
</style>

@endsection


@section('custom_scripts')
<!-- DataTables JavaScript -->
<script src="{{url('')}}/resources/assets/admin/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="{{url('')}}/resources/assets/jquery-sortable-master/source/js/jquery-sortable.js"></script>
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
                                        // Sortable rows
    
    var adjustment;

$(".simple_with_animation").sortable({
  group: 'simple_with_animation',
  pullPlaceholder: true,
   handle: '.move',
  // animation on drop
  
  onDrop: function  ($item, container, _super) {
    var $clonedItem = $('<i/>').css({height: 0});
    $item.before($clonedItem);
    $clonedItem.animate({'height': $item.height()});

    $item.animate($clonedItem.position(), function  () {
      $clonedItem.detach();
      _super($item, container);
    });
   
     
    var order = []; 

        $('.simple_with_animation li').each( function(e) {
            order[ $(this).attr('id') ] =  $(this).index()+1 ;
        });
      console.log(order);
      $.get('tags/sort_tags', {odr:order});
     
  },
  

  // set $item relative to cursor position
  onDragStart: function ($item, container, _super) {
    var offset = $item.offset(),
        pointer = container.rootGroup.pointer;

    adjustment = {
      left: pointer.left - offset.left,
      top: pointer.top - offset.top
    };

    _super($item, container);
  },
  onDrag: function ($item, position) {
    $item.css({
      left: position.left - adjustment.left,
      top: position.top - adjustment.top
    });
  }
});
</script>
@endsection