
$(document).ready(function(){
	$('#regForm').submit(function()
	{
		var abort = false;
		$(':input[required]').each(fucntion()
		{
			if($(this).val()==='')
			{
				$(this).after('<div class="error>Field must be filled in</div>');
				abort = true;
			}
		}); // go through each registration field
		
		$("#password, #passwordCheck").keyup(passwordValidation);
		//password validation check
		
		if (abort) {return false;} else {return true;}
	}) //when form is submitted
}); //register.html in ready state

function passwordValidation()
{
	var vPassword = $"#password").val();
	var vPasswordCheck = $"#passwordCheck").val();
	if (vPassword != vPasswordCheck)
	{
		$("#passwordMatch").html("Passwords do not match!");
	}
	else{
		$("#passwordMatch").html("Passwords match!");
	}
}