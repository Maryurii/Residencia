<?php   
 session_start();  
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

       
           <script src="jquery.js"></script>  
           <link rel="stylesheet" href="bootstrap.css" />  
           <script src="bootstrap.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container"  style="width:100%;height:50px; background-color: white; vertical-align:top;">  
		  	    <br />  
	
	
				<?php  
				
                if(isset($_SESSION['username']))  
                {  
                ?>  
                <div align="center">  
                     <h2>Welcome - <?php echo    $_SESSION['Tipo']; ?> <?php echo $_SESSION['username']; ?></h2><br/>  
                     <!--<a href="#" id="logout">Logout</a>  -->
                </div>  
                <?php  
                }  
                else  
                {  
                ?>  
    
                <?php  
                }  
                ?>  
           </div>  
           <br />  
      </body>  
 </html>  
 <!-- Modal -->
	  
 <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	      <div class="modal-content ">
	        <div class="modal-header">
	          <h5 class="modal-title" id="exampleModalLabel">Iniciar Sesion</h5>
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>
	        <div class="modal-body">
		            <div class="input-group mb-3 form-group">
		                <div class="input-group-append">
		                    <span class="input-group-text"><i class="fas fa-user"></i></span>
		                </div>
		                <input type="text" name="username"  id="username" class="form-control input_user" placeholder="username">
		                
		            </div>
		            <div>
		            	<span class="help-block"></span>
		            </div>
		            <div class="input-group mb-2 form-group">
		                <div class="input-group-append">
		                    <span class="input-group-text"><i class="fas fa-key"></i></span>
		                </div>
		                <input type="text"  name="password" id="password" class="form-control input_pass" placeholder="password">
		                
		            </div>
		            <div>
		                <span class="help-block"></span>
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
			        	<button  name="login_button" id="login_button" type="submitted" class="get-started-btn" value="Ingresar">Iniciar Sesion</button>
			        </div>
	      		</div>           
	          </form>
	        </div>
	        
	    </div>
	  </div><!-- End Modal -->



 <script>  
 
 $(document).ready(function(){  
      $('#login_button').click(function(){  
           var username = $('#username').val();  
           var password = $('#password').val();  
           if(username != '' && password != '')  
           {  
                $.ajax({  
                     url:"action.php",  
                     method:"POST",  
                     data: {username:username, password:password},  
                     success:function(data)  
                     {  
						 console.log(data.trim());
						if(data.trim() == 'Yes') 
                          {  
                               $('#exampleModal').hide();  
                               location.reload();  
						  }  
						  else  
                          {  
							   alert("Información incorrecta");  
							   document.getElementById("password").value = "";
                          }  
                          
					 }  
					 
				}
				); 	
				 
           }  
           else  
           {  
				alert("Ambos campos son obligatorios");  
				
           }  
      });  
  
 });  
 </script>  
 
<script>  
  
  $('#logout').click(function(){  
	   var action = "logout";  
	   $.ajax({  
			url:"action.php",  
			method:"POST",  
			data:{action:action},  
			success:function()  
			{  
				 location.reload();  
			}  
	   });  
  });  

</script>  