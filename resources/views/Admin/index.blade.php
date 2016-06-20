@extends('Admin.main')
@section('title','Dashboard | User')
@section('content')
@section('page_header','Recent Researches')
<div class="row">
<?php $Researches=$researches; ?>
	<div class="col-md-12">
		<table class="table table-striped" >
			<tr>
				<th>Title</th>
                                            <th>Description</th>
											<th>Company</th>
											<th>sector</th>
											<th>PDF File</th>
                                            <th>Created</th>
			</tr>
			@foreach($Researches as $i)
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
		</table>
	</div>
</div>
	
@endsection

