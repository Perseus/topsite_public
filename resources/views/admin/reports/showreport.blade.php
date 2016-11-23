@extends('layouts.app')


@section('content')
		<div class="col-md-6 col-md-offset-0">
			<div class="panel panel-default">
					<div class="panel-heading"><span class="label label-danger"> {{ $report->type }} </span> {{ $report->title }} </div>
					<div class="panel-body">
						{!! $report->content !!}
					</div>
					<div class="panel-footer">.
						<div class="pull-left">  submitted by IP : {{ $report->ip }} </div> <div class="pull-right"> {{ $report->created_at->diffForHumans() }} </div>
					</div>


			</div>
		</div>

@endsection