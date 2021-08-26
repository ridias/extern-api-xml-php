<?php

    require_once('RateTable.php');

    class RateTableMiddle extends RateTable {

        private string $mid;

        public function __construct(){
            parent::__construct();
        }

        public function getMid(): string { return $this->mid; }
        
        public function setMid(string $mid): void { $this->mid = $mid; }

        public function toString(): string {
            return parent::toString() . 
                " - Mid: " . $this->mid;
        }
    }
?>