<?php
    class razaModel{
        private $PDO;

        public function __construct(){
            //require_once ('../database.php');
            include_once($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
            require_once(DAO_PATH.'database.php');
            $data = new dataConex();
            $this->PDO = $data->conexion();
        }
        public function listar() {
            $sql = 'SELECT idRaza, descripcion FROM raza ORDER BY idRaza DESC';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }

        public function buscar($idRaza) {
            $sql = 'SELECT idRaza, descripcion FROM raza WHERE idRaza = :idRaza';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':idRaza',$idRaza);
            return ($statement->execute()) ? $statement->fetch() : false;
        }

        public function insertar($descripcion) {
            $sql = 'INSERT INTO raza VALUES (0,:descripcion)';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':descripcion',$descripcion);
            $statement->execute();
            return ($this->PDO->lastInsertId());
        }

        public function actualizar($idRaza,$descripcion) {
            $sql = 'UPDATE raza SET descripcion=:descripcion WHERE idRaza=:idRaza';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':idRaza',$idRaza);
            $statement->bindParam(':descripcion',$descripcion);
            return ($statement->execute()) ? true : false;
        }

        public function eliminar($idRaza) {
                $sql = 'DELETE FROM raza WHERE idRaza=:idRaza';
                $statement = $this->PDO->prepare($sql);
                $statement->bindParam(':idRaza',$idRaza);
                return ($statement->execute()) ? true : false;
        }
    }
?>