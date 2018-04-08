<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cerca Articoli</title>
    <script type="text/javascript">
      function eseguiCerca(){
        prezzoMassimoString=document.getElementById("textPrezzoUnitarioMassimo").value;
        prezzoMinimoString=document.getElementById("textPrezzoUnitarioMinimo").value;
        document.getElementById("errorePrezzoUnitarioMassimo").innerHTML="";
        document.getElementById("errorePrezzoUnitarioMinimo").innerHTML="";
        errore=false;

        if (prezzoMassimoString=="") {
          errore=true;
          document.getElementById("errorePrezzoUnitarioMassimo").innerHTML=" Devi digitare qualcosa";
        }
        if (isNaN(prezzoMassimoString)) {
          errore=true;
          document.getElementById("errorePrezzoUnitarioMassimo").innerHTML=" Devi digitare un numero";
        }

        if (prezzoMinimoString=="") {
          errore=true;
          document.getElementById("errorePrezzoUnitarioMinimo").innerHTML=" Devi digitare qualcosa";
        }
        if (isNaN(prezzoMinimoString)) {
          errore=true;
          document.getElementById("errorePrezzoUnitarioMinimo").innerHTML=" Devi digitare un numero";
        }

        if (errore==true) {
          return;
        }
        else {
          cercaArticoli.submit();
        }
      }

      function eseguiPulisci(){
        document.getElementById("textPrezzoUnitarioMassimo").value="";
        document.getElementById("textPrezzoUnitarioMinimo").value="";
        cercaArticoli.submit();
      }

    </script>
  </head>
  <body>
    <h1>Ricerca gli Articoli a seconda del prezzo:</h1>

    <form name="cercaArticoli" action="cercaArticoli.php" method="post">
      <p>Prezzo massimo: </p>
      <input type="text" id="textPrezzoUnitarioMassimo" name="prezzoUnitarioMassimo"><label id="errorePrezzoUnitarioMassimo"></label>
      <br>
      <p>Prezzo minimo: </p>
      <input type="text" id="textPrezzoUnitarioMinimo" name="prezzoUnitarioMinimo"><label id="errorePrezzoUnitarioMinimo"></label>
      <br>
      <input type="button" id="buttonCerca" value="cerca" onclick="eseguiCerca()">
      <input type="button" id="buttonPulisci" value="pulisci" onclick="eseguiPulisci()">
      <br>
    </form>

    <?php
      $prezzoUnitarioMassimo=$_POST['prezzoUnitarioMassimo'];
      $prezzoUnitarioMinimo=$_POST['prezzoUnitarioMinimo'];
      $conn=mysqli_connect(filehost,"stefanophp7", "3pasquaman3", "my_stefanophp7");
      if (empty($prezzoUnitarioMassimo)) {
        $strSQL=("SELECT * FROM TArticoli");
      }
      else {
        $strSQL=("SELECT * FROM TArticoli WHERE PrezzoUnitario<=".$prezzoUnitarioMassimo);
      }
      if (empty($prezzoUnitarioMinimo)) {
        $strSQL=("SELECT * FROM TArticoli");
      }
      else {
        $strSQL=("SELECT * FROM TArticoli where PrezzoUnitario>=".$prezzoUnitarioMinimo);
      }

      $query=mysqli_query($conn,$strSQL);
      $numeroRecord=mysqli_num_rows($query);

      if ($numeroRecord==0) {
        echo "Non ci sono articoli";
        mysqli_close($conn);
        return;
      }
     ?>

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

  </body>
</html>
