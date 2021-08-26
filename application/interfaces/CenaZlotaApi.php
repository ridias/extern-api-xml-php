<?php 

    interface CenaZlotaApi {

        public function getCenaZlota(): array;
        public function getCenaZlotaFromToday(): array;
        public function getCenaZlotaFromLastDay(): array;
        public function getCenaZlotaFromLastNDays(int $days): array;
        public function getCenaZlotaFromDate(string $date): array;
    }

?> 