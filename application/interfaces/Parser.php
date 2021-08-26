<?php

    interface Parser {
        public function parse(SimpleXMLElement $obj): array;
    }

?>