<?php
    class consultaModel {
        private $PDO;
        
        public function __construct(){
            include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
            require_once(DAO_PATH.'database.php');
            $data = new dataConex();
            $this->PDO = $data->conexion();
        }
        public function listar() {
            $sql = 'SELECT c.idConsultas, c.fechaConsulta, c.diagnostico, c.tratamiento, c.importe, c.idVeterinario, v.nomVeterinario, c.idMascota, m.nomMascota, c.idUsuario, u.alias FROM consultas c JOIN veterinarios v ON c.idVeterinario = v.idVeterinario JOIN mascotas m ON c.idMascota = m.idMascota JOIN usuarios u ON c.idUsuario = u.idUsuario ORDER BY idConsultas DESC';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }

        public function buscar($idConsultas) {
            $sql = 'SELECT c.idConsultas, c.fechaConsulta, c.diagnostico, c.tratamiento, c.importe, c.idVeterinario, c.idMascota, c.idUsuario FROM consultas c JOIN veterinarios v ON c.idVeterinario = v.idVeterinario JOIN mascotas m ON c.idMascota = m.idMascota JOIN usuarios u ON c.idUsuario = u.idUsuario WHERE idConsultas = :idConsultas';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':idConsultas',$idConsultas);
            return ($statement->execute()) ? $statement->fetch() : false;
        }

        public function insertar($fechaConsulta,$diagnostico,$tratamiento,$importe,$idVeterinario,$idMascota,$idUsuario) {
            $sql = 'INSERT INTO consultas VALUES (0,:fechaConsulta,:diagnostico,:tratamiento,:importe,:idVeterinario,:idMascota,:idUsuario)';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':fechaConsulta',$fechaConsulta);
            $statement->bindParam(':diagnostico',$diagnostico);
            $statement->bindParam(':tratamiento',$tratamiento);
            $statement->bindParam(':importe',$importe);
            $statement->bindParam(':idVeterinario',$idVeterinario);
            $statement->bindParam(':idMascota',$idMascota);
            $statement->bindParam(':idUsuario',$idUsuario);
            $statement->execute();
            return ($this->PDO->lastInsertId());
        }

        public function actualizar($idConsultas, $fechaConsulta,$diagnostico,$tratamiento,$importe,$idVeterinario,$idMascota,$idUsuario) {
            $sql = 'UPDATE consultas SET fechaConsulta=:fechaConsulta,diagnostico=:diagnostico,tratamiento=:tratamiento,importe=:importe,idVeterinario=:idVeterinario,idMascota=:idMascota,idUsuario=:idUsuario WHERE idConsultas=:idConsultas';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':idConsultas',$idConsultas);
            $statement->bindParam(':fechaConsulta',$fechaConsulta);
            $statement->bindParam(':diagnostico',$diagnostico);
            $statement->bindParam(':tratamiento',$tratamiento);
            $statement->bindParam(':importe',$importe);
            $statement->bindParam(':idVeterinario',$idVeterinario);
            $statement->bindParam(':idMascota',$idMascota);
            $statement->bindParam(':idUsuario',$idUsuario);
            return ($statement->execute()) ? true : false;
        }

        public function eliminar($idConsultas) {
                $sql = 'DELETE FROM consultas WHERE idConsultas=:idConsultas';
                $statement = $this->PDO->prepare($sql);
                $statement->bindParam(':idConsultas',$idConsultas);
                return ($statement->execute()) ? true : false;
        }
        
        public function cargarDesplegableVeterinarios() {
            $sql = 'SELECT idVeterinario,nomVeterinario FROM veterinarios ORDER BY idVeterinario ASC';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }
        
        public function cargarDesplegableMascotas() {
            $sql = 'SELECT idMascota,nomMascota FROM mascotas ORDER BY idMascota ASC';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }
        
        public function cargarDesplegableUsuarios() {
            $sql = 'SELECT idUsuario,alias FROM usuarios ORDER BY idUsuario ASC';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }
}
?>