@extends('layouts.app')



@section('content')

	<div class="col-md-6 col-md-offset-0">
		<div class="panel panel-default">
			<div class="panel-heading"> Accounts </div>
			<div class="panel-body">
				@if(count($accserv) > 0)
					<table class="pure-table">
						<thead>
							<tr> 
								<th> Account ID </th>
								<th> Account name </th>
								<th> Last Login IP </th>
								<th> Action </th>
							</tr>
						</thead>
						<tbody>	
					
					@foreach($accserv as $account)
							<tr>
								<td> {{ $account->id }} </td>
								<td> {{ $account->name }} </td>
								<td> {{ $account->last_login_ip }} </td>
								<td> <a href="{{ url('/admin/panel/account/'.$account->id) }}"> View </a> </td>
							</tr>
					@endforeach
						</tbody>
					</table>
				@else
					No accounts found
				@endif
			</div>
	</div>
</div>


@endsection