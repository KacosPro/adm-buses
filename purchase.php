<?php

$queryString = $_SERVER['QUERY_STRING'];
parse_str($queryString, $parameters);

print_r($parameters);

?>