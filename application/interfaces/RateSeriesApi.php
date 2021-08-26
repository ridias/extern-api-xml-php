<?php

    interface RateSeriesApi {

        public function getRateSeriesByTableAndCode(string $table, string $code): array;
        public function getRateSeriesByTableAndCodeFromLastDay(string $table, string $code): array;
        public function getRateSeriesByTableAndCodeFromLastNDays(string $table, string $code, int $days): array;
        public function getRateSeriesByTableAndCodeFromToday(string $table, string $code): array;
        public function getRateSeriesByTableAndCodeByDate(string $table, string $code, string $date): array;
    }
?>