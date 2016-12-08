$(document).ready(function()
{

	function changePassword(password,id)
	{
		$body = $("#pajaxModal");

		$(document).on({
		    ajaxStart: function() { $body.show();    },
		     ajaxStop: function() { $body.hide(); }    
		});

		$.ajax({
			url: APP_URL + '/admin/panel/pw/' + id,
			method: "POST",
			headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  },
			data: { newpass: password },
			success: function(data)
			{
				if(data == "success"){
						
					$("#psuccess").html('Password was changed successfully');
					$("#psuccess").show();

				}
				else{
					$("#perror").html('Password could not be updated. ' + data);
					$("#perror").show();

				}
			}

		});
	}

	function changemail(email,id)
	{

		$body = $("#eajaxModal");

		$(document).on({
		    ajaxStart: function() { $body.show();    },
		     ajaxStop: function() { $body.hide(); }    
		});
		$.ajax({
			url: APP_URL + '/admin/panel/mail/' + id,
			method: "POST",
			headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  },
			data: { newmail: email },
			success: function(data)
			{
				if(data == "success"){
					$("#esuccess").html('eMail was changed successfully');
					$("#esuccess").show();

				}
				else{
					$("#eerror").html('eMail could not be updated. ' + data);
					$("#eerror").show();

				}
			}

		});
	}




	$("#passSubmit").click(function(e)
	{
		var newpass = $("#newpass").val();
		var id = $("#id").val();
		e.preventDefault();
		changePassword(newpass,id);

	
	});

	$("#mailSubmit").click(function(e)
	{
		var newmail = $("#newmail").val();
		var id = $("#id").val();
		e.preventDefault();
		changemail(newmail,id);
	});

	$("#pclose").click(function(){
		$("#psuccess").hide();
		$("#perror").hide();
	});

	$("#eclose").click(function(){
		$("#esuccess").hide();
		$("#eerror").hide();
	});


});

