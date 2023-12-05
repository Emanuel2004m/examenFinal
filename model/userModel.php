<?php
    class userModel {
        private $PDO;
        
        public function __construct(){
            include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
            require_once(DAO_PATH.'database.php');
            $data = new dataConex();
            $this->PDO = $data->conexion();
        }
        
        public function listar() {
            $sql = 'SELECT * FROM usuarios ORDER BY idUsuario';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }   

        public function buscar($idUsuario) {
            $sql = 'SELECT idUsuario, alias, clave FROM usuarios WHERE idUsuario = :idUsuario';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':idUsuario',$idUsuario);
            return ($statement->execute()) ? $statement->fetch() : false;
        }

        public function insertar($alias, $clave) {
            $sql = 'INSERT INTO usuarios VALUES (0,:alias,:clave)';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':alias',$alias);
            $statement->bindParam(':clave',$clave);
            $statement->execute();
            return ($this->PDO->lastInsertId());
        }

        public function actualizar($idUsuario,$alias,$clave) {
            $sql = 'UPDATE usuarios SET alias=:alias, clave=:clave WHERE idUsuario=:idUsuario';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':idUsuario',$idUsuario);
            $statement->bindParam(':alias',$alias);
            $statement->bindParam(':clave',$clave);
            return ($statement->execute()) ? true : false;
        }

        public function eliminar($idUsuario) {
                $sql = 'DELETE FROM usuarios WHERE idUsuario=:idUsuario';
                $statement = $this->PDO->prepare($sql);
                $statement->bindParam(':idUsuario',$idUsuario);
                return ($statement->execute()) ? true : false;
        }
    }
?>