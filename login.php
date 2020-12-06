<?php
// Initialize the session
ob_start();
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: welcome.php");
  exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingrese su usuario.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingrese su contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT ID_Usuario, Nombre, Clave FROM USUARIO WHERE Nombre = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["ID_Usuario"] = $id;
                            $_SESSION["Nombre"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "La contraseña que has ingresado no es válida.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No existe cuenta registrada con ese nombre de usuario.";
                }
            } else{
                echo "Algo salió mal, por favor vuelve a intentarlo.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?> 

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>LOGIN</title>
	<meta content="" name="descriptison">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="assets/img/favicon.png" rel="icon">
	<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
	<link href="assets/vendor/aos/aos.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<main id="main">
	  <!-- Modal -->
	  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	      <div class="modal-content ">
	        <div class="modal-header">
	          <h5 class="modal-title" id="exampleModalLabel">Iniciar Sesion</h5>
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>
	        <div class="modal-body">
	        	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		            <div class="input-group mb-3 form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
		                <div class="input-group-append">
		                    <span class="input-group-text"><i class="fas fa-user"></i></span>
		                </div>
		                <input type="text" name="username" class="form-control input_user" value="<?php echo $username; ?>" placeholder="username">
		                
		            </div>
		            <div>
		            	<span class="help-block"><?php echo $username_err; ?></span>
		            </div>
		            <div class="input-group mb-2 form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
		                <div class="input-group-append">
		                    <span class="input-group-text"><i class="fas fa-key"></i></span>
		                </div>
		                <input type="password" name="password" class="form-control input_pass" placeholder="password">
		                
		            </div>
		            <div>
		                <span class="help-block"><?php echo $password_err; ?></span>
		            </div>
		            <div class="form-group">
		                <div class="custom-control custom-checkbox">
		                    <input type="checkbox" class="custom-control-input" id="customControlInline">
		                    <label class="custom-control-label" for="customControlInline">Recuerdame</label>
		                </div>
		            </div>
		            <div class="mt-4">
		            	<div class="d-flex justify-content-center links">
		                No tienes cuenta? <a href="registro.php" class="ml-2">Registrarse</a>
		            	</div>
		            	<div class="d-flex justify-content-center links">
		                	<a href="#">Se te olvido la contraseña?</a>
		            	</div>
		            </div>  

		            <div >
			        	<button type="button" class="get-started-btn" data-dismiss="modal">Cerrar</button>
			        	<button type="submitted" class="get-started-btn" value="Ingresar">Iniciar Sesion</button>
			        </div>
	      		</div>           
	          </form>
	        </div>
	        
	    </div>
	  </div><!-- End Modal -->
	</main>

</body>
</html>