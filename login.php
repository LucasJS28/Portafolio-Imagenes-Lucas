<?php
$host="";
$user="";
$pass="";
$db="";
$conn = new mysqli($host, $user, $pass, $db);
session_start();
if($_POST){
    $correo=$_POST['user'];
    $contra=$_POST['contra'];
    $sql = "SELECT * FROM usuarios WHERE correo='$correo' AND contra='$contra'";
    $resultado = mysqli_query($conn, $sql);
    $filas=mysqli_num_rows($resultado);
    if($filas){
        //Guarda el Correo que Inicio Sesion
        $_SESSION['usuario']=$correo;
        //Redirige a Pagina Lobby
        header("Location:index.php");
    }else{
        echo "<script> alert ('Usuario o Contraseña Incorrectos');</script>";
    }
}
?>
<!-- Base Generada con: bs5-$ -->
<!doctype html>
<html lang="en">
<head>
  <title>Login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<body>
<!-- Contenedor del Login Menu -->
<div class="container">
<br>
<br>
<br>
    <!-- Diseño invocado con: bs5-card-head-foot  -->
    <div class="card">
        <!-- Titulo del Login -->
        <div class="card-header">
            Iniciar Sesion
        </div>
        <!-- Contenido del Login -->
        <div class="card-body">
        <!-- Metodo Post de Envio Formulario -->
        <form action="login.php" method="post">
            <!-- clases Generadas Con Comandos del Framework para dar Forma Estetica -->
                Correo:
                <input class="form-control" type="text" name="user" placeholder="Introduce tu Correo"> <br>
                Contraseña:
                <input class="form-control" type="password" name="contra" placeholder="Introduce tu Contraseña"> <br>
                <button class="btn btn-success" type="submit">Iniciar Sesion</button>
        </form>
        <br>
        <a href="registro.php"><button class="btn btn-success">Registrate</button></a>

    </div>
</div>
</body>
</html>
<!-- Llama el Contenido del Pie de Pagina -->
<?php include "pie.php";?>