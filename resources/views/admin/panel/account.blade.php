@extends('layouts.app')

@section('content')
	
		<div class="col-md-6 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading"> Account </div>
					<div class="panel-body">
						<table class="pure-table">
							<tbody>
								<tr>
									<td> Account ID </td>
									<td> {{ $account1->id }} </td>
								</tr>
								<tr>
									<td> Account name </td>
									<td> {{ $account1->name }} </td>
								</tr>
								<tr>
									<td> Account eMail </td>
									<td> {{ $account1->email }} <span style="padding-left: 10px;"class="pull-right"> <a href="#" data-toggle="modal" data-target="#changeMailModal" > Change  </a></span></td>
								</tr>
								<tr>
									<td> Account password </td>
									<td> ***************** <span class="pull-right"> <a href="#" data-toggle="modal" data-target="#changePasswordModal" > Change  </a></span> </td>
								<tr>
									<td> Last Login IP </td>
									<td> {{ $account1->last_login_ip }} </td>
								</tr>
								<tr>
									<td> Last Login MAC </td>
									<td> {{ $account1->last_login_mac }} </td>
								</tr>
								<tr>
									<td> Characters </td>
									<td> @if(count($characters) > 0)
											<ul class="characters">
											@foreach($characters as $character)
												<li> <img src = " {{ URL::asset('images/chars/'.$character->chartype.'.gif') }} " /> {{ $character->cha_name }} </li>
											@endforeach
											</ul>
										@else
											No characters found 
										@endif
									</td>
							</tbody>
						</table>

					</div>
			</div>
		</div>



<!-- AJAX request modals !-->

	<div id="changePasswordModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button id="pclose" type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Change password for {{ $account1->name }} </h4>
		      </div>
		      <div class="modal-body">
		      <div id="pajaxModal" class="ajaxModal"></div>
		      	<div class="alert alert-danger" id="perror" style="display:none;">
		      	</div>
		      	<div class="alert alert-success" id="psuccess" style="display:none;">
		      	</div>
		      	<form class="pure-form pure-form-aligned">
		      		<fieldset>
		      			<div class="pure-control-group">
		      				<label for="newpass"> New password </label>
		      				<input type="text" name="newpass" id="newpass" placeholder="New password" required/>
		      			</div>
		      			<div class="pure-controls">
		      				<button class="btn btn-primary" id="passSubmit" name="passSubmit"> Change </button>
		      			</div>

		      				<input style="display:none;" type="text" value="{{ $id }}" id="id" disabled/>
		      		</fieldset>
		      	</form>
		      </div>
		    </div>

		  </div>
	</div>
	<div id="changeMailModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button id="eclose" type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Change eMail for {{ $account1->name }} </h4>
		      </div>
		      <div class="modal-body">
		      <div id="eajaxModal" class="ajaxModal"></div>
		      	<div class="alert alert-danger" id="eerror" style="display:none;">
		      	</div>
		      	<div class="alert alert-success" id="esuccess" style="display:none;">
		      	</div>
		      	<form class="pure-form pure-form-aligned">
		      		<fieldset>
		      			<div class="pure-control-group">
		      				<label for="newmail"> New email </label>
		      				<input type="text" name="newmail" id="newmail" placeholder="New eMail" required/>
		      			</div>
		      			<div class="pure-controls">
		      				<button class="btn btn-primary" id="mailSubmit" name="mailSubmit"> Change </button>
		      			</div>

		      				<input style="display:none;" type="text" value="{{ $id }}" id="id" disabled/>
		      		</fieldset>
		      	</form>
		      </div>
		    </div>

		  </div>
	</div>



@endsection