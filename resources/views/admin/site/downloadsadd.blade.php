@extends('layouts.app')
	

@section('content')

		<div class="col-md-6 col-md-offset-0">
				@if(count($categories) < 1)
				<div class="panel panel-danger">
					<div class="panel-heading"> Error </div>
					<div class="panel-body">
						No categories found
					</div>
				</div>
			@endif

			@if(count($authors) < 1)
				<div class="panel panel-danger">
					<div class="panel-heading"> Error </div>
					<div class="panel-body">
						No authors found
					</div>
				</div>
			@endif
						@if(count($messages) > 0)
							@foreach($messages as $message)
								<div class="panel panel-{{$message['type']}}">
									<div class="panel-heading">{{$message['heading']}}</div>
								<div class="panel-body">
									{{ $message['content'] }}
								</div>
							</div>
							@endforeach
						@endif

						<div class="panel panel-default">
							<div class="panel-heading"> Add download </div>
							<div class="panel-body">
							<form action="{{ url('admin/downloads/add') }}" method="POST" class="pure-form pure-form-aligned" autocomplete="off">
								<fieldset>
					        <div class="pure-control-group">
					            <label for="title">Title</label>
					            <input name="title" type="text" placeholder="Title" required>
					        </div>

					       <div class="pure-control-group dropdown">
						        @if( count($categories) > 0)
						       	<label for="type"> News type </label>
						       		<select name="type" class="pure-control-group">
						       			@foreach($categories as $category)
						       				<option value="{{$category->type}}"> {{$category->type }} </option>
						       			@endforeach
						       		</select>
						        @endif
						   </div>
						    <div class="pure-control-group dropdown">
						        @if( count($authors) > 0)
						       	<label for="authname"> Author name </label>
						        	<select name="authorName" class="pure-control-group">
						       			@foreach($authors as $author)
						       				<option value="{{$author->name}}"> {{$author->name }} </option>
						       			@endforeach
						       		</select>
						        @endif
						   </div>
						   <div class="pure-control-group">
						   			<label for="url"> URL  </label>
						   			<input type="text" name="url" class="pure-control-group" />
						   </div>
							
					        <div class="pure-controls">
					            <button type="submit" class="btn btn-primary">Submit</button>
					        </div>
					        {{ csrf_field() }}
					    </fieldset>


							</form>

							</div>
						</div>
		</div>
@endsection