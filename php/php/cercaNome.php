<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cerca Nome</title>
    <script type="text/javascript">
    function eseguiCerca(){
      cercaNomeString=document.getElementById("cercaNomeArticolo").value;
      document.getElementById("erroreCercaNomeArticolo").innerHTML="";
      errore=false;

      if (cercaNomeString=="") {
        errore=true;
        document.getElementById("erroreCercaNomeArticolo").innerHTML=" devi digitare il nome dell'articolo";
      }

      if (errore==true) {
        return;
      }
      else {
        cercaNome.submit();
      }
    }

    function eseguiPulisci(){
      document.getElementById("cercaNomeArticolo").value="";
      cercaNome.submit();
    }

    </script>
  </head>
  <body>

    <h1>Ricerca Articoli per Nome</h1>

    <form name="cercaNome" action="cercaNome.php" method="post">
      <input type="text" id="cercaNomeArticolo" name="cercanomearticolo"><label id="erroreCercaNomeArticolo"></label>
      <br>
      <input type="button" id="buttonCerca" value="cerca" onclick="eseguiCerca()">
      <br>
      <br>
      <input type="button" id="buttonPulisci" value="pulisci" onclick="eseguiPulisci()">
      <br>
      

      <!-- qui apro la chiamata alla connessione e la query -->

      <?php
      $nomeArticolo=$_POST['cercanomearticolo'];
      $conn=mysqli_connect(filehost,"stefanophp7", "3pasquaman3", "my_stefanophp7");
      if (empty($nomeArticolo)) {
        $strSQL=("SELECT * FROM TArticoli");
      }

      else {
        $strSQL=("SELECT * FROM TArticoli WHERE Nome LIKE '%".$nomeArticolo."%'");
      }

      $query=mysqli_query($conn,$strSQL);
      $nomeRecord=mysqli_num_rows($query);

      if ($nomeRecord=="") {
        echo "Non ci sono articoli con questo nome";
        mysqli_close($conn);
        return;
      }



       ?>

      <table border="1">
      <tr>
        <td>ArticoloID</td>
        <td>Nome</td>
        <td>Prezzo Unitario</td>
        <td>Giacenza</td>
      </tr>

      <!-- qui il loop while con echo -->

      <?php
      while($row=mysqli_fetch_assoc($query))
      {
          echo("<tr>
                  <td>".$row[ArticoloID]."</td>
                  <td>".$row[Nome]."</td>
                  <td>".$row[PrezzoUnitario]."</td>
                  <td>".$row[Giacenza]."</td>
                  <td><img src=".$row[ThumbFileName]."></td>
                </tr>");
      }
      mysqli_close($conn);
  ?>


    </form>



  </body>
</html>




<?php



















/*classica pagina con cerca:

con tabella articolo id
nom
prezzo
Giacenza


e per la ricerca fare la ricerca parziale con il like sul campo Nome
*/





 ?>
