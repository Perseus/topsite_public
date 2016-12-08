@extends('layouts.app')


@section('content')


	<div class="col-md-6 col-md-offset-0">
		<div class="panel panel-default">
			<div class="panel-heading"> Manage your account </div>
			<div class="panel-body">

					<table class="pure-table">
						<tbody>
							<tr>
								<td> Account name </td>
								<td> {{ Auth::user()->name }} </td>
							</tr>
							<tr>
								<td> Account password </td>
								<td> ***************** <span class="pull-right"><a href="{{ url('/account/changepw') }}"> [Change] </a> </span></td>
							</tr>
							<tr>
								<td> Account e-Mail </td>
								<td> {{ Auth::user()->email }} <span class="pull-right"> <a href="{{ url('/account/changepw') }}"> [Change] </a> </span></td>
							</tr>
							<tr>
								<td> Last login IP </td>
								<td> {{ Auth::user()->last_login_ip }} </td>
							</tr>
							<tr>
								<td> Last Login MAC </td>
								<td> {{ Auth::user()->last_login_mac }} </td>
							</tr>
						</tbody>
					</table>
			</div>
		</div>
	</div>

@endsection