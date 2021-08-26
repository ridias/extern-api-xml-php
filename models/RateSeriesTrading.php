<?php

    require_once('RateSerie.php');

    class RateSeriesTrading extends RateSerie {
        private string $bid;
        private string $ask;

        public function __construct(){
            parent::__construct();
        }

        public function getBid(): string { return $this->bid; }
        public function getAsk(): string { return $this->ask; }
        
        public function setBid(string $bid): void { $this->bid = $bid; }
        public function setAsk(string $ask): void { $this->ask = $ask; }

        public function toString(): string {
            return parent::toString() . 
                " - Bid: " . $this->bid . 
                " - Ask: " . $this->ask;
        }
    }
?>