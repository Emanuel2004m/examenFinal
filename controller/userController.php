<?php
    class userController{
        private $model;
        
        public function __construct() {
            include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
            require_once(MODEL_PATH.'userModel.php');
            $this->model = new userModel();
        }

        public function select(){
            return ($this->model->listar()) ? $this->model->listar() :false;
        }
        public function insert($alias,$clave) {
            $id = $this->model->insertar($alias,$clave);
            return ($id!=false) ? header('location: ./index.php') : header('location: ./create.php');
        }
        public function update($id,$alias,$clave) {
            return ($this->model->actualizar($id,$alias,$clave) != false) ? header('location: ./index.php') : header('location: ./edit.php?id='.$id);
        }

        public function delete($id) {
            return ($this->model->eliminar($id)) ? header('location: ./index.php') : header('location: ./index.php') ;
        }

        public function search($id) {
            return ($this->model->buscar($id) != false) ? $this->model->buscar($id) : header('location: ./index.php');
        }
    }
?>