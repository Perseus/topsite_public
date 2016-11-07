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
			<div class="panel panel-default">
				<div class="panel-heading"> Add authors </div>
				<div class="panel-body">
				<form method="POST" action="{{ url('admin/authors/add') }}"   class="pure-form pure-form-aligned" autocomplete="off">
					<fieldset>
						<div class="pure-control-group">
							<label for="name"> Author name </label>
							<input type="text" name="name" placeholder="Author" required/>
						</div>
						<br />
						<div class="pure-control-group dropdown">
							<label for="type"> Author category </label>
						        	<select name="type" class="pure-control-group">
										<option value="News"> News </option>
										<option value="Downloads"> Downloads </option>
									</select>
						</div>

						<div class="pure-controls">
							<button type="submit" class="btn btn-primary"> Add author </button>
						</div>
						{{ csrf_field() }}
					</fieldset>

				</form>
				</div>
			</div>
		</div>




@endsection