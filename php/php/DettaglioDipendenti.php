<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Supermercado+One" rel="stylesheet">
<style>

body{background-color:lightblue;
	font-family: 'Supermercado One', cursive;
}



</style>
</head>
<body>
<table border=1 align=center margin=30px>
<?php

//ricevo tramite get la variabile ArticoloID e la assegno alla variabile php
// $_GET va ad ottenere ciò che desidero dal database in questo caso.

$dipendenteID=$_GET['DipendenteID'];
//echo($articoloID);

//ho ricevuto ArticoloID, posso utilizzarlo per lanciare una query select, che seleziona un solo record, visto che ArticoloID è chiave primaria.


$conn=mysqli_connect(localhost,"stefanophp7", "3pasquaman3", "my_stefanophp7");
$strSQL="SELECT * FROM TDipendenti WHERE DipendenteID=".$dipendenteID;

//prepariamo la query

$query=mysqli_query($conn,$strSQL);
$row=mysqli_fetch_assoc($query);
{

echo( //in questo caso invece di fare una svalangata di php nei singoli td si fa un unico echo.

//si virgoletta il markup html e il suo contenuto, si concatena la variabile da richiamare

"<tr>
<td>DipendenteID</td>
<td>".$row[DipendenteID]."</td>
</tr>

<tr>
<td>Nome</td>
<td>".$row[Nome]."</td>
</tr>

<tr>
<td>Cognome</td>
<td>".$row[Cognome]."</td>
</tr>

<tr>
<td>Provincia di Nascita</td>
<td>".$row[ProvinciaDiNascita]."</td>
</tr>

<tr>
<td>Foto</td>
<td><img src=".$row[ThumbFileName]."></td>
</tr>

<tr>
<td>Email</td>
<td>".$row[Mail]."</td>
</tr>

<tr>
<td>Numero di Telefono</td>
<td><".$row[Telefono]."/td>
</tr>"

); //qui mi ricordo di chiudere la funzione echo();



}
mysqli_close($conn);
?>
</table>
</body>
</html>
