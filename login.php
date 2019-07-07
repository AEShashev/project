<!DOCTYPE html>
<html>
<head>
	<title>MBT</title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="style.css" rel="stylesheet">
</head>

<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

<body class="text-center">
<form class="form-signin" action="/" method="post">
      <img class="mb-4" src="/docs/4.3.1/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Пожалуйста, войдите в систему</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="text" id="inputLogin" name="login" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3"></div>
      <button class="btn btn-lg btn-primary btn-block" id="login" type="submit">Войти</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
</form>
</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script>
	$('#login').click(function(event) {

		event.preventDefault();
		$.ajax({
			type: "POST",
			url: 'http://localhost/project/check_login.php',
			data: 'login='+$('#inputLogin').val()+'&password='+$('#inputPassword').val(),
			success: function(result) {
				account(result);
				console.log(result);
			},
			error: function(){
				toast({
			  		type: (json.status == 'Ошибка!' ? 'error' : 'success'),
			  		title: 'Ошибка! Попробуйте позже',
		  		});
			}
		});
	});

	function account(result){
		const toast = swal.mixin({
		    width: '600px',
		    position: 'center',
		    showConfirmButton: true,
		});
		var json = JSON.parse(result);
		console.log(result)
		if (json.url) {
			if(json.url == 'self') location.reload();
			else window.location.href = '/' + json.url;
		} 
		else if (json.url === '')  window.location.href = '/';
		else {
			toast({
		  		type: (json.status == 'Ошибка!' ? 'error' : 'success'),
		  		title: json.status + ' - ' + json.message,
		  	});
		}
	}
</script>