<?php 

    interface RateTablesApi {

        public function getRatesByTable(string $letter): array;
        public function getRatesByTableToday(string $letter): array;
        public function getRatesByTableLast(string $letter): array;
        public function getRatesByTableFromLastNDays(string $letter, int $days): array;
        
    }
?>