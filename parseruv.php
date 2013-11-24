<?php

date_default_timezone_set('Europe/Madrid');


function trim_value(&$value) 
{ 
	$value = str_replace("&nbsp;","",$value);
    $value = utf8_encode(trim(strip_tags($value))); 
	$value = htmlentities($value, ENT_COMPAT, 'UTF-8');  
}
 
 $file=file_get_contents("http://www.aemet.es/es/eltiempo/prediccion/radiacionuv?w=0&zona=penyb&datos=det");
 //var_dump($http_response_header);
 if (!$file) die();


 preg_match_all('/<th abbr=\"(.*)\" class=\"borde_r(l)?b_th\">(.*)\&nbsp\;<\/th>/'  , $file, $_['ciudades']); 
 preg_match_all("/<span class=\"raduv(.*)\" title=\"(.*)\">\&nbsp\;\&nbsp\;[0-9]{1,2}<\/span>/", $file, $_['valores']); 
 preg_match_all("/<a href=\"\/es\/eltiempo\/prediccion\/radiacionuv\?(.*)<\/a><\/li>/", $file, $dia); 
//$dia[0] en html


 unset($_['ciudades'][0][59]);
  
 array_walk($_['ciudades'][0], 'trim_value');
 array_walk($_['valores'][0], 'trim_value');
 $res = array_combine($_['ciudades'][0],$_['valores'][0]);
 ksort($res); 
