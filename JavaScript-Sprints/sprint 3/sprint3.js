
var check = function() {
		var pass=document.getElementById("pass");
		var confPass=document.getElementById("Confirm pass");

		if(pass.value== confPass.value)
		{
		   document.getElementById('message').style.color = 'green';
		    document.getElementById('message').innerHTML = 'matching';
		  } 
		  else {
		    document.getElementById('message').style.color = 'red';
		    document.getElementById('message').innerHTML = 'not matching';
		  }

}