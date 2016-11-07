@extends('layouts.app')


@section('content')
	<div class="col-md-6 col-md-offset-0">
		@if(count($downloads) > 0)
			@foreach($downloads as $download)
				<div class="panel panel-default">
					<div class="panel-heading"> {{ $download->title }} </div>
					<div class="panel-body">
						<a href="{{$download->url}}"><span class="glyphicon glyphicon-download-alt"> Download </span></a>
					</div>
					<div class="panel-footer">
						by {{ $download->author }} <div class="pull-right"> {{ $download->created_at->diffForHumans() }} </div>
					</div>
				</div>
			@endforeach
		@endif


	</div>
@endsection