@extends('layouts.app')


@section('content')

	<div class="col-md-6 col-md-offset-0">

			@if(count($messages) > 0)
				@foreach($messages as $message)
					<div class="panel panel-{{$message['type']}}">
						<div class="panel-heading"> {{ $message['heading'] }} </div>
						<div class="panel-body"> {{ $message['content'] }} </div>
					</div>
				@endforeach
			@endif
			<div class="panel panel-default">
				<div class="panel-heading"> Admin area - News </div>
					<div class="panel-body">
					@if(count($newsItems) > 0)
						@foreach($newsItems as $newsItem)
							<div class="pull-left"> {{ $newsItem->title }} </div> <div class="pull-right"><a href="{{url('admin/news/edit/'.$newsItem->id)}}">[edit] </a> <a href="{{url('admin/news/delete/'.$newsItem->id)}}"> [delete] </a></div> <br />
						@endforeach
					@else
						No news items found 
					@endif 
					</div>
			</div>
				{{ $newsItems->links() }}
		
		
			<div class="panel panel-default">
				<div class="panel-heading"> <a href="{{ url('admin/news/add') }} "><span class="glyphicon glyphicon-plus"></span>	Add news </div> </a>
			</div>

	</div>

@endsection
