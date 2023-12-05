<?php
    class especialidadModel{
        private $PDO;

        public function __construct(){
            //require_once ('../database.php');
            include_once($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
            require_once(DAO_PATH.'database.php');
            $data = new dataConex();
            $this->PDO = $data->conexion();
        }
        public function listar() {
            $sql = 'SELECT idEspecialidad, descripcion FROM especialidad ORDER BY idEspecialidad DESC';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }

        public function buscar($idEspecialidad) {
            $sql = 'SELECT idEspecialidad, descripcion FROM especialidad WHERE idEspecialidad = :idEspecialidad';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':idEspecialidad',$idEspecialidad);
            return ($statement->execute()) ? $statement->fetch() : false;
        }

        public function insertar($descripcion) {
            $sql = 'INSERT INTO especialidad VALUES (0,:descripcion)';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':descripcion',$descripcion);
            $statement->execute();
            return ($this->PDO->lastInsertId());
        }

        public function actualizar($idEspecialidad,$descripcion) {
            $sql = 'UPDATE especialidad SET descripcion=:descripcion WHERE idEspecialidad=:idEspecialidad';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':idEspecialidad',$idEspecialidad);
            $statement->bindParam(':descripcion',$descripcion);
            return ($statement->execute()) ? true : false;
        }

        public function eliminar($idEspecialidad) {
                $sql = 'DELETE FROM especialidad WHERE idEspecialidad=:idEspecialidad';
                $statement = $this->PDO->prepare($sql);
                $statement->bindParam(':idEspecialidad',$idEspecialidad);
                return ($statement->execute()) ? true : false;
        }
    }
?>