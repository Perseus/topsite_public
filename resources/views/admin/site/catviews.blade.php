@extends('layouts.app')


@section('content')
		<div class="col-md-6 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading"> Choose type </div>
				<div class="panel-body">
				<ul>
				<li><a href="{{ url('/admin/categories/view/news') }}"> Manage news categories </a></li>
				<li><a href="{{ url('/admin/categories/view/downloads') }}"> Manage download categories </a> </li>
				</ul>
				</div>
			</div>
		</div>


@endsection