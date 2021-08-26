<?php

    require_once('./application/interfaces/Parser.php');
    require_once './models/CenaZlota.php';

    class CenaZlotaParser implements Parser {

        public function __construct(){

        }

        public function parse(SimpleXMLElement $responseXml): array
        {
            $result = array();
            for($i = 0; $i < count($responseXml->CenaZlota); $i++){
                $cenazlota = new CenaZlota();
                $cenazlota->setData($responseXml->CenaZlota[$i]->Data);
                $cenazlota->setCena($responseXml->CenaZlota[$i]->Cena);
                array_push($result, $cenazlota);
            }
            
            return $result;
        }
    }
?>