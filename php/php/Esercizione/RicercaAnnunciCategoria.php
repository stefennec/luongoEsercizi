<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Grandi Annunci</title>
    <script type="text/javascript">
      function eseguiCerca(){
        cercaAnnunciString=document.getElementById("cercaAnnunci").value;
        document.getElementById("erroreCercaAnnunci").innerHTML="";
        errore=false;


        if (cercaAnnunciString=="") {
          errore=true;
          document.getElementById("erroreCercaAnnunci").innerHTML="Digita qualcosa"
        }

        if (errore==true) {
          return;
        }
        else {
          RicercaAnnunci.submit();
        }


      }

      function eseguiPulisci(){
        document.getElementById("cercaAnnunci").value="";
        RicercaAnnunci.submit();
      }
    </script>
  </head>
  <body>

    <!-- fase HTML di form -->
    <h1>Cerca qui tra numerosi annunci:</h1>

    <form nome="RicercaAnnunci" id="RicercaAnnunci" action="RicercaAnnunciCategoria.php" method="post">
      <h2>Ricerca per annuncio:</h2>
      <input type="text" id="cercaAnnunci" name="RicercaAnnunci"><label id="erroreCercaAnnunci"></label>
      <br>
      <br>
      <!-- <h2>Ricerca descrizione articolo:</h2>
      <input type="text" id="cercaAnnunciDescrizione" nome="cercaAnnunciDescrizione"><label id="erroreCercaAnnunciDescrizione"></label>
      <br>
      <br> -->
      <input type="button" id="buttonCerca" name="RicercaAnnunci" value="cerca" onclick="eseguiCerca()">
      <br>
      <br>
      <input type="button" id="buttonPulisci" value="pulisci" onclick="eseguiPulisci()">
      <br>
      <br>

      <?php
        $conn=mysqli_connect(filehost,"stefanophp7", "3pasquaman3", "my_stefanophp7");
        $SQLSelect=("SELECT * FROM TCategorieAnnuncioID ORDER BY Nome");
        $query=mysqli_query($conn,$SQLSelect);
       ?>

      <select name="selezioneCategorie" id="selezioneCategorie">
        <option value="0">Tutte le categorie</option>
        <?php
        while ($row=mysqli_fetch_assoc($query)) {
      	echo('<option value="'.$row["AnnuncioID"].'">'.$row["Nome"].'</option>');
        }
        ?>

      </select>
      <br>
      <br>

<!-- inserisco i parametri di connessione -->
      <?php

        $ricercaAnnuncio=$_POST['RicercaAnnunci'];
        $selettore=$_POST['selezioneCategorie'];
        echo $ricercaAnnuncio;

        $conn=mysqli_connect(filehost,"stefanophp7", "3pasquaman3", "my_stefanophp7");
        if((empty($ricercaAnnuncio)) && ($selettore==0))
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

          $query=mysqli_query($conn,$SQLSelect);
          $nomeRecord=mysqli_num_rows($query);

          if ($nomeRecord=="") {
            echo "Non ci sono articoli con questo nome";
            mysqli_close($conn);
            return;
          }



       ?>

       <table border="1">
         <tr>
           <td>ID Annuncio</td>
           <td>Data</td>
           <td>Titolo</td>
           <td>Prezzo</td>
           <td>Foto</td>
           <td>Categoria</td>
           <td>Dettagli</td>
         </tr>

         <?php
         while ($row=mysqli_fetch_assoc($query)) {
           echo ("<tr>
                   <td>".$row[AnnuncioID]."</td>
                   <td>".$row[Data]."</td>
                   <td>".$row[Titolo]."</td>
                   <td>".$row[Prezzo]."€</td>
                   <td><img src=".$row[Foto1]." height=250 width=250></td>
                    <td>".$row[Nome]."</td>
                    <td><a href=annuncio.php?AnnuncioID=".$row[AnnuncioID].">Dettagli</a></td>
                 </tr>");
         }
         mysqli_close($conn);




          ?>

       </table>

    </form>
  </body>
</html>
