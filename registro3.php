<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

	<div class="modal-body" style="float: left; width: 50%;">
        <form action="registro2.php" method="post">

          	<div class="input-group mb-2 ">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="username" class="form-control input_user" value="" placeholder="username" required>
            </div>

            <div class="input-group mb-2 ">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="nombre" class="form-control input_user" value="" placeholder="nombre">
            </div>

            <div class="input-group mb-2 ">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="text" name="apaterno" class="form-control input_pass" value="" placeholder="apellido paterno">
            </div>

            <div class="input-group mb-2">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="amaterno" class="form-control input_user" value="" placeholder="apellido materno">
            </div>

            <div class="input-group mb-2">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="date" name="fecha_nac" class="form-control input_pass" value="" placeholder="fecha de nacimiento">
            </div>

            <div class="input-group mb-2">
            	
	                <div class="input-group-append">
	                    <span class="input-group-text"><i class="fas fa-key"></i></span>
	                </div>

	                <select name="ciudad">
	                    <?php 
	                        while($datos = mysqli_fetch_array($query))
	                        {
	                    ?>
	                            <option value="<?php echo $datos['Ciudad']?>"> <?php echo $datos['Ciudad']?> </option>
	                    <?php
	                        }
	                    ?> 
	                </select>


                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>

                <select name="asociacion">
                    <?php 
                        while($datos2 = mysqli_fetch_array($query2))
                        {
                    ?>
                            <option value="<?php echo $datos2['Asociacion']?>"> <?php echo $datos2['Asociacion']?> </option>
                    <?php
                        }
                    ?> 
                </select>

                
            </div> 

          </form>
        </div>

	<div class="modal-body" style="float: left; width: 50%;">
        <form action="" method="post">

            <div class="input-group mb-2">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="number" name="peso_kg" class="form-control input_user" value="" placeholder="Peso Kg">
            </div>
            <div class="input-group mb-2">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="number" name="estatura_cm" class="form-control input_pass" value="" placeholder="Estatura cm">
            </div>

            <div class="input-group mb-2">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" name="clave" class="form-control input_pass" value="" placeholder="Clave">
            </div>   

            <div class="input-group mb-2">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" name="rep_clave" class="form-control input_pass" value="" placeholder="Repetir Clave">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ingresar">
                <input type="reset" class="btn btn-default" value="Borrar">
            </div>         
          </form>
        </div>

        <div class="mt-4">
          <div class="d-flex justify-content-center links custom-control">
            Ya tienes cuenta? <a href="index.php" class="ml-2">Pagina inicial</a>
          </div>
        </div>  


<!-- Footer -->
	<?php include 'footer.php';?>
<!-- End Footer -->

<script type="text/javascript">
	$(function(){
		$('#register').click(function(e){

			var valid = this.form.checkValidity();

			if(valid){

			var username 	= $('#username').val();
			var nombre 	= $('#nombre').val();
			var apaterno	= $('#apaterno').val();
			var amaterno 		= $('#amaterno').val();
			var fecha_nac = $('#fecha_nac').val();
			var peso_kg 	= $('#peso_kg').val();
			var estatura_cm 	= $('#estatura_cm').val();
			var clave 	= $('#clave').val();
			var rep_clave 	= $('#rep_clave').val();
			

				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: 'process.php',
					data: {firstname: firstname, lastname: lastname, email: email, phonenumber: phonenumber,password: password},
					success: function(data){
					Swal.fire({
								'title': 'Successful',
								'text': data,
								'type': 'success'
								})
							
					},
					error: function(data){
						Swal.fire({
								'title': 'Errors',
								'text': 'There were errors while saving the data.',
								'type': 'error'
								})
					}
				});

				
			}else{
				
			}

			



		});		

		
	});
	
</script>

</body>
</html>