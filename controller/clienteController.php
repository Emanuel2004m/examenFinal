<?php
    class clienteController{
        private $model;

        public function __construct(){
            include_once($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
            require_once(MODEL_PATH.'clienteModel.php');
            $this->model = new clienteModel();
        }

        public function insert($nomCliente,$cni,$direccion,$telefono){
            $id = $this->model->insertar($nomCliente,$cni,$direccion,$telefono);
            return ($id!=false) ? header('location: ./index.php'): header ('location: ./create.php');
        }

        public function update($id,$nomCliente,$cni,$direccion,$telefono){
            return ($this->model->actualizar($id,$nomCliente,$cni,$direccion,$telefono) !=false) ? header('location: ./index.php'): header ('location: ./edit.php?id='.$id);
        }

        public function delete($id){
            return ($this->model->eliminar($id)) ? header('location: ./index.php'): header ('location: ./index.php');
        }

        public function search($id){
            return ($this->model->buscar($id)) !=false ? $this->model->buscar($id): header ('location: ./index.php');
        }
            
        public function select(){
            return ($this->model->listar()) ? $this->model->listar(): false;
        }
    }
?>