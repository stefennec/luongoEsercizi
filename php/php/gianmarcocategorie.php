<html>
	<head>
		<title>Ricerca Articolo</title>
        <script>
        function Cerca()
        {
        ricercaString=ricerca.camporicerca.value;
        selettoreString=ricerca.selectCategorie.text;
        document.getElementById("camporicerca").innerHTML="";
        errore=false;
        	if (ricercaString=="Dio")
        	{
         		errore=true;
                document.getElementById("labelerrore").innerHTML="Bestemmie non ammesse!";
             }


             if (errore) {
             return}
             else {
             ricerca.submit(); }
 }
	 function Reset(){
     		 document.getElementById("camporicerca").innerHTML="";
             document.getElementById("labelerrore").innerHTML="";
			 ricerca.submit();

     }

        </script>
	</head>
    <body>

<form id="ricerca" method="post" action="ricercaselect.php" name="ricerca">

    <p>Ricerca Articolo</p>
	<br>
	Ricerca Like<input type="text" ID="camporicerca" name="camporicerca"> <label ID="labelerrore"></label> <br>
    <!-- * L'ID è per javascript, il name è per l'invio dei form lato server(php o altro)  !-->
	<br>
    <?php
    $conn=mysqli_connect(localhost, "provagianmarc", "damfevapto24", "my_provagianmarc");
	$str_sql="SELECT * From Tcategorie";
    $query=mysqli_query($conn,$str_sql);
    echo $str_sql;
    ?>
    <select name="selectCategorie" id="selectCategorie">
 	<option value="0">Tutte le categorie</option>
    <?php
    while ($row=mysqli_fetch_assoc($query)) {
  	echo('<option value="'.$row["CategoriaID"].'">'.$row["NomeCat"].'</option>');
    }
    ?>
	</select>
	<br>
	<input type="button" onClick="Cerca()" ID="buttoncerca" value="Cerca" >
	<input type="button" onClick="Reset()" ID="buttonreset" value="Reset" >
    </form>

       <table border= "10">

        <tr><td>ArticoloID</td>
       <td>Nome</td>
        <td>Descrizione</td>
        <td>PrezzoUnitario</td>
        <td>AliquotaIVA</td>
       <td>Giacenza</td>
       <td>Immagine</td>
        <td>Dettagli</td>  </tr>
<?php

$stringadiricerca=$_POST['camporicerca'];
$selettore=$_POST['selectCategorie'];


// posso connettermi ora al database ma cambierà la stringa SQL a seconda che abbia ricevuto qualcosa o no.

$conn=mysqli_connect(localhost, "provagianmarc", "damfevapto24", "my_provagianmarc");

if((empty($stringadiricerca)) && ($selettore==0))
	{
	$str_sql="SELECT * From TAarticoli";
	}
 	else if ((empty($stringadiricerca)) && ($selettore!=0)){
    $str_sql="SELECT * From TAarticoli INNER JOIN Tcategorie ON TAarticoli.CategoriaID=Tcategorie.CategoriaID WHERE Tcategorie.CategoriaID='$selettore'" ;
    }
	else if (($selettore==0) && (empty($stringadiricerca)==false)) {
    $str_sql="SELECT * From TAarticoli WHERE TAarticoli.Nome LIKE '%".$stringadiricerca."%'";
    }

    else

	{
	$str_sql="SELECT * From TAarticoli INNER JOIN Tcategorie ON TAarticoli.CategoriaID=Tcategorie.CategoriaID WHERE TAarticoli.Nome LIKE '%".$stringadiricerca."%' && Tcategorie.CategoriaID='$selettore'" ;
	}

echo $str_sql;
$query=mysqli_query($conn,$str_sql);

    if (mysqli_num_rows($query)==0)
    {
    	echo ("Nessun risultato");
        return;
    }


    while ($row=mysqli_fetch_assoc($query))

    {

    echo("<tr><td>".$row["ArticoloID"]."</td>")  ;
    echo("<td>".utf8_encode($row["Nome"])."</td>")  ;
    echo("<td>".$row["Descrizione"]."</td><")  ;
    echo("<td>".$row["PrezzoUnitario"]."</td>")  ;
    echo("<td>".$row["AliquotaIVA"]."</td>")  ;
    echo("<td>".$row["Giacenza"]."</td>")  ;
    echo("<td>".'<img src="'.$row["ThumbFileName"].' "> '."</td>")  ;
    echo('<td><a href="dettaglioarticolo.php?ArticoloID='.$row["ArticoloID"].'">Dettagli</a>'."</td></tr>")  ;
       }

mysqli_close($conn);
echo("mi sono connesso e sconnesso al DB senza problemi");
?>
       </table>
</body>
</html>
