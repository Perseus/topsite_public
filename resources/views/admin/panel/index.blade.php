@extends('layouts.app')


@section('content')

	<div class="col-md-6 col-md-offset-0">
		<div class="panel panel-default">
			<div class="panel-heading"> Account Search </div>
				<div class="panel-body">
					<form method="POST" action="{{ url('/admin/panel/accounts') }}" class="pure-form pure-form-aligned">
						<fieldset>
							<div class="pure-control-group">
								<label for="key"> Keyword </label>
								<input type="text" name="key" placeholder="Enter keyword" />
							</div>
							<div class="pure-control-group">
								<label for="type"> Type </label>
								<select name="type" class="pure-control-group">
									<option value="id" > Account ID </option>
									<option value="name" > Account name </option>
									<option value="ip" > Last IP Address </option>
									<option value="mac" > Last MAC Address </option>
								</select>
							</div>
							<div class="pure-controls">
								<button type="submit" class="btn btn-primary"> Search </button>
							</div>

							{{ csrf_field() }}
						</fieldset>
					</form>


				</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading"> Character search </div>
				<div class="panel-body">
					<form method="POST" action="{{ url('/admin/panel/characters') }}" class="pure-form pure-form-aligned">
						<fieldset>
							<div class="pure-control-group">
								<label for="key"> Keyword </label>
								<input type="text" name="key" placeholder="Enter keyword" />
							</div>
							<div class="pure-control-group">
								<label for="type"> Type </label>
								<select name="type">
									<option value="id" > Character ID </option>
									<option value="name" > Character name </option>
									<option value="accname" > Account name </option>
									<option value="accid"> Account ID </option>
								</select>
							</div>
							<div class="pure-controls">
								<button type="submit" class="btn btn-primary"> Search </button>
							</div>

							{{ csrf_field() }}
						</fieldset>
					</form>


				</div>
		</div>
	</div>







@endsection