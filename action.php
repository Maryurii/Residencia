
<?php  
 session_start();  
 // Include config file
require_once "config.php";


if(count($_SESSION)>0)  {
     session_unset();    // Destruimos las variables de sesión
     session_destroy();	// Destruimos finalmente la información de la sesión  
   }

 if(isset($_POST["username"]))  
 {  


      $query = "SELECT  usuario.ID_Usuario, usuario.Username,usuario.id_TipoUsuario, usuario.Clave, tipousuario.Tipo, entrenador_usuarios.Id_Entrenador
      FROM USUARIO 
      INNER JOIN tipousuario ON tipousuario.id_TipoUsuario = usuario.id_TipoUsuario 
      INNER JOIN entrenador_usuarios ON entrenador_usuarios.ID_Usuario = usuario.ID_Usuario 
      WHERE username ='".$_POST["username"]."' AND Clave = '".$_POST["password"]."' "; 
      
      $result = mysqli_query($link, $query);  
      if(mysqli_num_rows($result) > 0)  
      {  
           $_SESSION['username'] = $_POST['username']; 
           $row= $result->fetch_array();
           $_SESSION['id_usuario']= $row['ID_Usuario']; 
           $_SESSION['id_TipoUsuario']= $row['id_TipoUsuario']; 
           $_SESSION['Tipo']= $row['Tipo']; 
           $_SESSION['Id_Entrenador']= $row['Id_Entrenador'];
           echo 'Yes';  
      }  
      else  
      {   
           echo 'No';  
      }  
      
 }  
 if(isset($_POST["action"]))  
 {  
      unset($_SESSION["username"]);  
 }  
 ?>  