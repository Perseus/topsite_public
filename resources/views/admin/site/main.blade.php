@extends('layouts.app')


@section('content')

	<div class="col-md-6 col-md-offset-0">
		<div class="panel panel-default">
			<div class="panel-heading"> Manage site </div>
				<div class="panel-body">

                                    <ul class="list-unstyled">
                                        <li> <a href="{{ url('admin/news/') }}"> Manage: News </a> </li>
                                        <li> <a href="{{ url('admin/downloads/') }}"> Manage: Downloads </a> </li>
                                        <li> <a href="{{ url('admin/categories/view/') }}"> Manage: Categories</a> </li>
                                        <li> <a href="{{ url('admin/authors/view/') }}"> Manage: Authors </a> </li>
                                    </ul>
               </div>
        </div>
    </div>
@endsection
