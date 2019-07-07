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
<form class="form-signin" action="" id="loginform" method="post"name="loginform">
<img id="logo" style="width:50%;" src="/project/logo.png">
<br>
<br>
      <h1 class="h3 mb-3 font-weight-normal" style="color:#D7DDE2">Пожалуйста, войдите в систему</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="text" id="username" name="username" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
	  
      <input style="margin-top:10px;" type="password" name="password" id="password" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3"></div>
      <button class="btn btn-lg btn-primary btn-block" name="login" id="login" type="submit">Войти</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
</form>
<?php
	include("connect.php");
	session_start();
	$connect = mysqli_connect($host, $user, $password, $database) 
	or die("Ошибка " . mysqli_error($link)); 


	if(isset($_SESSION["session_username"])){
	// вывод "Session is set"; // в целях проверки
	header("Location: index.php");
	}

	if(isset($_POST["login"])){

	if(!empty($_POST['username']) && !empty($_POST['password'])) {
	$username=htmlspecialchars($_POST['username']);
	$password=htmlspecialchars($_POST['password']);
	$password= md5($password);
	//echo $password;
	//echo "<br>";
	$query =mysqli_query($connect ,"SELECT * FROM users WHERE login='".$username."' AND pass='".$password."'");
	$numrows=mysqli_num_rows($query);
	if($numrows!=0)
 {
while($row=mysqli_fetch_assoc($query))
 {
	$dbusername=$row['login'];
	  $dbpassword=$row['pass'];
	  $uID = $row['id'];
 }
  if($username == $dbusername && $password == $dbpassword)
 {
	// старое место расположения
	//  session_start();
	 $_SESSION['session_username']=$username;	
	 $_SESSION['id']=$uID; 
 /* Перенаправление браузера */
   header("Location: index.php");
	}
	} else {
	//  $message = "Invalid username or password!";
	
	echo  "<script> alert('Неверный логин или пароль. Повторите попытку снова.')</script>";
 }
	} else {
		echo  "<script> alert('Все поля обязательны для заполнения!')</script>";
	}
	}
	?>
</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

 	 


<script>
	


/*	$('#login').click(function(event) {

		event.preventDefault();
		$.ajax({
			type: "POST",
			url: '/project/check_login.php',
			data: 'login='+$('#inputLogin').val()+'&password='+$('#inputPassword').val(),
			success: function(result) {
				account(result);
				console.log(result);
			},
			error: function(){
				console.log('error');
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
	}*/
</script>