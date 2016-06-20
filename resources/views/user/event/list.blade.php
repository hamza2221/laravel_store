@extends('Admin.main')
@section('title','Events | User')
@section('content')
@section('page_header','Events')
<div class="row">
<?php $event=$data; ?>
	<div class="col-md-12">
		<div id="calendar"></div>
	</div>
</div>
<div class="panel-body">
                            <!-- Button trigger modal -->
                            
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h1 class="modal-title" id="eventTitle">Modal title</h1>
                                        </div>
                                        <div class="modal-body" id="eventDescription">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </div>
										
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        </div>
	
@endsection
@section('custom_scripts')
	<link rel='stylesheet' href='{{url("")}}/resources/assets/fullcalendar-2.6.0/fullcalendar.css' />
	<script src='{{url("")}}/resources/assets/fullcalendar-2.6.0/lib/moment.min.js'></script>
	<script src='{{url("")}}/resources/assets/fullcalendar-2.6.0/fullcalendar.js'></script>
	<script>
		
$('#calendar').fullCalendar({

    events: './event/ajaxDetails',
	eventClick: function(calEvent, jsEvent, view) {

    //    alert('Event: ' + calEvent.id);
		$("#myModal").modal({show:true, backdrop: 'static'});
		$("#eventTitle").html(calEvent.title);
		$("#eventDescription").html('<h3>Event Description:</h3>'+calEvent.description);
    }

});
	</script>
@endsection

