@extends('layouts.app')


@section('content')

	<div class="col-md-6 col-md-offset-0">
			@if(count($messages) > 0)
				@foreach($messages as $message)
					<div class="panel panel-{{$message['type']}}">
						<div class="panel-heading">{{$message['heading']}}</div>
						<div class="panel-body"> {{ $message['body'] }} </div>
					</div>
				@endforeach
			@endif

			<div class="panel panel-default">
				<div class="panel-heading"> Authors </div>
				<div class="panel-body">
				@if(count($authors) > 0)
					@foreach($authors as $author)
							<div class="pull-left"> {{ $author->name }} </div> <div class="pull-right"><a href="{{url('admin/authors/delete/'.$type.'/'.$author->id)}}"> [delete] </a></div> <br />
						@endforeach
					@else
						No authors found 
					@endif 
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading"><a href="{{ url('admin/authors/add') }}"> Add new authors </a> </div>
			</div>
	</div>

@endsection