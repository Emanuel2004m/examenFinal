<?php
class veterinarioModel
{
    private $PDO;

    public function __construct()
    {
        //require_once ('database.php');
        include_once($_SERVER['DOCUMENT_ROOT'] . '/taller13/routes.php');
        require_once(DAO_PATH . 'database.php');
        $data = new dataConex();
        $this->PDO = $data->conexion();
    }

    public function insertar($nomVeterinario, $cni, $telefono, $idEspecialidad)
    {
        $sql = 'INSERT INTO veterinarios VALUES (0,:nomVeterinario,:cni,:telefono,:idEspecialidad)';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':nomVeterinario', $nomVeterinario);
        $statement->bindParam(':cni', $cni);
        $statement->bindParam(':telefono', $telefono);
        $statement->bindParam(':idEspecialidad', $idEspecialidad);
        $statement->execute();
        return ($this->PDO->lastInsertId());
    }

    public function actualizar($idVeterinario, $nomVeterinario, $cni, $telefono, $idEspecialidad)
    {
        $sql = 'UPDATE veterinarios SET nomVeterinario=:nomVeterinario,cni=:cni,telefono=:telefono,idEspecialidad=:idEspecialidad WHERE idVeterinario=:idVeterinario';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':nomVeterinario', $nomVeterinario);
        $statement->bindParam(':cni', $cni);
        $statement->bindParam(':telefono', $telefono);
        $statement->bindParam(':idEspecialidad', $idEspecialidad);
        $statement->bindParam(':idVeterinario', $idVeterinario);
        return ($statement->execute()) ? true : false;
    }

    public function eliminar($idVeterinario)
    {
        $sql = 'DELETE  FROM veterinarios WHERE idVeterinario=:idVeterinario';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':idVeterinario', $idVeterinario);
        return ($statement->execute()) ? true : false;
    }


    public function listar()
    {

        $sql = 'SELECT e.idVeterinario,e.nomVeterinario,e.cni,e.telefono,e.idEspecialidad,c.descripcion as especialidad FROM veterinarios e
            JOIN especialidad c ON e.idEspecialidad = c.idEspecialidad ORDER BY idVeterinario DESC';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }
    public function cargarDesplegable()
    {

        $sql = 'SELECT idEspecialidad,descripcion FROM especialidad ORDER BY idEspecialidad ASC';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function buscar($idVeterinario)
    {
        $sql = 'SELECT e.idVeterinario,e.nomVeterinario,e.cni,e.telefono,e.idEspecialidad,c.descripcion as especialidad FROM veterinarios e
            JOIN especialidad c ON e.idEspecialidad = c.idEspecialidad ORDER BY idVeterinario DESC';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':idVeterinario', $idVeterinario);
        return ($statement->execute()) ? $statement->fetch() : false;
    }
}
