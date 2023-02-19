<!-- Trae la Informacion de el Archivo Cabecera y Conexion -->
<?php include "cabecera.php";?>
<?php include "conexion.php";?>
<?php
//Abre la Conexion
$objconexion=new conexion();
//Envia la Query Select para Mostrar los Datos
$proyectos=$objconexion->consultar("SELECT * FROM `(Base de Datos)`");

?>
<style>
  .card-img-top{
    width: 200px;
    height: 200px;
    display: flex;
    margin-left: 35%;
  }
</style>
<!-- Codigo Generado con Bootstrap -->
<div class="p-5 bg-light">
    <div class="container">
        <h1 class="display-3">Bienvenidos</h1>
        <p class="lead">Portafolio Privado Creado por Lucas Jimenez</p>
        <hr class="my-2">
        <p><a href="">Mas Informacion</a></p>
    </div> 
</div>
<div class="row row-cols-1 row-cols-md-3 g-4 p-2">
<!-- Recorre la lista de Archivos en Proyecto -->
<?php  foreach($proyectos as $proyecto){ ?>
  <div class="col">
    <div class="card">
        <!-- Invoca la Imagen con un comando PHP dentro de la bdd -->
        <img src="imagenes/<?php echo $proyecto['imagen'];?>" class="card-img-top" alt="...">
        <div class="card-body">
            <!-- Invoca la Nombre con un comando PHP dentro de la bdd -->
        <h5 class="card-title"><?php echo $proyecto['nombre'];?></h5>
        <!-- Invoca la Descripcion con un comando PHP dentro de la bdd -->
        <p class="card-text"><?php echo $proyecto['Descripcion'];?></p>
      </div>
    </div>
  </div>
<?php }?>
</div>
<!-- Trae la Informacion del Archivo pie que asigna el Pie de pagina -->
<?php include "pie.php";?>


