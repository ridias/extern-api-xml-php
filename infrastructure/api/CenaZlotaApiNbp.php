<?php

    require_once './application/interfaces/CenaZlotaApi.php';
    require_once './infrastructure/api/HttpApiNbpHelper.php';
    require_once './infrastructure/parser/CenaZlotaParser.php';

    class CenaZlotaApiNbp implements CenaZlotaApi {

        private Parser $parser;

        public function __construct()
        {
            $this->parser = new CenaZlotaParser();
        }

        public function getCenaZlota(): array
        {
            $response = HttpApiNbpHelper::callMethodGet("http://api.nbp.pl/api/cenyzlota/");
            if(preg_match("/404 NotFound/", $response)) return array();
            $xmlResponse = new SimpleXMLElement($response);
            return $this->parser->parse($xmlResponse); 
        }

        public function getCenaZlotaFromToday(): array
        {
            $response = HttpApiNbpHelper::callMethodGet("http://api.nbp.pl/api/cenyzlota/today/");
            if(preg_match("/404 NotFound/", $response)) return array();
            $xmlResponse = new SimpleXMLElement($response);
            return $this->parser->parse($xmlResponse); 
        }

        public function getCenaZlotaFromLastDay(): array
        {
            $response = HttpApiNbpHelper::callMethodGet("http://api.nbp.pl/api/cenyzlota/last/");
            if(preg_match("/404 NotFound/", $response)) return array();
            $xmlResponse = new SimpleXMLElement($response);
            return $this->parser->parse($xmlResponse); 
        }

        public function getCenaZlotaFromLastNDays(int $days): array
        {
            $response = HttpApiNbpHelper::callMethodGet("http://api.nbp.pl/api/cenyzlota/last/" . $days);
            if(preg_match("/404 NotFound/", $response)) return array();
            $xmlResponse = new SimpleXMLElement($response);
            return $this->parser->parse($xmlResponse); 
        }

        public function getCenaZlotaFromDate(string $date): array
        {
            $response = HttpApiNbpHelper::callMethodGet("http://api.nbp.pl/api/cenyzlota/" . $date);
            if(preg_match("/404 NotFound/", $response)) return array();
            $xmlResponse = new SimpleXMLElement($response);
            return $this->parser->parse($xmlResponse); 
        }
    }
?>