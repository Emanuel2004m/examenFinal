<?php
    class veterinarioController{
        private $model;

        public function __construct(){
            include_once($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinario/routes.php');
            require_once(MODEL_PATH.'veterinarioModel.php');
            $this->model = new veterinarioModel();
        }

        public function insert($nomVeterinario,$cni,$telefono,$idEspecialidad){
            $id = $this->model->insertar($nomVeterinario,$cni,$telefono,$idEspecialidad);
            return ($id!=false) ? header('location: ./index.php'): header ('location: ./create.php');
        }

        public function update($id,$nomVeterinario,$cni,$telefono,$idEspecialidad){
            return ($this->model->actualizar($id,$nomVeterinario,$cni,$telefono,$idEspecialidad) !=false) ? header('location: ./index.php'): header ('location: ./edit.php?id='.$id);
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

        public function combolist(){
            return ($this->model->cargarDesplegable()) ? $this->model->cargarDesplegable(): false;
        }


    }
?>