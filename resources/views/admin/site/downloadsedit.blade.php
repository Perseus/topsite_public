@extends('layouts.app')
	


@section('content')
	
			<div class="col-md-6 col-md-offset-0">
				@if(count($messages) > 0)
				@foreach($messages as $message)
				<div class="panel panel-{{ $message['type'] }}" id="errorPanel{{ $message['identifier'] }}"> 
					<div class="panel-heading"> {{ $message['title'] }} <button type="button" class="close" 
									data-target="#errorPanel{{ $message['identifier'] }}" 
									data-dismiss="alert">
									<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
									</button></div>
					<div class="panel-body"> 
							{{ $message['content'] }}
					</div>
				</div>

				@endforeach
				@endif
					@if(count($categories) < 1)
				<div class="panel panel-warning">
						   <div class="panel-heading">	   <a href="{{ url('/admin/categories/add') }}"> No download categories found </a></div>
				</div>
				@endif
				<div class="panel panel-default">
				<div class="panel-heading"> Add download </div>
				<div class="panel-body">
			
					<form  method="POST" action="{{ url('/admin/downloads/edit/'.$download->id) }}"  class="pure-form pure-form-aligned" autocomplete="off">
					    <fieldset>
					        <div class="pure-control-group">
					            <label for="title">Title</label>
					            <input name="title" type="text" value="{{$download->title}}" required/>
					        </div>

					       <div class="pure-control-group dropdown">
						        @if( count($categories) > 0)
						       	<label for="type"> Download type </label>
						       		<select name="type" class="pure-control-group">
						       			@foreach($categories as $category)
						       				<option value="{{$category->type}}"> {{$category->type }} </option>
						       			@endforeach
						       		</select>
						        @endif
						   </div>

						   <div class="pure-control-group">
						   			<label for="url"> URL </label>
						   			<input type="text" name="url" value="{{ $download->url }}" />
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