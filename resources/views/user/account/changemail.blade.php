@extends('layouts.app')



@section('content')

	<div class="col-md-6 col-md-offset-0">
		@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
		@endif
		@if (!empty($success))
		    <div class="alert alert-success">
		    	{{ $success }}
		    </div>
		@endif
		<div class="panel panel-default">
			<div class="panel-heading"> Change your eMail </div>
			<div class="panel-body">
				<form method="POST" action="{{ url('/account/changemail') }}" class="pure-form pure-form-aligned">
					<fieldset>
						<div class="pure-control-group">
							<label for="newpass"> New eMail  </label>
							<input type="text" name="newmail" placeholder="New eMail" required/>
						</div>

						<div class="pure-controls">
							<button type="submit" class="btn btn-primary"> Change </button>
						</div>

						{{ csrf_field() }}
					</fieldset>
				</form>
			</div>
		</div>
	</div>






@endsection