<?php
    class facturaController{
        private $model;
        
        public function __construct() {
            include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
            require_once(MODEL_PATH.'facturaModel.php');
            $this->model = new facturaModel();
        }

        public function search($factura){
            return ($this->model->buscar($factura) != false) ? $this->model->buscar($factura) : false;
        }

        public function select(){
            return ($this->model->listar()!= false) ? $this->model->listar() : false;
        }

        public function listconsultas(){
            return ($this->model->listarConsultas()!= false) ? $this->model->listarConsultas() : false;
        }
        
        public function combolistcliente(){
            return ($this->model->cargarClientes()!= false) ? $this->model->cargarClientes() : false;
        }

        public function listcliente($idCliente){
            return ($this->model->cargarClientesID($idCliente) != false) ? $this->model->cargarClientesID($idCliente) : false;
        }

        public function combolistformapagos(){
            return ($this->model->cargarFormPagos()!= false) ? $this->model->cargarFormPagos() : false;
        }

        public function insert($fecha,$idUsuario,$idEstudiante,$idFormaPago){
            $id = $this->model->insertar($fecha,$idUsuario,$idEstudiante,$idFormaPago);
            return ($id != false) ? $id : false;
        }

        public function insertdetail($numero,$idConsulta,$importe){
            $id = $this->model->insertarDetalle($numero,$idConsulta,$importe);
            return ($id != false) ? $id : false;
        }
        
        public function update($numero){
            return ($this->model->actualizar($numero) != false) ? header('location: ./index.php') : false;
        }
    }
?>