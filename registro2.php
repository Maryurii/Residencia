<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		require('config.php');
		// If form submitted, insert values into the database.
		if (isset($_REQUEST['nombre'])){
		        // removes backslashes
		 $nombre = stripslashes($_REQUEST['nombre']);
		        //escapes special characters in a string
		 $nombre = mysqli_real_escape_string($link,$nombre); 
		 $apaterno = stripslashes($_REQUEST['apaterno']);
		 $apaterno = mysqli_real_escape_string($link,$apaterno);
		 $password = stripslashes($_REQUEST['password']);
		 $password = mysqli_real_escape_string($link,$password);
		 $trn_date = date("Y-m-d H:i:s");
		        $query = "INSERT into `usuario` (nombre, apellidop, clave, trn_date)
		VALUES ('$nombre', '".md5($password)."', '$apaterno', '$trn_date')";
		        $result = mysqli_query($link,$query);
		        if($result){
		            echo "<div class='form'>
		<h3>You are registered successfully.</h3>
		<br/>Click here to <a href='login.php'>Login</a></div>";
		        }
		    }else{
		?>
		<div class="form">
			<h1>Registration</h1>
			<form name="registration" action="registro2.php" method="post">
				<input type="text" name="nombre" placeholder="Nombre" required />
				<input type="text" name="apaterno" placeholder="ApellidoPaterno" required />
				<input type="password" name="password" placeholder="Password" required />
				<input type="submit" name="submit" value="Register" />
			</form>
		</div>
	<?php } ?>



	<!-- Footer -->
	<?php include 'footer.php';?>
<!-- End Footer -->

</body>
</html>