<?php

    class CenaZlota {

        private string $data;
        private string $cena;


        public function __construct(){

        }

        public function getData(): string { return $this->data; }
        public function getCena(): string { return $this->cena; }

        public function setData(string $data): void { $this->data = $data; }
        public function setCena(string $cena): void { $this->cena = $cena; }

        public function toString(): string {
            return "Data: " . $this->data . " - Cena: " . $this->cena;
        }
    }
?>