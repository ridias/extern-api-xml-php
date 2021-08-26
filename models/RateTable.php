<?php

    abstract class RateTable {

        private string $currency;
        private string $code;

        public function __construct(){

        }

        public function setCurrency(string $currency): void { $this->currency = $currency; }
        public function setCode(string $code): void { $this->code = $code; }

        public function getCurrency(): string { return $this->currency; }
        public function getCode(): string { return $this->code; }

        public function toString(): string {
            return "Currency: " . $this->getCurrency() . 
                " - Code: " . $this->getCode();
        }
    }
?>