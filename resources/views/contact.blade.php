@extends('layouts.app')



@section('content')
	<div class="col-md-6 col-md-offset-0">

			@if(count($messages) > 0)
				@foreach($messages as $message)
					<div class="panel panel-{{$message['type']}}">
						<div class="panel-heading"> {{ $message['title'] }} </div>
						<div class="panel-body"> {{ $message['body'] }} </div>
					</div>
				@endforeach
			@endif
			<div class="panel panel-default">
					<div class="panel-heading"> Contact us </div>
					<div class="panel-body">
					<form action="" method="POST" class="pure-form pure-form-aligned" autocomplete="off">

						<div class="pure-control-group">
							<label for="title"> Title </label>
							<input type="text" name="title" placeholder="Message title" required/>
						</div>
						<div class="pure-control-group dropdown">
							<label for="type"> Type </label>
							<select name="type" class="pure-control-group">
									<option name="bug">Bug report</option>
									<option name="hack">Hack(er) report </option>
									<option name="scam">Scam(mer) report </option>
									<option name="sugg"> Suggestion </option>
									<option name="other"> Other </option>
								</select>
						</div>
						<div class="pure-control-group">
						   			<textarea style="height: 400px;" id="content" name="body"></textarea>
					    </div>
					    <div class="pure-controls">
					    	<button type="submit" class="btn btn-primary"> Submit </button>
					    </div>

					    {{ csrf_field() }}

					</form>


					</div>
			</div>


	</div>
@endsection