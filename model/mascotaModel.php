<?php
class mascotaModel
{
    private $PDO;

    public function __construct()
    {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/proyectoVeterinaria/routes.php');
        require_once(DAO_PATH . 'database.php');
        $data = new dataConex();
        $this->PDO = $data->conexion();
    }

    public function insertar($nomMascota, $servicio, $idTipo, $idRaza, $idCliente)
    {
        $sql = 'INSERT INTO mascotas VALUES (0,:nomMascota,:servicio,:idTipo,:idRaza,:idCliente)';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':nomMascota', $nomMascota);
        $statement->bindParam(':servicio', $servicio);
        $statement->bindParam(':idTipo', $idTipo);
        $statement->bindParam(':idRaza', $idRaza);
        $statement->bindParam(':idCliente', $idCliente);
        $statement->execute();
        return ($this->PDO->lastInsertId());
    }

    public function actualizar($idMascota, $nomMascota, $servicio, $idTipo, $idRaza, $idCliente)
    {
        $sql = 'UPDATE mascotas SET nomMascota=:nomMascota,servicio=:servicio,idTipo=:idTipo,idRaza=:idRaza,idCliente=:idCliente WHERE idMascota=:idMascota';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':idMascota', $idMascota);
        $statement->bindParam(':nomMascota', $nomMascota);
        $statement->bindParam(':servicio', $servicio);
        $statement->bindParam(':idTipo', $idTipo);
        $statement->bindParam(':idRaza', $idRaza);
        $statement->bindParam(':idCliente', $idCliente);
        return ($statement->execute()) ? true : false;
    }

    public function eliminar($idMascota)
    {
        $sql = 'DELETE FROM mascotas WHERE idMascota=:idMascota';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':idMascota', $idMascota);
        return ($statement->execute()) ? true : false;
    }
    public function listar()
    {
        $sql = 'SELECT m.idMascota, m.nomMascota, m.servicio, m.idTipo, t.descripcion, m.idRaza, r.descripcion, m.idCliente, c.nomCliente FROM mascotas m JOIN tipoMascota t ON m.idTipo = t.idTipo JOIN raza r ON m.idRaza = r.idRaza JOIN clientes c ON m.idCliente = c.idCliente ORDER BY idMascota DESC';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function cargarDesplegableTipo()
    {
        $sql = 'SELECT idTipo,descripcion FROM tipoMascota ORDER BY idTipo ASC';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function cargarDesplegableRaza()
    {
        $sql = 'SELECT idRaza,descripcion FROM raza ORDER BY idRaza ASC';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function cargarDesplegableCliente()
    {
        $sql = 'SELECT idCliente,nomCliente FROM clientes ORDER BY idCliente ASC';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function buscar($idMascota)
    {
        $sql = 'SELECT m.idMascota, m.nomMascota, m.servicio, m.idTipo, t.descripcion, m.idRaza, r.descripcion, m.idCliente, c.nomCliente FROM mascotas m JOIN tipoMascota t ON m.idTipo = t.idTipo JOIN raza r ON m.idRaza = r.idRaza JOIN clientes c ON m.idCliente = c.idCliente WHERE idMascota = :idMascota';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':idMascota', $idMascota);
        return ($statement->execute()) ? $statement->fetch() : false;
    }
}
