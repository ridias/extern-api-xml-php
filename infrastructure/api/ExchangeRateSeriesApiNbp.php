<?php

    require_once './application/interfaces/RateSeriesApi.php';
    require_once './infrastructure/api/HttpApiNbpHelper.php';
    require_once './infrastructure/parser/ExchangeRateSeriesParser.php';

    class ExchangeRateSeriesApiNbp implements RateSeriesApi {

        private Parser $parser;

        public function __construct()
        {
            $this->parser = new ExchangeRateSeriesParser();
        }

        public function getRateSeriesByTableAndCode(string $table, string $code): array
        {
            $result = array();
            try {
                $response = HttpApiNbpHelper::callMethodGet("http://api.nbp.pl/api/exchangerates/rates/" . $table . "/" . $code);
                if(preg_match("/404 NotFound/", $response)) return $result;
                $xmlResponse = new SimpleXMLElement($response);
                $result = $this->parser->parse($xmlResponse);
            }catch(Exception $ex){
                echo ("It wasn't possible to get the table and code in nbp api, more details: " . $ex->getMessage() . "<br>");
            }
            
            return $result;
        }

        public function getRateSeriesByTableAndCodeFromToday(string $table, string $code): array
        {
            $result = array();
            try {
                $response = HttpApiNbpHelper::callMethodGet("http://api.nbp.pl/api/exchangerates/rates/" . $table . "/" . $code . "/today");
                if(preg_match("/404 NotFound/", $response)) return $result;
                $xmlResponse = new SimpleXMLElement($response);
                $result = $this->parser->parse($xmlResponse);
            }catch(Exception $ex){
                echo ("It wasn't possible to get the table and code for today in nbp api, more details: " . $ex->getMessage() . "<br>");
            }

            return $result;
        }

        public function getRateSeriesByTableAndCodeFromLastDay(string $table, string $code): array
        {
            $result = array();
            try {
                $response = HttpApiNbpHelper::callMethodGet("http://api.nbp.pl/api/exchangerates/rates/" . $table . "/" . $code . "/last");
                if(preg_match("/404 NotFound/", $response)) return $result;
                $xmlResponse = new SimpleXMLElement($response);
                $result = $this->parser->parse($xmlResponse);
            }catch(Exception $ex){
                echo ("It wasn't possible to get the table and code for last day in nbp api, more details: " . $ex->getMessage() . "<br>");
            }

            return $result;
        }

        public function getRateSeriesByTableAndCodeFromLastNDays(string $table, string $code, int $days): array
        {
            $result = array();
            try {
                $response = HttpApiNbpHelper::callMethodGet("http://api.nbp.pl/api/exchangerates/rates/" . $table . "/" . $code . "/last/" . $days);
                if(preg_match("/404 NotFound/", $response)) return $result;
                $xmlResponse = new SimpleXMLElement($response);
                $result = $this->parser->parse($xmlResponse);
            }catch(Exception $ex){
                echo ("It wasn't possible to get the table and code for last n day in nbp api, more details: " . $ex->getMessage() . "<br>");
            }

            return $result;
        }

        public function getRateSeriesByTableAndCodeByDate(string $table, string $code, string $date): array
        {
            $result = array();
            try {
                $response = HttpApiNbpHelper::callMethodGet("http://api.nbp.pl/api/exchangerates/rates/" . $table . "/" . $code . "/" . $date);
                if(preg_match("/404 NotFound/", $response)) return $result;
                $xmlResponse = new SimpleXMLElement($response);
                $result = $this->parser->parse($xmlResponse);
            }catch(Exception $ex){
                echo ("It wasn't possible to get the table and code for a specific date in nbp api, more details: " . $ex->getMessage() . "<br>");
            }

            return $result;
        }


    }
?>