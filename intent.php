<?php
    include 'config.php';
    
    $query=mysqli_query($link,"SELECT Id_Ciudad, Ciudad, Id_Pais FROM ciudad");
    
    if(isset($_POST['ciudad']))
    {
        $ciudad=$_POST['ciudad'];
        echo $ciudad;
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	       <form action="intent.php" method="post">
            <div style="width:900px; margin:0 auto; border:1px solid #FCC; padding: 10px;">
                <center>
                    <h3>¿De qué ciudad nos visitas?</h3>
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
                    <input type="submit" value="Contestar">
                </center>
            </div>
        </form>

	<!-- Footer -->
	<?php include 'footer.php';?>
<!-- End Footer -->

</body>
</html>