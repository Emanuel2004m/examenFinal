<?php
    class mascotaController{
        private $model;
        
        public function __construct() {
            include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
            require_once(MODEL_PATH.'mascotaModel.php');
            $this->model = new mascotaModel();
        }
       
        public function insert($nomMascota,$servicio,$idTipo, $idRaza, $idCliente){
            $id = $this->model->insertar($nomMascota,$servicio,$idTipo, $idRaza, $idCliente);
            return ($id!=false) ? header('location: ./index.php') : header('location: ./create.php');
        }
        
        public function update($idMascota, $nomMascota,$servicio,$idTipo, $idRaza, $idCliente){
            return ($this->model->actualizar($idMascota, $nomMascota,$servicio,$idTipo, $idRaza, $idCliente) != false) ? header('location: ./index.php') : header('location: ./edit.php?id='.$idMascota);
        }
        
        public function delete($id){
            return ($this->model->eliminar($id)) ? header('location: ./index.php') : header('location: ./index.php') ;
        }
        
        public function search($id){
            return ($this->model->buscar($id) != false) ? $this->model->buscar($id) : header('location: ./index.php');
        }

        public function select(){
            return ($this->model->listar()) ? $this->model->listar() : false;
        }

        public function combolisttipo(){
            return ($this->model->cargarDesplegableTipo()) ? $this->model->cargarDesplegableTipo() : false;
        }

        public function combolistraza(){
            return ($this->model->cargarDesplegableRaza()) ? $this->model->cargarDesplegableRaza() : false;
        }

        public function combolistcliente(){
            return ($this->model->cargarDesplegableCliente()) ? $this->model->cargarDesplegableCliente() : false;
        }
        
    }
?>