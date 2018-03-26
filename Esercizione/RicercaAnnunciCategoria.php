<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Grandi Annunci</title>
    <script type="text/javascript">
      function eseguiCerca(){
        cercaAnnunciString=document.getElementById("RicercaAnnunci").value;
        selettoreString=document.getElementById("selezioneCategorie").text;
        document.getElementById("erroreCercaAnnunci").innerHTML="";
        errore=false;


        if (cercaAnnunciString=="Dio") {
          errore=true;
          document.getElementById("erroreCercaAnnunci").innerHTML="Digita qualcosa"
        }

        if (errore) {
          return;
        }
        else {
          Ricerca.submit();
        }


      }

      function eseguiPulisci(){
        document.getElementById("RicercaAnnunci").innerHTML="";
        Ricerca.submit();
      }
    </script>
  </head>
  <body>

    <!-- fase HTML di form -->
    <h1>Cerca qui tra numerosi annunci:</h1>

    <form name="Ricerca" id="Ricerca" action="RicercaAnnunciCategoria.php" method="post">
      <h2>Ricerca per annuncio:</h2>
      <input type="text" id="RicercaAnnunci" name="RicercaAnnunci"><label id="erroreCercaAnnunci"></label>
      <br>








      <?php
        $conn=mysqli_connect("localhost","pasquaman", "3P@squaman3", "Luongo");
        $str_sql=("SELECT * FROM TCategorieAnnuncioID ORDER BY Nome");
        $query=mysqli_query($conn,$str_sql);
       ?>

      <select name="selezioneCategorie" id="selezioneCategorie" >
        <option value="0">Tutte le categorie</option>
        <?php
        while ($row=mysqli_fetch_assoc($query)) {
      	echo('<option value="'.$row["CategoriaAnnuncioID"].'">'.$row["Nome"].'</option>');
        }
        ?>







      </select>
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

<!-- inserisco i parametri di connessione -->
      <?php

        $ricercaAnnuncio=$_POST['RicercaAnnunci'];
        $selettore=$_POST['selezioneCategorie'];
        echo $ricercaAnnuncio;

        $conn=mysqli_connect("localhost","pasquaman", "3P@squaman3", "Luongo");
        if((empty($ricercaAnnuncio)) && ($selettore==0))
          {
          $str_sql="SELECT * From TAnnunci";
          }
          else if ((empty($ricercaAnnuncio)) && ($selettore!=0)){
            $str_sql="SELECT * From TAnnunci INNER JOIN TCategorieAnnuncioID ON TAnnunci.CategoriaAnnuncioID=TCategorieAnnuncioID.CategoriaAnnuncioID WHERE TCategorieAnnuncioID.CategoriaAnnuncioID='$selettore'" ;
            }
          else if (($selettore==0) && (empty($ricercaAnnuncio)==false)) {
            $str_sql="SELECT * From TAnnunci WHERE TAnnunci.Titolo LIKE '%".$ricercaAnnuncio."%'";
            }

            else

          {
          $str_sql="SELECT * From TAnnunci INNER JOIN TCategorieAnnuncioID ON TAnnunci.CategoriaAnnuncioID=TCategorieAnnuncioID.CategoriaAnnuncioID WHERE TAnnunci.Titolo LIKE '%".$ricercaAnnuncio."%' && TCategorieAnnuncioID.CategoriaAnnuncioID='$selettore'" ;
          }

        echo $str_sql;

          $query=mysqli_query($conn,$str_sql);


          if (mysqli_num_rows($query)==0)
          {
            echo ("Non ci sono articoli con questo nome");

            return;
          }


         while ($row=mysqli_fetch_assoc($query)) {
           echo ("<tr>
                   <td>".$row['AnnuncioID']."</td>
                   <td>".$row['Data']."</td>
                   <td>".$row['Titolo']."</td>
                   <td>".$row['Prezzo']."€</td>
                   <td><img src=".$row['Foto1']." height=250 width=250></td>
                    <td>".$row['Titolo']."</td>
                    <td><a href=annuncio.php?AnnuncioID=".$row['AnnuncioID'].">Dettagli</a></td>
                 </tr>");
         }
         mysqli_close($conn);




          ?>

       </table>

    </form>
  </body>
</html>
