<?php

//source of scrip:http://www.marcofbb.com.ar/contador-de-visita-simple-php/

function contador()
{
// fichero donde se guardaran las visitas
$fichero = "visitas.txt";

$fptr = fopen($fichero, "r");

// sumamos una visita
$num = fread($fptr, filesize($fichero));
$num++;

$fptr = fopen($fichero, "w+");
fwrite($fptr, $num);

return $num;
}
?>

