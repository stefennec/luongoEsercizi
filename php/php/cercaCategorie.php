<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cerca Categorie</title>
    <script type="text/javascript">
    function eseguiCerca(){
      cercaNomeCategoriaString=document.getElementById("cercaCategorie").value;
      document.getElementById("erroreCercaArticoloCategorie").innerHTML="";
      errore=false;

      if (cercaNomeString=="") {
        errore=true;
        document.getElementById("erroreCercaNomeArticolo").innerHTML=" devi digitare il nome dell'articolo";
      }

      if (errore==true) {
        return;
      }
      else {
        cercaCategorieNome.submit();
      }
    }

    function eseguiPulisci(){
      document.getElementById("cercaCategorie").value="";
      cercaCategorieNome.submit();
    }

    </script>
  </head>
  <body>
    <h1>Cerca tra le categorie</h1>

    <h2>Cerca Articolo</h2>
    <form name="cercaCategorieNome" action="cercaCategorie.php" method="post">
      <input type="text" id="cercaCategorie" name="cercaarticolocategorie"><label id="erroreCercaArticoloCategorie"></label>
      <br>
      <input type="button" id="buttonCerca" value="cerca" onclick="eseguiCerca()">
      <br>
      <br>
      <input type="button" id="buttonPulisci" value="pulisci" onclick="eseguiPulisci()">
      <br>


        <?php
        $cercaArticoloCategorie=$_POST['cercaarticolocategorie'];
        $conn=mysqli_connect(filehost,"stefanophp7", "3pasquaman3", "my_stefanophp7");
        if (empty($cercaArticoloCategorie)) {
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

      </select>
    </form>
  </body>
</html>
