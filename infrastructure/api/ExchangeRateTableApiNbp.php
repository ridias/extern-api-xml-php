<?php

    require_once './application/interfaces/RateTablesApi.php';
    require_once './infrastructure/api/HttpApiNbpHelper.php';
    require_once './infrastructure/parser/ExchangeRateTableParser.php';

    class ExchangeRateTableApiNbp implements RateTablesApi {

        private Parser $parser;

        public function __construct()
        {
            $this->parser = new ExchangeRateTableParser();
        }

        public function getRatesByTable(string $letter): array
        {
            $result = array();
            try {
                $response = HttpApiNbpHelper::callMethodGet("http://api.nbp.pl/api/exchangerates/tables/" . $letter);
                if(preg_match("/404 NotFound/", $response)) return $result;
                $xmlResponse = new SimpleXMLElement($response);
                $result = $this->parser->parse($xmlResponse);   
            }catch(Exception $ex){
                echo ("It wasn't possible to get the rates from specific table in nbp api, more details: " . $ex->getMessage() . "<br>");
            }   
            
            return $result;
        }

        public function getRatesByTableToday(string $letter): array
        {
            $result = array();
            try {
                $response = HttpApiNbpHelper::callMethodGet("http://api.nbp.pl/api/exchangerates/tables/" . $letter . "/today");
                if(preg_match("/404 NotFound/", $response)) return $result;
                $xmlResponse = new SimpleXMLElement($response);
                $result = $this->parser->parse($xmlResponse);  
            }catch(Exception $ex){
                echo ("It wasn't possible to get the rates from specific table for today in nbp api, more details: " . $ex->getMessage() . "<br>");
            }

            return $result;
        }

        public function getRatesByTableLast(string $letter): array
        {
            $result = array();
            try {
                $response = HttpApiNbpHelper::callMethodGet("http://api.nbp.pl/api/exchangerates/tables/" . $letter . "/last");
                if(preg_match("/404 NotFound/", $response)) return $result;
                $xmlResponse = new SimpleXMLElement($response);
                $result = $this->parser->parse($xmlResponse);
            }catch(Exception $ex){
                echo ("It wasn't possible to get the rates from specific table for last day in nbp api, more details: " . $ex->getMessage() . "<br>");
            }  

            return $result;
        }

        public function getRatesByTableFromLastNDays(string $letter, int $days): array
        {
            $result = array();
            try {
                $response = HttpApiNbpHelper::callMethodGet("http://api.nbp.pl/api/exchangerates/tables/" . $letter . "/last/" . $days);
                if(preg_match("/404 NotFound/", $response)) return $result;
                $xmlResponse = new SimpleXMLElement($response);
                $result = $this->parser->parse($xmlResponse); 
            }catch(Exception $ex){
                echo ("It wasn't possible to get the rates from specific table for last n days in nbp api, more details: " . $ex->getMessage() . "<br>");
            } 
            return $result;
        }
    }
?>