@extends('layouts.app')


@section('content')
	
		<div class="col-md-6 col-md-offset-0">
			@if(count($messages) > 0)
				@foreach($messages as $message)
					<div class="panel panel-{{$message['type']}}">
						<div class="panel-heading"> {{$message['heading']}} </div>
						<div class="panel-body">	
							{{ $message['content'] }}
						</div>
					</div>
				@endforeach
			@endif
			<div class="panel panel-default">
				<div class="panel-heading">  Downloads </div>
					<div class="panel-body">
						@if(count($downloadItems) > 0)
						@foreach($downloadItems as $downloadItem)
							<div class="pull-left"> {{ $downloadItem->title }} </div> <div class="pull-right"><a href="{{url('admin/downloads/edit/'.$downloadItem->id)}}">[edit] </a> <a href="{{url('admin/downloads/delete/'.$downloadItem->id)}}"> [delete] </a></div> <br />
						@endforeach
					@else
						No download items found 
					@endif 
					</div>
			</div>
				{{ $downloadItems->links() }}
					
			<div class="panel panel-default">
				<div class="panel-heading"> <a href="{{ url('admin/downloads/add') }} "><span class="glyphicon glyphicon-plus"></span>	Add downloads </div> </a>
			</div>
		</div>

@endsection