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
				<div class="panel-heading"> Categories </div>
				<div class="panel-body">
				@if(count($categories) > 0)
					@foreach($categories as $category)
							<div class="pull-left"> {{ $category->type }} </div> <div class="pull-right"><a href="{{url('admin/categories/delete/'.$type.'/'.$category->id)}}"> [delete] </a></div> <br />
						@endforeach
					@else
						No categories found 
					@endif 
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading"><a href="{{ url('admin/categories/add') }}"> Add new categories </a> </div>
			</div>
	</div>

@endsection