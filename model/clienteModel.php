<?php
    class clienteModel {
        private $PDO;

        public function __construct() {
            //require_once ('database.php');
            include_once($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
            require_once(DAO_PATH.'database.php');
            $data = new dataConex();
            $this->PDO = $data->conexion();
        }

        public function insertar($nomCliente,$cni,$direccion,$telefono){
            $sql = 'INSERT INTO clientes VALUES (0,:nomCliente,:cni,:direccion,:telefono)';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':nomCliente',$nomCliente);
            $statement->bindParam(':cni',$cni);
            $statement->bindParam(':direccion',$direccion);
            $statement->bindParam(':telefono',$telefono);
            $statement->execute();
            return ($this->PDO->lastInsertId());
        }

        public function actualizar($idCliente,$nomCliente,$cni,$direccion,$telefono){
            $sql = 'UPDATE clientes SET nomCliente=:nomCliente,cni=:cni,direccion=:direccion,telefono=:telefono WHERE idCliente=:idCliente';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':idCliente',$idCliente);
            $statement->bindParam(':nomCliente',$nomCliente);
            $statement->bindParam(':cni',$cni);
            $statement->bindParam(':direccion',$direccion); 
            $statement->bindParam(':telefono',$telefono);
            return ($statement->execute()) ? true : false;
        }

        public function eliminar($idCliente){
            $sql = 'DELETE  FROM clientes WHERE idCliente=:idCliente';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':idCliente',$idCliente);
            return ($statement->execute()) ? true : false;
        }


        public function listar() {
            $sql = 'SELECT idCliente,nomCliente,cni,direccion,telefono FROM clientes ORDER BY idCliente DESC';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }
        public function buscar($idCliente) {
            $sql = 'SELECT idCliente,nomCliente,cni,direccion,telefono FROM clientes ORDER BY idCliente DESC';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':idCliente',$idCliente);
            return ($statement->execute()) ? $statement->fetch() : false;                                                       
        }
        
    }
?>