<?php
// Include config file
require_once "config.php";

session_start();

mysqli_select_db($link, 'PrGimnasia');

$username = empty(trim(isset($_POST['username'])));
$nombre = empty(trim(isset($_POST['nombre'])));
$apaterno = empty(trim(isset($_POST['apaterno'])));
$amaterno = empty(trim(isset($_POST['amaterno'])));
$fecha_nac = empty(trim(isset($_POST['fecha_nac'])));
$peso_kg = empty(trim(isset($_POST['peso_kg'])));
$estatura_cm = empty(trim(isset($_POST['estatura_cm'])));
$ciudad = empty(trim(isset($_POST['ciudad'])));
$asociacion = empty(trim(isset($_POST['asociacion'])));
$clave = empty(trim(isset($_POST['clave'])));
$rep_clave = empty(trim(isset($_POST['rep_clave'])));

$sql = "SELECT * FROM USUARIO WHERE Username = '$username'";

$result = mysqli_query($link, $sql);
$num = mysqli_num_rows($result);

$query=mysqli_query($link,"SELECT Id_Ciudad, Ciudad, Id_Pais FROM ciudad");
$query2=mysqli_query($link,"SELECT Id_Asociacion, Asociacion, Tipo FROM asociacion");


if($num == 1){	
	echo "Ya existe ese usuario.";
}

else if ($num == null){
	$reg = "insert into usuario (Nombre, ApellidoP, ApellidoM, FechaNacimiento, Peso, Estatura, Estatus, Clv_Nivel, Id_Ciudad, Id_Asociacion, Username) values ('$nombre', '$apaterno', 'amaterno', '$fecha_nac', '$peso_kg', '$estatura_cm', '$ciudad', '$asociacion', '$clave', '$username')";
	mysqli_query($link, $reg);
	echo "Registro exitoso";
}
 

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

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
</body>
</html>