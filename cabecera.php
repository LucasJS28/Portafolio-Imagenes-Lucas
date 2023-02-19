<?php 
//Trae la Session Iniciada en el Login
session_start();
//Revisa si el Login no esta vacio... en caso de estarlo redirecciona al login
if(isset($_SESSION['usuario'])!="qwertyxz"){
    header("Location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio</title>
     <!-- Link Para Invocar el Framework de Bootstrap (Luego de añadirlo a las Extensiones) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<style>
    .nav-item{
        margin-left: 10px;
    }
    .Hola{
        font-family: 'Times New Roman', Times, serif;
        padding: 1%;
        font-size: 18px;
        color:white;
        position: absolute;
        right: 0;
    }

    .Perro{
        position: absolute;
        right: 0;
    }

    @media (max-width: 600px) {
        .Perro {
        position: static;
        } 
    }
</style>
</head>
<body>  
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="nav-item nav-link active" href="#" aria-current="page"><img width="60" src="imagen.png" alt=""> <span class="visually-hidden">(current)</span></a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0 ms-auto" >
                <li class="nav-item ">
                    <a class="nav-link active" href="index.php" aria-current="page">Inicio <span class="visually-hidden">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="portafolio.php">Portafolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cerrar.php">Cerrar</a>
                </li>
                <li class="nav-item Perro">
                    <a class="nav-link"><?php echo "Usuario: ".$_SESSION['usuario']?></a>
                </li>
            </ul>
        </div>
    </nav>

        <!-- Importando JS Boostrapt para Dar Funcionalidad a los Menu -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
            crossorigin="anonymous"></script>


</body>
</html>