<?php
    class consultaController{
        private $model;
        
        public function __construct() {
            include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
            require_once(MODEL_PATH.'consultaModel.php');
            $this->model = new consultaModel();
        }

        public function select(){
            return ($this->model->listar()) ? $this->model->listar() : false;
        }
        
        public function search($id){
            return ($this->model->buscar($id) != false) ? $this->model->buscar($id) : header('location: ./index.php');
        }
       
        public function insert($fechaConsulta,$diagnostico,$tratamiento,$importe,$idVeterinario,$idMascota,$idUsuario){
            $id = $this->model->insertar($fechaConsulta,$diagnostico,$tratamiento,$importe,$idVeterinario,$idMascota,$idUsuario);
            return ($id!=false) ? header('location: ./index.php') : header('location: ./create.php');
        }
        
        public function update($idConsultas, $fechaConsulta,$diagnostico,$tratamiento,$importe,$idVeterinario,$idMascota,$idUsuario){
            return ($this->model->actualizar($idConsultas, $idConsultas, $fechaConsulta,$diagnostico,$tratamiento,$importe,$idVeterinario,$idMascota,$idUsuario) != false) ? header('location: ./index.php') : header('location: ./edit.php?id='.$idConsultas);
        }
        
        public function delete($id){
            return ($this->model->eliminar($id)) ? header('location: ./index.php') : header('location: ./index.php') ;
        }

        public function combolistVeterinarios(){
            return ($this->model->cargarDesplegableVeterinarios()) ? $this->model->cargarDesplegableVeterinarios() : false;
        }

        public function combolistMascotas(){
            return ($this->model->cargarDesplegableMascotas()) ? $this->model->cargarDesplegableMascotas() : false;
        }

        public function combolistUsuarios(){
            return ($this->model->cargarDesplegableUsuarios()) ? $this->model->cargarDesplegableUsuarios() : false;
        }
        
    }
?>