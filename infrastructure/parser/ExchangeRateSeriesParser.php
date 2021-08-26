<?php

    require_once('./application/interfaces/Parser.php');
    require_once './models/ExchangeRateSeries.php';
    require_once './models/RateSeriesMiddle.php';
    require_once './models/RateSeriesTrading.php';

    class ExchangeRateSeriesParser implements Parser {

        public function __construct()
        {
            
        }

        public function parse(SimpleXMLElement $objXml): array
        {
            $result = array();
            $rates = array();
            $exchangeRateSeries = new ExchangeRateSeries();
            $exchangeRateSeries->setTable($objXml->Table);
            $exchangeRateSeries->setCurrency($objXml->Currency);
            $exchangeRateSeries->setCode($objXml->Code);
            
            for($i = 0; $i < count($objXml->Rates->Rate); $i++){
                $rate = $objXml->Rates->Rate[$i];
                $rateSeries = null;
                if(empty($rate->Ask)){
                    $rateSeries = new RateSeriesMiddle();
                    $rateSeries->setNo($rate->No);
                    $rateSeries->setEffectiveDate($rate->EffectiveDate);
                    $rateSeries->setMid($rate->Mid);
                }else{
                    $rateSeries = new RateSeriesTrading();
                    $rateSeries->setNo($rate->No);
                    $rateSeries->setEffectiveDate($rate->EffectiveDate);
                    $rateSeries->setAsk($rate->Ask);
                    $rateSeries->setBid($rate->Bid);
                }

                array_push($rates, $rateSeries);
            }

            $exchangeRateSeries->setRatesSeries($rates);
            array_push($result, $exchangeRateSeries);
            return $result;
        }
    }

?>