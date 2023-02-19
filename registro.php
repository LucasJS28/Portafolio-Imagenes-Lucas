<?php
$host="";
$user="";
$pass="";
$db="";
$conn = new mysqli($host, $user, $pass, $db);
if($_POST){
    try{
        $correo=$_POST['correo'];
        $contra=$_POST['contra'];
        $contra2=$_POST['contra1'];
        if($contra==$contra2){
            $sql="INSERT INTO `usuarios` (`id`, `correo`, `contra`) VALUES (NULL, '$correo', '$contra');";
            if ($conn->query($sql) == true) {
                echo "<script> alert ('Te Registraste');</script>";
               }else {
                echo "Error: ".$sql ."<br>";
               }
        }else{
            echo"Las Contraseñas deben ser iguales";
        }
        }catch(mysqli_sql_exception $ex){
            echo "Este Correo se Encuentra Registrado";
        }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <form action="registro.php" method="post">
    <div class="card">
        <div class="card-header">
            <a href="login.php"> <button type="button" class="btn btn-primary">Volver</button></a>
        </div>
        <div class="card-header">
            Registrate
        </div>
        <div class="card-body">
            Correo:
            <input class="form-control" type="text" name="correo" placeholder="Ingresa tu Correo"><br>
            Contraseña:
            <input class="form-control" type="password" name="contra" placeholder="Ingresa tu Contraseña: "><br>
            Repetir Contraseña:
            <input class="form-control" type="password" name="contra1" placeholder="Repite tu Contraseña:"><br>
            <input class="btn btn-success" type="submit" value="Registrarte">
        </div>

        <div class="card-footer text-muted">
            Pagina Creada por Lucas
        </div>
    </div>

    
    </form>
</body>
</html>