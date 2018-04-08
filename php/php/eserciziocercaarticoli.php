<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cerca Articoli</title>
  </head>
  <body>
    <h1>Cerca Articoli</h1>
    <h3>Cerca Articoli che costano meno di :</h3>
    <br>
    <br>
    <form nome="cercaArticoli" method="post" action="cercaArticoli.php">
      <input type="text" id="PrezzoUnitario" name="PrezzoUnitario">
      <input type="submit">
    </form>

    <br>



<?php //apro il php
//la prima cosa che devo fare ora tramite post è ricevere prezzounitariomassimo che potrebbe essere vuoto o qualcosa che utente ha scritto e inviato

$prezzoUnitarioMassimo=$_POST['PrezzoUnitario'];

//posso connettermi al database ma cambierà la strSQL a seconda se ho ricevuto qualcosa o meno

$conn=mysqli_connect(localhost,"stefanophp7", "3pasquaman3", "my_stefanophp7");
if(empty($prezzoUnitarioMassimo)){
$strSQL='SELECT * From TArticoli';
}
else{
$strSQL='SELECT * From TArticoli WHERE PrezzoUnitario<'.$prezzoUnitarioMassimo;
}
              $query= mysqli_query($conn,$strSQL);
              $numeroRecord=mysqli_num_rows($query);

              if ($numeroRecord==0) {
                echo ("Nessun Articolo");
                return;

              }?>

              <table border="1">
              <tr>
                <td>ArticoloID</td>
                <td>Nome</td>
                <td>Descrizione</td>
                <td>Prezzo Unitario</td>
                <td>Giacenza</td>
                <td>Aliquota IVA</td>
              </tr>

              <?php

              while($row= mysqli_fetch_assoc($query))
              {



                  echo("<tr>
                          <td>".$row[ArticoloID]."</td>
                          <td>".$row[Nome]."</td>
                          <td>".$row[Descrizione]."</td>
                          <td>".$row[PrezzoUnitario]."</td>
                          <td>".$row[Giacenza]."</td>
                          <td>".$row[AliquotaIva]."</td>
                          <td><img src=".$row[ThumbFileName]."></td>
  						<td><a href=DettaglioArticolo.php?ArticoloID=".$row[ArticoloID].">Dettagli</a></td>

                        </tr>");
              }
              mysqli_close($conn);

             //chiudo il PHP
          ?>



</table>


  </body>
</html>
