<?php
class conexion{
    private $servidor="";
    private $usuario="";
    private $contrasenia="";
    private $conexion;
    //Constructor de la Clase Conexion
    public function __construct()
    {
        try{
            $this->conexion=new PDO("mysql:host=$this->servidor;dbname=album",$this->usuario,$this->contrasenia);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            return "Falla de Conexion".$e;
        }   
    }
    //Inserta,Borra,Modifica
    public function ejecutar($sql){
        $this->conexion->exec($sql);
        return $this->conexion->lastInsertId();
    }
    //Funcion de Mostrar en una Lista o Tabla
    public function consultar($sql){
        $sentancia=$this->conexion->prepare($sql);
        $sentancia->execute();
        return $sentancia->fetchAll(); //Retorna todos los Registros de la Sentencia
    }
}
?>     