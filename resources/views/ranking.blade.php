@extends('layouts.app')


@section('content')

	<div class="col-md-6 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading"> Pirate Ranking </div>
				<div class="panel-body">
						<ul class="nav nav-pills">
						  <li class="active"><a data-toggle="pill" href="#home">Players by Level</a></li>
						  <li><a data-toggle="pill" href="#menu1">Gold</a></li>
 						  <li><a data-toggle="pill" href="#menu3">Reputation</a></li>
						  <li><a data-toggle="pill" href="#menu2">Guilds by Members</a></li>

						</ul>

						<div class="tab-content">
						  <div id="home" class="tab-pane fade in active">
						  	<center>
						  		<table class="pure-table">
						  		<br />
						  			<thead>
						  				<tr>
						  					<th>#</th>
						  					<th> Player name </th>
						  					<th> Player class </th>
						  					<th> Player level </th>
						  					<th> Player type </th>
						  					<th> Player guild </th>
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
						  							<td> {{ $character->chartype }} </td>
						  							<td> {{ $character->guildname }} </td>
						  						</tr>
						  					@endforeach
						  				@else
									  	This table is empty just like ur life
									  @endif
									</tbody>
						  		</table>
						  	</center>
						  </div>
						  <div id="menu1" class="tab-pane fade">
						  <center>
						  	<table class="pure-table">
						  		<br />
						  			<thead>
						  				<tr>
						  					<th>#</th>
						  					<th> Player name </th>
						  					<th> Player class </th>
						  					<th> Player gold </th>
						  					<th> Player type </th>
						  					<th> Player guild </th>
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
						  							<td> {{ $character->chartype }} </td>
						  							<td> {{ $character->guildname }} </td>
						  						</tr>
						  					@endforeach
						  				@else
									  	This table is empty just like ur life
									  @endif
									</tbody>
						  		</table>
						  	</center>
						  </div>
						  <div id="menu2" class="tab-pane fade">
						  <center>
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
						  	</center>
						  </div>
						 <div id="menu3" class="tab-pane fade">
						  <center>
						  	<table class="pure-table">
						  		<br />
						  			<thead>
						  				<tr>
						  					<th>#</th>
						  					<th> Player name </th>
						  					<th> Player class </th>
						  					<th> Player reputation </th>
						  					<th> Player type </th>
						  					<th> Player guild </th>
						  				</tr>
						  			</thead>
						  			<tbody>
									  	@if(count($charactersByReputation) > 0)
						  					@foreach($charactersByReputation as $character)
						  						<tr>
						  							<td> {{ $loop->iteration }} </td>
						  							<td> {{ $character->cha_name }} </td>
						  							<td> {{ $character->job }} </td>
						  							<td> {{ $character->credit }} </td>
						  							<td> {{ $character->chartype }} </td>
						  							<td> {{ $character->guildname }} </td>
						  						</tr>
						  					@endforeach
						  				@else
									  	This table is empty just like ur life
									  @endif
									</tbody>
						  		</table>
						  	</center>
						  </div>
						</div>
				</div>
			</div>

	</div>


@endsection