@extends('layouts.app')


@section('content')

	<div class="col-md-6 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading"> Reports </div>
				<div class="panel-body">
					@if(count($reports) > 0)
						@foreach($reports as $report)

							<a href="{{ url('/admin/report/'.$report->id) }}">
							<div class="pull-left"><span class="label label-danger"> {{$report->type }} </span>{{ $report->title }} </div></a> <div class="pull-right">@if($report->read == 0) Unread @else Read @endif</div> <br />
						@endforeach
						{{ $reports->links() }} 
					@else
						No bug reports found
					@endif 
					</div>

				</div>

		
	</div>




@endsection