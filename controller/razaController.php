<?php
    class razaController{
        private $model;

        public function __construct(){
            include_once($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
            require_once(MODEL_PATH.'razaModel.php');
            $this->model = new razaModel();
        }
        public function select(){
            return ($this->model->listar()) ? $this->model->listar() :false;
        }
        public function insert($descripcion) {
            $id = $this->model->insertar($descripcion);
            return ($id!=false) ? header('location: ./index.php') : header('location: ./create.php');
        }
        public function update($id,$descripcion) {
            return ($this->model->actualizar($id,$descripcion) != false) ? header('location: ./index.php') : header('location: ./edit.php?id='.$id);
        }

        public function delete($id) {
            return ($this->model->eliminar($id)) ? header('location: ./index.php') : header('location: ./index.php') ;
        }

        public function search($id) {
            return ($this->model->buscar($id) != false) ? $this->model->buscar($id) : header('location: ./index.php');
        }
    }
?>