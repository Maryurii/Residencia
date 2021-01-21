<?php
session_start();  
// Include config file
require_once "config.php";

// comprobar si tenemos los parametros w1 y w2 en la URL
if (isset($_GET["w1"]) && isset($_GET["w2"])) {
   // asignar w1 y w2 a dos variables
   $userScore = $_GET["w1"];
   $status = $_GET["w2"];



    $query = " insert into evaluacion_usuario values (4,".$_SESSION['id_usuario'].",".$_SESSION['Id_Entrenador'].", $userScore, 'Test',$status) ";
      // mostrar $phpVar1 y $phpVar2
     // echo "<p>Parameters: " . $query.   "</p>";

    mysqli_query($link, $query);  
    mysqli_close($link);

} else {
    echo "<p>No parameters</p>";
 }

?>
<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Awesome Quiz App | CodingNepal</title> -->
    <link rel="stylesheet" href="styleForm.css">
    <!-- FontAweome CDN Link for Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <!-- start Quiz button -->
    <div class="start_btn"><button>Empezar prueba</button></div>

    <!-- Info Box -->
    <div class="info_box">
        <div class="info-title"><span>Reglas</span></div>
        <div class="info-list">
            <div class="info">1. Tu solo tendras <span>15 segundos</span> para constestar una pregunta.</div>
            <div class="info">2. Una vez que seleccione su respuesta, no se puede deshacer.</div>
            <div class="info">3. Selecciona tu pregunta antes que el tiempo termine</div>
            <div class="info">4. No puede salir de la prueba mientras juega.</div>
            <div class="info">5. Obtendrá puntos según sus respuestas correctas.</div>
        </div>
        <div class="buttons">
            <button  type="button" id="btnQuit" class="btnQuit"  onclick="window.location.href='Unidad1.php'">Salir</button>
            <button class="restart">Continue</button>
        </div>
    </div>

    <!-- Quiz Box -->
    <div class="quiz_box">
        <header>
            <div class="title">Aplicación de prueba</div>
            <div class="timer">
                <div class="time_left_txt">Tiempo restante</div>
                <div class="timer_sec">15</div>
            </div>
            <div class="time_line"></div>
        </header>
        <section>
            <div class="que_text">
                <!-- Here I've inserted question from JavaScript -->
            </div>
            <div class="option_list">
                <!-- Here I've inserted options from JavaScript -->
            </div>
        </section>

        <!-- footer of Quiz Box -->
        <footer>
            <div class="total_que">
                <!-- Here I've inserted Question Count Number from JavaScript -->
            </div>
            <button class="next_btn">Siguiente Pregunta</button>
        </footer>
    </div>

    <!-- Result Box -->
    <div class="result_box">
        <div class="icon">
            <i class="fas fa-crown"></i>
        </div>
        <div class="complete_text">Has completado el cuestionario!</div>
        <div class="score_text">
            <!-- Here I've inserted Score Result from JavaScript -->
        </div>
        <div class="buttons">
            <button class="restart" id="restart">Repetior prueba</button>
            <button class="btnw" id="btnw">Repetior prueba</button>
                     <button  type="button" id="btQuit" class="btnQuit"  onclick="window.location.href='Unidad1.php'">Salir</button>
        </div>
    </div>

   <script src="js/Form1questions.js"></script>
    <!-- Inside this JavaScript file I've coded all Quiz Codes -->
     <script src="js/script.js">
    
     
     </script> 

</body>
</html>

 
<script>  
btnw.onclick = ()=>{
//alert(localStorage.getItem("status"));
//userScore= localStorage.getItem("userScore").toString();
// status= localStorage.getItem("status").toString();
 window.location.href = window.location.href + "?w1=" + userScore + "&w2=" + status;
 
}
</script>
