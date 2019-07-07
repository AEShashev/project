<!DOCTYPE html>
	<html lang="en">
	<head>
	<meta charset="utf-8"> 
 <title> Регистрация</title>
<link href="css/style.css" media="screen" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'rel='stylesheet' type='text/css'>
<link href="style.css" rel="stylesheet">
	</head>
<body class="text-center">

 <form class="form-signin" action="register.php" id="registerform" method="post" name="registerform">
	<img id="logo" style="width:50%;" src="/project/logo.png">
	<br>
	<br>
    <h1 class="h3 mb-3 font-weight-normal" style="color:#D7DDE2">Регистрация</h1>
	
    <label for="login" class="sr-only">Login</label>
	<input type="text" id="login" name="login" class="form-control" placeholder="Login" required autofocus>
    <label for="email" class="sr-only">E-mail</label>
	<input type="text" id="email" name="email" class="form-control" placeholder="E-mail" required style="margin-top: 10px;">
    <label for="email" class="sr-only">Пароль</label>
	<input type="text" id="password" name="password" class="form-control" placeholder="Пароль" required style="margin-top: 10px;">
	<p class="submit"><button class="btn btn-lg btn-primary btn-block mt-3" id="register" name= "register" type="submit">Зарегистрироваться</button></p>
	  <p class="regtext">Уже зарегистрированы? <br /><a href= "login.php">Введите имя пользователя</a>!</p>
      <p class="mt-5 mb-3 text-muted">© 2019</p>
</form>



</body>
</html>

<?php
	/*
	if(isset($_POST["register"])){
	
	if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
  $full_name= htmlspecialchars($_POST['full_name']);
	$email=htmlspecialchars($_POST['email']);
 $username=htmlspecialchars($_POST['username']);
 $password=htmlspecialchars($_POST['password']);
 $query=mysql_query("SELECT * FROM usertbl WHEREusername='".$username."'");
  $numrows=mysql_num_rows($query);
if($numrows==0)
   {
	$sql="INSERT INTO usertbl
  (full_name, email, username,password)
	VALUES('$full_name','$email', '$username', '$password')";
  $result=mysql_query($sql);
 if($result){
	$message = "Account Successfully Created";
} else {
 $message = "Failed to insert data information!";
  }
	} else {
	$message = "That username already exists! Please try another one!";
   }
	} else {
	$message = "All fields are required!";
	}
	}
	?>

	<?php if (!empty($message)) {echo "<p class="error">" . "MESSAGE: ". $message . "</p>";} */?>