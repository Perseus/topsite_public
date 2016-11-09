@extends('layouts.app')


@section('content')

	<div class="col-md-6 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading"> Pirate Ranking </div>
				<div class="panel-body">
						<ul class="nav nav-pills">
						  <li class="active"><a data-toggle="pill" href="#home">Players by Level</a></li>
						  <li><a data-toggle="pill" href="#menu1">Players by Gold</a></li>
						  <li><a data-toggle="pill" href="#menu2">Guilds by Members</a></li>
						</ul>

						<div class="tab-content">
						  <div id="home" class="tab-pane fade in active">
						  		<table class="pure-table">
						  		<br />
						  			<thead>
						  				<tr>
						  					<th>#</th>
						  					<th> Player name </th>
						  					<th> Player class </th>
						  					<th> Player level </th>
						  				</tr>
						  			</thead>
						  			<tbody>
						  				@if(count($charactersbyLevel) > 0)
						  					@foreach($charactersbyLevel as $character)
						  						<tr>
						  							<td> {{ $loop->iteration }} </td>
						  							<td> {{ $character->cha_name }} </td>
						  							<td> {{ $character->job }} </td>
						  							<td> {{ $character->degree }} </td>
						  						</tr>
						  					@endforeach
						  				@else
									  	This table is empty just like ur life
									  @endif
									</tbody>
						  		</table>
						  </div>
						  <div id="menu1" class="tab-pane fade">
						  	<table class="pure-table">
						  		<br />
						  			<thead>
						  				<tr>
						  					<th>#</th>
						  					<th> Player name </th>
						  					<th> Player class </th>
						  					<th> Player gold </th>
						  				</tr>
						  			</thead>
						  			<tbody>
									  	@if(count($charactersByGold) > 0)
						  					@foreach($charactersByGold as $character)
						  						<tr>
						  							<td> {{ $loop->iteration }} </td>
						  							<td> {{ $character->cha_name }} </td>
						  							<td> {{ $character->job }} </td>
						  							<td> {{ $character->gd }} </td>
						  						</tr>
						  					@endforeach
						  				@else
									  	This table is empty just like ur life
									  @endif
									</tbody>
						  		</table>
						  </div>
						  <div id="menu2" class="tab-pane fade">
						  	<table class="pure-table">
						  		<br />
						  			<thead>
						  				<tr>
						  					<th>#</th>
						  					<th> Guild name </th>
						  					<th> Guild leader </th>
						  					<th> Guild members </th>
						  				</tr>
						  			</thead>
						  			<tbody>

									 	@if(count($getGuilds) > 0)
						  					@foreach($getGuilds as $guild)
						  						<tr>
						  							<td> {{ $loop->iteration }} </td>
						  							<td> {{ $guild->guild_name }} </td>
						  							<td> {{ $guild->leader_id }} </td>
						  							<td> {{ $guild->member_total }} </td>
						  						</tr>
						  					@endforeach
						  				@else
									  	This table is empty just like ur life
									  @endif
									</tbody>
						  		</table>
						  </div>
						</div>
				</div>
			</div>

	</div>


@endsection