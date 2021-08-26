<?php

    class ExchangeRateTable {

        private string $table;
        private string $no;
        private string $effectiveDate;
        private array $ratesTable;

        public function __construct(){

        }

        public function getTable(): string { return $this->table; }
        public function getNo(): string { return $this->no; }
        public function getEffectiveDate(): string { return $this->effectiveDate; }
        public function getRatesTable(): array { return $this->ratesTable; }

        public function setTable(string $value): void { $this->table = $value; }
        public function setNo(string $value): void { $this->no = $value; }
        public function setEffectiveDate(string $value ): void { $this->effectiveDate = $value; }
        public function setRatesTable(array $value): void { $this->ratesTable = $value; }

        public function toString(): string {
            $response = "Table: " . $this->table . 
                " - No: " . $this->no . 
                " - EffectiveDate: " . $this->effectiveDate;

            for($i = 0; $i < count($this->ratesTable); $i++){
                $response = $response . " - " . $this->ratesTable[$i]->toString();
            }
            
            return $response;
        }
    }
?>