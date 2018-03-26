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

      <form nome="RicercaAnnunci" id="RicercaAnnunci" action="index.php" method="post">
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

  <!-- inserisco i parametri di connessione -->
        <?php

          $ricercaAnnuncio=$_POST['RicercaAnnunci'];
          echo $ricercaAnnuncio;

          $conn=mysqli_connect("localhost","pasquaman", "3P@squaman3", "Luongo");
            if (empty($ricercaAnnuncio)) {
              $SQLSelect=("SELECT * FROM TAnnunci INNER JOIN TCategorieAnnuncioID ON TAnnunci.CategoriaAnnuncioID=TCategorieAnnuncioID.CategoriaAnnuncioID ORDER BY Data");
            }


            // else {
            //   $SQLSelect=("SELECT * FROM TAnnunci INNER JOIN TCategorieAnnuncioID ON TAnnunci.CategoriaAnnuncioID=TCategorieAnnuncioID.CategoriaAnnuncioID WHERE Titolo LIKE '%".$ricercaAnnuncio."%' ORDER BY Data");
            // }

            else {
              $SQLSelect="SELECT * FROM TAnnunci INNER JOIN TCategorieAnnuncioID ON TAnnunci.CategoriaAnnuncioID=TCategorieAnnuncioID.CategoriaAnnuncioID WHERE Titolo LIKE '%".$ricercaAnnuncio."%' OR Descrizione LIKE '%".$ricercaAnnuncio."%'";

            }

            echo $SQLSelect;


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
                     <td>".$row['AnnuncioID']."</td>
                     <td>".$row['Data']."</td>
                     <td>".$row['Titolo']."</td>
                     <td>".$row['Prezzo']."€</td>
                     <td><img src=".$row['Foto1']." height=250 width=250></td>
                      <td>".$row['Nome']."</td>
                      <td><a href=annuncio.php?AnnuncioID=".$row['AnnuncioID'].">Dettagli</a></td>
                   </tr>");
           }
           mysqli_close($conn);




            ?>

         </table>

      </form>
    </body>
  </html>
