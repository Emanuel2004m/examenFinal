<?php
    class formaPagoModel{
        private $PDO;

        public function __construct(){
            //require_once ('../database.php');
            include_once($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
            require_once(DAO_PATH.'database.php');
            $data = new dataConex();
            $this->PDO = $data->conexion();
        }
        public function listar() {
            $sql = 'SELECT idFormaPago, descripcion FROM formapago ORDER BY idFormaPago DESC';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }

        public function buscar($idFormaPago) {
            $sql = 'SELECT idFormaPago, descripcion FROM formapago WHERE idFormaPago = :idFormaPago';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':idFormaPago',$idFormaPago);
            return ($statement->execute()) ? $statement->fetch() : false;
        }

        public function insertar($descripcion) {
            $sql = 'INSERT INTO formapago VALUES (0,:descripcion)';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':descripcion',$descripcion);
            $statement->execute();
            return ($this->PDO->lastInsertId());
        }

        public function actualizar($idFormaPago,$descripcion) {
            $sql = 'UPDATE formapago SET descripcion=:descripcion WHERE idFormaPago=:idFormaPago';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':idFormaPago',$idFormaPago);
            $statement->bindParam(':descripcion',$descripcion);
            return ($statement->execute()) ? true : false;
        }

        public function eliminar($idFormaPago) {
                $sql = 'DELETE FROM formapago WHERE idFormaPago=:idFormaPago';
                $statement = $this->PDO->prepare($sql);
                $statement->bindParam(':idFormaPago',$idFormaPago);
                return ($statement->execute()) ? true : false;
        }
    }
?>