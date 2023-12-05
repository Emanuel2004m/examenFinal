<?php
    class rolesModel{
        private $PDO;

        public function __construct(){
            //require_once ('../database.php');
            include_once($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
            require_once(DAO_PATH.'database.php');
            $data = new dataConex();
            $this->PDO = $data->conexion();
        }
        public function listar() {
            $sql = 'SELECT idRol, descripcion FROM roles ORDER BY idRol DESC';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }

        public function buscar($idRol) {
            $sql = 'SELECT idRol, descripcion FROM roles WHERE idRol = :idRol';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':idRol',$idRol);
            return ($statement->execute()) ? $statement->fetch() : false;
        }

        public function insertar($descripcion) {
            $sql = 'INSERT INTO roles VALUES (0,:descripcion)';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':descripcion',$descripcion);
            $statement->execute();
            return ($this->PDO->lastInsertId());
        }

        public function actualizar($idRol,$descripcion) {
            $sql = 'UPDATE roles SET descripcion=:descripcion WHERE idRol=:idRol';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':idRol',$idRol);
            $statement->bindParam(':descripcion',$descripcion);
            return ($statement->execute()) ? true : false;
        }

        public function eliminar($idRol) {
                $sql = 'DELETE FROM roles WHERE idRol=:idRol';
                $statement = $this->PDO->prepare($sql);
                $statement->bindParam(':idRol',$idRol);
                return ($statement->execute()) ? true : false;
        }
    }
?>