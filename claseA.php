<?php 
    // Creamos la clase para visualizar las diferentes tipos de actividades
    class Actividades {
        public $titulo;
        public $tipoActividad;
        //este es el contructor con sus parametros para que se cree una clase.
        function __construct($titulo, $tipoActividad){
            $this->titulo = $titulo;
            $this->tipoActividad = $tipoActividad;
        }
        function getTitulo(){
            return $this->titulo;
        }
        function getTipoActividad(){
            return $this->tipoActividad;
        }
    }
?>