<!-- Invoca el Contenido de la Cabecera y Importa el Metodo conexion -->
<?php include "cabecera.php";?>
<?php include "conexion.php";?>
<?php

//Ingresa los Valores a la BDD
if($_POST){
    //Asigna el Valor a una Variable a traves del metodo POST
    $nombre=$_POST['nombre'];
    $descripcion=$_POST['descripcion'];
    //Asigna la Fecha a las Imagenes
    $fecha=new DateTime();
    //Selecciona el Nombre del Archivo y le asigna una fecha
    $img=$fecha->getTimestamp()."_".$_FILES['archivo']['name'];
    //Seleciona solo el nombre del Archivo en Cuestion
    $img=$_FILES['archivo']['name'];
    $imagen_temporal=$_FILES['archivo']['tmp_name'];
    //Mueve el Archivo Descargado a la Carpeta imagenes
    move_uploaded_file($imagen_temporal,"imagenes/".$img);
    //Genera la Conexion
    $objconexion = new conexion();
    //Inserta la Informacion
    $sql="INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `Descripcion`) VALUES (NULL, '$nombre', '$img', '$descripcion');";
    //Ejecuta el Query
    $objconexion->ejecutar($sql);
}
//Borra el Objeto a traves del Metodo GET 
if($_GET){
    $objconexion=new conexion();
    $sql="DELETE FROM proyectos WHERE `proyectos`.`id` = ".$_GET['borrar'];
    $objconexion->ejecutar($sql);
}
//Crea el Objeto de Tipo conexion
$objconexion=new conexion();
//Envia la Query Select para Mostrar los Datos
$proyectos=$objconexion->consultar("SELECT * FROM `proyectos`");
?>
<!-- Diseño invocado con: bs5-card-head-foot  -->
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
        <div class="card">
    <div class="card-header">
        Datos del Proyecto
    </div>
    <div class="card-body">
    <!-- enctype="multipart/form-data" Sirve Para mandar a traves del POST Archivos tipo File-->
    <form action="portafolio.php" method="post" enctype="multipart/form-data">
    
    Nombre del Proyecto: <input class="form-control" type="text" name="nombre" id=""><br>
    <br> 
    Imagen del Proyecto: <input class="form-control" type="file" name="archivo" id=""><br>
    <br>
    Descripcion:<textarea class="form-control" name="descripcion" id="" rows="5"></textarea>
    <!-- Boton de Envio -->
    <br><input type="submit" class="btn btn-success" value="Enviar Proyecto">
    </form>
    </div>
</div>
    <!-- Diseño de la tabla generado con: bs5-table-default -->
        </div>
        <div class="col-md-6">
        <div class="table-responsive">
    <table class="table table-primary" border=" 6px solid">
        <thead>
            <tr>
                <!-- Asigna el Nombre de las Columas -->
                <th> ID</th>
                <th> Nombre</th>
                <th> Imagen</th>
                <th> Descripcion</th>
                <th> Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Rellena las Filas con un Foreach -->
            <?php  foreach($proyectos as $proyecto){ ?>
            <tr >
                <td><?php echo $proyecto['id'];?></td>
                <td><?php echo $proyecto['nombre'];?></td>
                <td><?php echo $proyecto['imagen'];?></td>
                <td><?php echo $proyecto['Descripcion'];?></td>
                <!-- Asigna un Boton de Borrar dentro de una Fila -->
                <td><a class="btn btn-danger" href="?borrar=<?php echo $proyecto['id'];?>">Eliminar</a></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>
        </div>
    </div>
</div>
<br>
<!-- Llama el Contenido del Pie de Pagina -->
<?php include "pie.php";?>
