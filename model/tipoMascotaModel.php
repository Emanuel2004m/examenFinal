<?php
    class tipoMascotaModel{
        private $PDO;

        public function __construct(){
            //require_once ('../database.php');
            include_once($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
            require_once(DAO_PATH.'database.php');
            $data = new dataConex();
            $this->PDO = $data->conexion();
        }
        public function listar() {
            $sql = 'SELECT idTipo, descripcion FROM tipoMascota ORDER BY idTipo DESC';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }

        public function buscar($idTipo) {
            $sql = 'SELECT idTipo, descripcion FROM tipoMascota WHERE idTipo = :idTipo';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':idTipo',$idTipo);
            return ($statement->execute()) ? $statement->fetch() : false;
        }

        public function insertar($descripcion) {
            $sql = 'INSERT INTO tipoMascota VALUES (0,:descripcion)';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':descripcion',$descripcion);
            $statement->execute();
            return ($this->PDO->lastInsertId());
        }

        public function actualizar($idTipo,$descripcion) {
            $sql = 'UPDATE tipoMascota SET descripcion=:descripcion WHERE idTipo=:idTipo';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':idTipo',$idTipo);
            $statement->bindParam(':descripcion',$descripcion);
            return ($statement->execute()) ? true : false;
        }

        public function eliminar($idTipo) {
                $sql = 'DELETE FROM tipoMascota WHERE idTipo=:idTipo';
                $statement = $this->PDO->prepare($sql);
                $statement->bindParam(':idTipo',$idTipo);
                return ($statement->execute()) ? true : false;
        }
    }
?>