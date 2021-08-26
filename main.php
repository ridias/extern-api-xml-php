<?php

    require_once './infrastructure/api/CenaZlotaApiNbp.php';
    require_once './infrastructure/api/ExchangeRateTableApiNbp.php';
    require_once './infrastructure/api/ExchangeRateSeriesApiNbp.php';

    $testExchangeRateSeries = new ExchangeRateSeriesApiNbp();
    $testExchangeRateTable = new ExchangeRateTableApiNbp();
    $testCenazlota = new CenaZlotaApiNbp();

    function displayResults($response){
        if(count($response) > 0){

            for($i = 0; $i < count($response); $i++){
                echo($response[$i]->toString() . " <br>");
            }
        }else{
            echo "No results. <br>";
        }
    
        echo "<br>";
        echo "<br>";
    } 


    echo "Test rate series by table and code: <br>";
    $response = $testExchangeRateSeries->getRateSeriesByTableAndCode("a", "usd");
    displayResults($response);
    sleep(1);

    echo "Test rate series by table and code today: <br>";
    $response = $testExchangeRateSeries->getRateSeriesByTableAndCodeFromToday("a", "usd");
    displayResults($response);
    sleep(1);

    echo "Test rate series by table and code last: <br>";
    $response = $testExchangeRateSeries->getRateSeriesByTableAndCodeFromLastDay("a", "usd");
    displayResults($response);
    sleep(1);

    echo "Test rate series by table and code last 10 days: <br>";
    $response = $testExchangeRateSeries->getRateSeriesByTableAndCodeFromLastNDays("a", "usd", 10);
    displayResults($response);
    sleep(1);

    echo "Test rate series by table and code specific date: <br>";
    $response = $testExchangeRateSeries->getRateSeriesByTableAndCodeByDate("a", "usd", "2021-08-01");
    displayResults($response);
    sleep(1);    



    /*echo "Test rate table: <br>";
    $response = $testExchangeRateTable->getRatesByTable("a");
    displayResults($response);
    sleep(1);

    echo "Test rate table for today: <br>";
    $response = $testExchangeRateTable->getRatesByTableToday("a");
    displayResults($response);
    sleep(1);

    echo "Test rate table for last day: <br>";
    $response = $testExchangeRateTable->getRatesByTableLast("a");
    displayResults($response);
    sleep(1);

    echo "Test rate table for last 10 days: <br>";
    $response = $testExchangeRateTable->getRatesByTableFromLastNDays("a", 10);
    displayResults($response);
    sleep(1); */

    /*echo "Test cenazlota: <br>";
    $response = $testCenazlota->getCenaZlota();
    displayResults($response);
    sleep(1);

    echo "Test cenazlota today: <br>";
    $response = $testCenazlota->getCenaZlotaFromToday();
    displayResults($response);
    sleep(1);

    echo "Test cenazlota last day: <br>";
    $response = $testCenazlota->getCenaZlotaFromLastDay();
    displayResults($response);
    sleep(1);

    echo "Test cenazlota last 10 days: <br>";
    $response = $testCenazlota->getCenaZlotaFromLastNDays(10);
    displayResults($response);
    sleep(1);

    echo "Test cenazlota specific date: <br>";
    $response = $testCenazlota->getCenaZlotaFromDate("2021-08-01");
    displayResults($response);
    sleep(1); */
    
    
?>