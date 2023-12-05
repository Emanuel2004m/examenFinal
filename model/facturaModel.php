<?php
class facturaModel
{
    private $PDO;

    public function __construct()
    {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/proyectoVeterinaria/routes.php');
        require_once(DAO_PATH . 'database.php');
        $data = new dataConex();
        $this->PDO = $data->conexion();
    }

    public function listar()
    {
        $sql = 'SELECT f.numero,f.fecha,c.nomCliente,c.cni,d.importe FROM facturas f JOIN detallefacturas d ON f.numero=d.numero JOIN clientes c ON f.idCliente=c.idCliente WHERE f.anulada=0 ORDER BY f.numero DESC';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function listarConsultas()
    {
        $sql = 'SELECT * FROM consultas ORDER BY idConsultas';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function buscar($factura)
    {
        $sql = 'SELECT * FROM facturas WHERE numero=:numero';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':numero', $factura);
        return ($statement->execute()) ? $statement->fetch() : false;
    }

    public function insertar($fecha, $idUsuario, $idCliente, $idFormaPago)
    {
        $sql = 'INSERT INTO facturas VALUES (0,CURRENT_DATE(),:idUsuario,:idCliente,:idFormaPago,0)';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':idUsuario', $idUsuario);
        $statement->bindParam(':idCliente', $idCliente);
        $statement->bindParam(':idFormaPago', $idFormaPago);
        $statement->execute();
        return ($this->PDO->lastInsertId());
    }

    public function insertarDetalle($numero, $idConsultas, $importe)
    {
        $sql = 'INSERT INTO detallefacturas VALUES (:numero,:idConsultas,:importe)';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':numero', $numero);
        $statement->bindParam(':idConsultas', $idConsultas);
        $statement->bindParam(':importe', $importe);
        $statement->execute();
        return ($this->PDO->lastInsertId());
    }

    public function cargarClientesID($idCliente)
    {
        $sql = 'SELECT idCliente,nomCliente,cni,direccion,telefono FROM clientes ORDER BY nomCliente DESC';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':idCliente', $idCliente);
        return ($statement->execute()) ? $statement->fetch() : false;
    }

    public function actualizar($numero)
    {
        $sql = 'UPDATE facturas SET anulada=1 WHERE numero=:numero';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':numero', $numero);
        return ($statement->execute()) ? true : false;
    }

    public function cargarClientes()
    {
        $sql = 'SELECT c.idCliente,c.nomCliente FROM clientes c ORDER BY c.nomCliente';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function cargarFormPagos()
    {
        $sql = 'SELECT f.idFormaPago,f.descripcion FROM formapago f ORDER by f.idFormaPago';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }
}
