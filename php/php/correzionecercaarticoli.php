<html>
<head>
	<title>Cerca Articoli</title>
</head>
<script>
function cerca ()
{
// andiamo a prendere il prezzoMassimoString messo dall'utente
prezzoMassimoString=document.getElementById("textPrezzoUnitarioMassimo").value;
//pulisco l'innerHTML perchè puo essere rilanciata piu volte ed errore prima che non ci sarà piu
document.getElementById("errorePrezzoUnitarioMassimo").innerHTML="";

errore=false;
    if (prezzoMassimoString==""){
      errore=true;
      document.getElementById("errorePrezzoUnitarioMassimo").innerHTML="devi digitare qualcosa";
    }
    if (isNaN(prezzoMassimoString)){
      errore=true;
      document.getElementById("errorePrezzoUnitarioMassimo").innerHTML="non deve contenere numeri";
    }
    //altri test che potrebbero far diventare a fare errore == TRUE
    if (errore){
      return;
    }
    else {
      // bisogna dire a js che il form puo fare submit
      cercaArticoli.submit();
    }

}
	function pulisci(){
		document.getElementById("textPrezzoUnitarioMassimo").value="";
		cercaArticoli.submit();
}

</script>
<body>


<form name="cercaArticoli" method="post" action="cercaArticoli.php">
    <p>Cerca articoli che costano meno di:</p>
   <p> Prezzo massimo</p> <input type="text" id="textPrezzoUnitarioMassimo" name="prezzoUnitarioMassimo"><label id="errorePrezzoUnitarioMassimo"></label>
	<br/>
	<p> Prezzo minimo</p> 	<input type="text" id="textPrezzoUnitarioMinimo" name="prezzoUnitarioMinimo"><label id="errorePrezzoUnitarioMinimo"></label>
    <input type="button" id="buttonCerca" value="cerca" onclick="cerca()">
		<input type="button" id="buttonPulisci" value="pulisci" onclick="pulisci()">

</form>


       <?php
//la prima cosa che devo fare ora è ricevere tramite post il prezzoUnitarioMassimo, in partenza potrebbe essere vuoto o qualcosa che ha scritto nel text e che è stato inviato
		$prezzoUnitarioMassimo=$_POST['prezzoUnitarioMassimo'];
		$prezzoUnitarioMassimo=$_POST['prezzoUnitarioMinimo'];
 		$conn=mysqli_connect(filehost,"dieffecorsop","pipgobenga52","my_dieffecorsop");
//mi posso connettere al database ma cambia la stringa SQL
		if(empty($prezzoUnitarioMassimo))
        {
        	//se il prezzo unitario massimo è vuoto significa che o la pagina è stata caricata la prima volta ma non è stata caricata oppure il cliente ha schiacchiato senza cerca
            $strSQL=("SELECT * FROM TArticoli");
        }
        else
        {
        	$strSQL=("SELECT * FROM TArticoli where PrezzoUnitario<".$prezzoUnitarioMassimo);
        }
				if(empty($prezzoUnitarioMinimo))
		        {
		        	//se il prezzo unitario massimo è vuoto significa che o la pagina è stata caricata la prima volta ma non è stata caricata oppure il cliente ha schiacchiato senza cerca
		            $strSQL=("SELECT * FROM TArticoli");
		        }
		        else
		        {
		        	$strSQL=("SELECT * FROM TArticoli where PrezzoUnitario>".$prezzoUnitarioMinimo);
		        }

       $query=mysqli_query($conn,$strSQL);
       $numeroRecord=mysqli_num_rows($query);

       if ($numeroRecord==0)

  	  {
   		 echo("nessun articolo");
        mysqli_close($conn);
        return;


       }
       ?>
      <table border ="2" width="1000" bgcolor="F5DEB3">
    		<tr bgcolor=green>
        	<th>ArticoloID</th>
            <th>Nome</th>
            <th>Descrizione</th>
            <th>Prezzo</th>
            <th>Giacenza</th>
            <th>AliquotaIVA</th>
            <th>DescrizioneBreve</th>
            <th>Dettagli</th>

       </tr>
       <?php
              while($row=mysqli_fetch_assoc($query))
      	 {?>
        <tr>
        	<td> <?php echo ($row["ArticoloID"]); ?> </td>
            <td> <?php echo ($row["Nome"]); ?> </td>
            <td> <?php echo ($row["Descrizione"]); ?> </td>
            <td> <?php echo ($row["PrezzoUnitario"]); ?> </td>
            <td> <?php echo ($row["Giacenza"]); ?> </td>
            <td> <?php echo ($row["AliquotaIVA"]); ?> </td>
            <td> <?php echo ($row["DescrizioneBreve"]); ?> </td>
            <td> <a href="DettaglioArticolo.php?ArticoloID=<?php echo ($row["ArticoloID"]); ?>">Dettagli</a> </td>
       </tr>

         <?php
         }

       mysqli_close($conn);
       ?>

       </table>

</body>
<html>
