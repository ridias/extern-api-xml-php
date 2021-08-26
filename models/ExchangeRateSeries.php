<?php

    class ExchangeRateSeries {

        private string $table;
        private string $currency;
        private string $code;
        private array $ratesSeries;

        public function __constructor(){

        }

        public function getTable(): string { return $this->table; }
        public function getCurrency(): string { return $this->currency; }
        public function getCode(): string { return $this->code; }
        public function getRatesSeries(): array { return $this->ratesSeries; }

        public function setTable(string $value): void { $this->table = $value; }
        public function setCurrency(string $value): void { $this->currency = $value; }
        public function setCode(string $value): void { $this->code = $value; }
        public function setRatesSeries(array $value): void { $this->ratesSeries = $value; }

        public function toString(): string {
            $response = "Table: " . $this->table . 
                " - Currency: " . $this->currency . 
                " - Code: " . $this->code;

            for($i = 0; $i < count($this->ratesSeries); $i++){
                $response = $response . " - " . $this->ratesSeries[$i]->toString();
            }
            
            return $response;
        }
    }
?>