  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>Cerca Articoli</title>
      <script>
        function eseguiCerca(){

          prezzoUnitarioMassimoString=document.getElementById("textPrezzoUnitarioMassimo").value;
          document.getElementById("errorePrezzoUnitarioMassimo").innerHTML="";

          errore=false;

          if (prezzoUnitarioMassimoString=="") {
            errore=true;
            document.getElementById("errorePrezzoUnitarioMassimo").innerHTML="Devi Caricare un Prezzo";
          }

          if (isNaN(prezzoUnitarioMassimoString)) {
            errore=true;
            document.getElementById("errorePrezzoUnitarioMassimo").innerHTML="Devi digitare un numero";
          }

          if (errore==true) {
            return;
          }
          else{
            cercaArticoli.submit();
          }
        }

        function eseguiPulisci(){
      		document.getElementById("textPrezzoUnitarioMassimo").value="";
      		cercaArticoli.submit();
        }

      </script>
    </head>
    <body>
      <h1>Cerca Articoli</h1>
      <h3>Cerca Articoli che costano meno di :</h3>
      <br>
      <br>

      <form nome="cercaArticoli" method="post" action="articoloJS.php">
        <p>Prezzo Massimo</p><input type="text" id="textPrezzoUnitarioMassimo" name="PrezzoUnitario"><label id="errorePrezzoUnitarioMassimo"></label>
        <br>
        <input type="submit" id="buttonCerca" value="cerca" onclick="eseguiCerca()">
        <input type="submit" id="buttonPulisci" value="pulisci" onclick="eseguiPulisci()">
      </form>

      <br>



  <?php

  $prezzoUnitarioMassimo=$_POST["PrezzoUnitario"];
  $conn=mysqli_connect(filehost,"stefanophp7", "3pasquaman3", "my_stefanophp7");

  if(empty($prezzoUnitarioMassimo)){
  $strSQL="SELECT * From TArticoli";
  }
  else{
  $strSQL=("SELECT * FROM TArticoli WHERE PrezzoUnitario<".$prezzoUnitarioMassimo);
  }

                $query=mysqli_query($conn,$strSQL);
                $numeroRecord=mysqli_num_rows($query);

                if ($numeroRecord==0) {
                  echo ("Nessun Articolo");
                  mysqli_close($conn);
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

                while($row=mysqli_fetch_assoc($query))
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

            ?>

  </table>

    </body>
  </html>
