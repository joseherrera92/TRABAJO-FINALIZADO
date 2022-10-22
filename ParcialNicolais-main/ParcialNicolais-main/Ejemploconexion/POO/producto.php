<?php
    class Producto{
        //ATRIBUTOS...
        private $cod;
        private $nombre;
        private $cant;
        private $precio;
        //METODO CONSTRUCTOR...
        public function __construct()
        {
            $this->cod = "0";
            $this->nombre = "vacio";
            $this->cant = null;
            $this->precio = null;
        }

        //METODOS SET...
        public function setCod($_cod){
            $this->cod = $_cod;
        }

        public function setNombre($_nombre){
            $this->nombre = $_nombre;
        }

        public function setCant($_cant){
            $this->cant = $_cant;
        }

        public function setPrecio($_precio){
            $this->precio = $_precio;
        }
        //METODOS GET...
        public function getCod(){
            return $this->cod;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function getCant(){
            return $this->cant;
        }

        public function getPrecio(){
            return $this->precio;
        }
    }
?>