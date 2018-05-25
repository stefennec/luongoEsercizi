<?php

  // non vi sarà traccia di html in questo esercizio di webservice JSON.

// se il WS riceve dei dati questo è il momento di leggerli.

// devo sapere se i dati arrivano via GET o POST!? noi usiamo post


// FASE INPUT

$numero= $_GET["numero"];

// FASE ELABORAZIONE

// devo calcolare il quadrato di un numero

$quadrato= $numero * $numero;

// come al solito noi dobbiamo fare una verifica di ciò che inviamo con un controllo lato CLIENT

// FASE OUTPUT

// dobbiamo restituire i dati in formato JSON.

$response["quadrato"]=$quadrato;

$response["success"]=1;
$response["message"]="alla grande";

if (empty($numero)) {
  $response["success"]=0;
  $response["message"]="non hai inviato il numero";
  die(json_encode($response));
}


// dopo ciò posso far morire / chiudere il WS

die(json_encode($response));









 ?>
