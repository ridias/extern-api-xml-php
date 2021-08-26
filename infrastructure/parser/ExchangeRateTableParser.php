<?php

    require_once('./application/interfaces/Parser.php');
    require_once './models/RateTableMiddle.php';
    require_once './models/RateTableTrading.php';
    require_once './models/ExchangeRateTable.php';

    class ExchangeRateTableParser implements Parser {

        public function __construct(){

        }

        public function parse(SimpleXMLElement $objXml): array
        {
            $result = array();

            for($i = 0; $i < count($objXml->ExchangeRatesTable); $i++){
                $exchangeRateTable = new ExchangeRateTable();
                $exchangeRateTable->setTable($objXml->ExchangeRatesTable[$i]->Table);
                $exchangeRateTable->setNo($objXml->ExchangeRatesTable[$i]->No);
                $exchangeRateTable->setEffectiveDate($objXml->ExchangeRatesTable[$i]->EffectiveDate);
                $ratesTable = array();
                for($j = 0; $j < count($objXml->ExchangeRatesTable[$i]->Rates->Rate); $j++){
                    $rateTable = null;
                    $rate = $objXml->ExchangeRatesTable[$i]->Rates->Rate[$j];
                    if(empty($rate->Ask)){
                        $rateTable = new RateTableMiddle();
                        $rateTable->setCurrency($rate->Currency);
                        $rateTable->setCode($rate->Code);
                        $rateTable->setMid($rate->Mid);
                    }else{
                        $rateTable = new RateTableTrading();
                        $rateTable->setCurrency($rate->Currency);
                        $rateTable->setCode($rate->Code);
                        $rateTable->setBid($rate->Bid);
                        $rateTable->setAsk($rate->Ask);
                    }

                    array_push($ratesTable, $rateTable);
                }

                $exchangeRateTable->setRatesTable($ratesTable);
                array_push($result, $exchangeRateTable);
            }

            return $result;
        }
    }
?>