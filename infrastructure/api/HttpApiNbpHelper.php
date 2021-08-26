<?php

    class HttpApiNbpHelper {
        
        public static function callMethodGet(string $url): string {
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

            $headers = array(
                "Accept: application/xml"
            );

            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

            $response = curl_exec($curl);
            curl_close($curl);
            return $response;
        }
    }
?>