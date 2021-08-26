<?php

    abstract class RateSerie {

        private string $no;
        private string $effectiveDate;

        public function __construct(){

        }

        public function setNo(string $no): void { $this->no = $no; }
        public function setEffectiveDate(string $effectiveDate): void { $this->effectiveDate = $effectiveDate; }

        public function getNo(): string { return $this->no; }
        public function getEffectiveDate(): string { return $this->effectiveDate; }

        public function toString(): string {
            return "No: " . $this->no . 
                " - EffectiveDate: " . $this->effectiveDate;
        }
    }
?>